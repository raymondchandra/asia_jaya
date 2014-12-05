<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('color');
			$table->string('photo');
			$table->integer('stock_shop');
			$table->integer('stock_storage');
			$table->integer('product_id')->unsigned();
			$table->tinyInteger('deleted');
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
		Schema::drop('product_details');
	}

}
