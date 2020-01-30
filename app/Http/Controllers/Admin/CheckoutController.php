<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, $id)
  {
    $item = Transaction::with(['details', 'user', 'travelPackage'])->findOrFail($id);

    return view('pages.app.checkout', [
      'item' => $item
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request, $id)
  {
    $this->validate($request, [
      'username' => 'required|string|exists:users,username'
    ]);
    $username = $request->username;
    $userX = User::where('username', $username)->first();


    $data = [
      'username' => $request->username,
      'nationality' => $userX->nationality,
      'is_visa' => $userX->is_visa,
      'doe_passport' => $userX->doe_passport
    ];
    $data['transactions_id'] = $id;


    TransactionDetail::create($data);

    $transaction = Transaction::with(['travelPackage'])->find($id);

    if ($request->is_visa) {
      $transaction->transaction_total += 190;
      $transaction->additional_visa += 190;
    }
    $transaction->transaction_total += $transaction->travelPackage->price;

    $transaction->save();

    return redirect()->route('checkout', $id);
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function process(Request $request, $id)
  {
    $travelPackage = TravelPackage::findOrFail($id);
    $user = Auth::user();

    $transaction = Transaction::create([
      'travel_packages_id' => $travelPackage->id,
      'users_id' => $user->id,
      'additional_visa' => 190,
      'transaction_total' => $travelPackage->price + 190,
      'transaction_status'  => 'IN_CART'
    ]);

    TransactionDetail::create([
      'transactions_id' => $transaction->id,
      'username' => $user->username,
      'nationality' => $user->nationality,
      'is_visa' => $user->is_visa,
      'doe_passport' => $user->doe_passport
    ]);

    return redirect()->route('checkout', $transaction->id);
  }

  public function success(Request $request, $id)
  {
    $transaction = Transaction::findOrFail($id);
    $transaction->transaction_status = 'PENDING';

    $transaction->save();

    $data = Transaction::with(['details', 'user', 'travelPackage'])->findOrFail($id);


    // $imej = $data->travelPackage->galleries->first()->image;

    // return $imej;
    // die;

    //MAILXXXXXXX
    Mail::to(Auth::user()->email)->send(new OrderConfirmation($data));

    return view('pages.app.success');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function remove(Request $request, $detailId)
  {
    $item = TransactionDetail::findOrFail($detailId);
    $transaction = Transaction::with(['travelPackage', 'details'])->findOrFail($item->transactions_id);

    if ($request->is_visa) {
      $transaction->transaction_total -= 190;
      $transaction->additional_visa -= 190;
    }
    $transaction->transaction_total -= $transaction->travelPackage->price;

    $transaction->save();


    $item->delete();

    return redirect()->route('checkout', $item->transactions_id);
  }
}
