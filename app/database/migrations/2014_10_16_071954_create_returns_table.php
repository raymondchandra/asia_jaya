<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReturnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('returns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('no_faktur');
			$table->integer('order_id')->unsigned();
			$table->tinyInteger('type');
			$table->string('status');
			$table->string('solution');
			$table->integer('trade_product_id')->unsigned()->nullable();
			$table->integer('difference');
			$table->integer('diffModal');
			$table->integer('return_quantity');
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
		Schema::drop('returns');
	}

}
