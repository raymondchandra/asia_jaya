<?php

class Order extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'quantity',
		'transaction_id',
		'price',
		'product_detail_id',
	];
	
	public function transaction()
	{
		return $this->belongsTo('Transaction');
	}
	
	public function product_detail()
	{
		return $this->belongsTo('ProductDetail');
	}

}