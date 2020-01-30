<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccess;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
  public function index()
  {
    $items = Transaction::with(['details', 'user', 'travelPackage'])->latest('created_at')->paginate(5);

    return view('pages.admin.transaction.index', [
      'items' => $items
    ]);
  }

  public function show($id)
  {
    $item = Transaction::with(
      ['details', 'user', 'travelPackage']
    )->findOrFail($id);

    return view('pages.admin.transaction.detail', [
      'item' => $item
    ]);
  }

  public function edit($id)
  {
    $item = Transaction::with(
      ['details', 'user', 'travelPackage']
    )->findOrFail($id);

    return view('pages.admin.transaction.edit', [
      'item' => $item
    ]);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'transaction_status' => 'required'
    ]);

    $data = Transaction::with(
      ['details', 'user', 'travelPackage']
    )->findOrFail($id);

    $emailUser = $data->user->email;

    $item = Transaction::findOrFail($id);

    $item->update([
      'transaction_status' => $request->transaction_status
    ]);


    //MAILXXXXXXX
    Mail::to($emailUser)->send(new OrderSuccess($data));


    return redirect()->route('transaction.index');
  }

  public function destroy($id)
  {
    $item = Transaction::findOrFail($id);
    $item->delete();

    return redirect()->route('transaction.index');
  }
}
