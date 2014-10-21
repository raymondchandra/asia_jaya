<?php

class Product extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'product_code',
		'name',
		'modal_price',
		'min_price',
		'sales_price',
		'stock_shop',
		'stock_storage',
		'type',
		'deleted'
	];

}