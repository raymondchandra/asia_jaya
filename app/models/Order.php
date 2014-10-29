<?php

class Order extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
	
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