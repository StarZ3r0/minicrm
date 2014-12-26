<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shops', function($table)
      {
        $table->increments('id');
        $table->string('name');
        $table->string('zip');
        $table->string('city');
        $table->string('address');
        $table->string('phone');
        $table->string('email')->unique();
        $table->string('website');
        $table->text('opening_hours');
        $table->boolean('active');

        $table->timestamps();
        $table->softDeletes();
      });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shops');
	}

}
