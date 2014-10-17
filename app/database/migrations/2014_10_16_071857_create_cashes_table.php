<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCashesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cashes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('transaction_id')->unsigned()->nullable();
			$table->integer('in');
			$table->integer('out');
			$table->integer('current');
			$table->string('type');
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
		Schema::drop('cashes');
	}

}
