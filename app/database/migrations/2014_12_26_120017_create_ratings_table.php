<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ratings', function($table)
      {
        $table->increments('id');
        $table->integer('rating')->unsigned();
        $table->text('comment');
        $table->string('name');
        $table->string('email');
        $table->integer('shop_id')->unsigned();
        $table->foreign('shop_id')->references('id')->on('shops');

        $table->timestamps();
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ratings');
	}

}
