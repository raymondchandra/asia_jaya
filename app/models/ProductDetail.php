<?php

class ProductDetail extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'color',
		'stock_shop',
		'stock_storage',
		'product_id',
		'deleted'
	];

}