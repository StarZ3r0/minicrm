<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Shop extends Eloquent {

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	
	public function ratings() 
	{
		return $this->hasMany('Rating');
	}

}
