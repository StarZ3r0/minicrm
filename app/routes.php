<?php

Route::get('/', function()
{
	return Redirect::to('shops');
});

Route::resource('shops', 'ShopController');
