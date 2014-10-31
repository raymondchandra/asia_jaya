<?php

class Return extends \Eloquent {

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
	];
	
	public function tradedProduct()
	{
		return $this->belongsTo('ProductDetail');
	}

}