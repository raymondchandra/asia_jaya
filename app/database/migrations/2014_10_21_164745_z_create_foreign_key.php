<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZCreateForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_details', function($table)
		{
		    $table->foreign('product_id')->references('id')->on('products');
		});
		
		Schema::table('cashes', function($table)
		{
		    $table->foreign('transaction_id')->references('id')->on('transactions');
		});
		
		Schema::table('transactions', function($table)
		{
		    $table->foreign('customer_id')->references('id')->on('customers');
		    $table->foreign('sales_id')->references('id')->on('account');
		});
		
		Schema::table('orders', function($table)
		{
		    $table->foreign('transaction_id')->references('id')->on('transactions');
		    $table->foreign('product_detail_id')->references('id')->on('product_details');
		});
		
		Schema::table('restock_details', function($table)
		{
		    $table->foreign('restock_id')->references('id')->on('restocks');
		    $table->foreign('product_detail_id')->references('id')->on('product_details');
		});
		
		Schema::table('returns', function($table)
		{
		    $table->foreign('order_id')->references('id')->on('orders');
		    $table->foreign('trade_product_id')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
	}

}
