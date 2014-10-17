<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('product_code');
			$table->string('name');
			$table->integer('modal_price');
			$table->integer('min_price');
			$table->integer('sales_price');
			$table->integer('stock_shop');
			$table->integer('stock_storage');
			$table->string('type');
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
		Schema::drop('products');
	}

}
