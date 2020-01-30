<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct()
  {
    // $this->middleware('auth');
  }
  public function index()
  {
    return view('pages.app.index');
  }

  public function travelPackages(Request $request)
  {
    $items = TravelPackage::with('galleries')->get();


    return view('pages.app.travelPackages', [
      'items' => $items
    ]);
  }

  public function travelSearch(Request $request)
  {

    $this->validate($request, [
      'q' => 'string'
    ]);

    $query = $request->q;

    $items = TravelPackage::with('galleries')->where('title', 'LIKE', '%' . $query . '%')->get();

    return view('pages.app.travelPackages', [
      'items' => $items
    ]);
  }
}
