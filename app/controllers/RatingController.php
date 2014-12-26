<?php

class RatingController extends Controller {

	public function postCreate()
  {
    $rules = array(
      'rating'=>'required|integer', 
      'comment'=>'required',
      'name' => 'required',
      'email' => 'required|email',
      'shop_id' => 'required|integer',
    );

    $validator = Validator::make(Input::all() , $rules);
    if($validator->fails()) {
      return Redirect::to('/shops/'.Input::get('shop_id'))->withErrors($validator)->withInput();
    }
    else {
      $rating = new Rating;
      $rating->rating = Input::get('rating');
      $rating->comment = Input::get('comment');
      $rating->name = Input::get('name');
      $rating->email = Input::get('email');
      $rating->shop_id = Input::get('shop_id');
      $rating->save();
      return Redirect::to('/shops/'.Input::get('shop_id'))->with('message', 'A hozzászólás mentésre került.');
    }
  }

}
