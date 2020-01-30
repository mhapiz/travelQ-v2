<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $travelX = TravelPackage::count();
    $pending = Transaction::where('transaction_status', 'PENDING')->count();
    $success = Transaction::where('transaction_status', 'SUCCESS')->count();
    return view('pages.admin.dashboard', [
      'travelX' => $travelX,
      'pending' => $pending,
      'success' => $success
    ]);
  }
}
