<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestockDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restock_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('restock_id')->unsigned();
			$table->integer('product_detail_id')->unsigned();
			$table->integer('stock_shop');
			$table->integer('stock_storage');
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
		Schema::drop('restock_details');
	}

}
