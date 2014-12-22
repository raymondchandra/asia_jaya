<?php

class ReturnDB extends \Eloquent {
	protected $table = 'returns';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'order_id',
		'type',
		'status',
		'solution',
		'trade_product_id',
		'difference',
		'return_quantity'
	];
	
	public function tradedProduct()
	{
		return $this->belongsTo('ProductDetail');
	}

}