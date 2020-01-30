<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function index()
  {
    $userId = Auth::user()->id;

    $transactions = Transaction::with('travelPackage')->where('users_id', $userId)->get();

    return view('pages.app.user.index', [
      'transactions' => $transactions
    ]);
  }

  public function edit(UserRequest $request, $id)
  {
    $user = Auth::user();
    return view('pages.app.user.edit', [
      'user' => $user
    ]);
  }

  public function update(UserRequest $request, $id)
  {
    $data = $request->all();


    $user = User::findOrFail($id);

    if ($request->hasFile('avatar')) {
      $data['avatar'] = $request->file('avatar')->store(
        'user/avatar',
        'public'
      );
    } else {
      $data['avatar'] =  $user->avatar;
    }

    $user->update($data);


    return redirect()->route('myProfile');
  }
}
