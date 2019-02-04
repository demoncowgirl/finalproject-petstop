<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YelpController extends Controller
{
  //     public function edit($id)
  // {
  //      $item = Item::find($id);
  //      return view('items.edit')->with('item', $item);
  // }

  // this will allow for data to be stored and reports to be created
  // tracking pet searches by registered users
  public function store(Request $request){

    $data = Report::create([
      'user_id' => auth()->id(),
      'zipcode' => request('zipCode'),
      'name' => request('name'),
      'rating' => request('rating'),
      'lat' => request('lat'),
      'lon' => request('lon'),
      'url' => request('active_url'),
      'address' => request('address'),
      'city' => request('city'),
      'phone' => request('phone'),
  ]);
  return test;
}

}
