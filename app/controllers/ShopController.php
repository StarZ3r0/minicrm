<?php

class ShopController extends Controller {

	public function index()
	{
    $shops = Shop::paginate(15);
		return View::make('shops.index')->with('shops', $shops);
	}

	public function create()
  {
  	return View::make('shops.create');
  }

  public function store()
  {
    $rules = array(
      'name'=>'required', 
      'opening_hours'=>'required',
      'zip' => 'required',
      'city' => 'required',
      'address' => 'required',
      'phone' => 'required',
      'email' => 'required|email|unique:shops',
    );

    $validator = Validator::make(Input::all() , $rules);
    if($validator->fails()) {
      return Redirect::to('/shops/create')->withErrors($validator)->withInput();
    }
    else {
      $shop = new Shop;
      $shop->active = Input::get('active', 0);
      $shop->name = Input::get('name');
      $shop->opening_hours = Input::get('opening_hours');
      $shop->zip = Input::get('zip');
      $shop->city = Input::get('city');
      $shop->address = Input::get('address');
      $shop->phone = Input::get('phone');
      $shop->email = Input::get('email');
      $shop->website = Input::get('website');
      $shop->save();
      return Redirect::to('/shops')->with('message', 'A bolt sikeresen mentésre került.');
    }
  }

  public function show($id)
  {
    return View::make('shops.show')->with('shop', Shop::find($id));
  }

  public function edit($id)
  {
    $shop = Shop::find($id);
    return View::make('shops.edit')->with('shop', $shop);
  }

  public function update($id)
  {
    $rules = array(
      'name'=>'required', 
      'opening_hours'=>'required',
      'zip' => 'required',
      'city' => 'required',
      'address' => 'required',
      'phone' => 'required',
      'email' => 'required|email|unique:shops,email,'.$id,
    );

    $validator = Validator::make(Input::all() , $rules);
    if($validator->fails()) {
      return Redirect::to("/shops/$id/edit")->withErrors($validator)->withInput();
    }
    else {
      $shop = Shop::find($id);
      $shop->active = Input::get('active', 0);
      $shop->name = Input::get('name');
      $shop->opening_hours = Input::get('opening_hours');
      $shop->zip = Input::get('zip');
      $shop->city = Input::get('city');
      $shop->address = Input::get('address');
      $shop->phone = Input::get('phone');
      $shop->email = Input::get('email');
      $shop->website = Input::get('website');
      $shop->save();
      return Redirect::to('/shops')->with('message', 'A bolt sikeresen szerkesztésre került.');
    }
  }

  public function destroy($id)
  {
    $shop = Shop::find($id);
    $shop->delete();
    return Redirect::to('/shops');
  }

}
