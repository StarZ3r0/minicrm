<?php

class Rating extends Eloquent {

	public function shop()
  {
    return $this->belongsTo('Shop');
  }
}
