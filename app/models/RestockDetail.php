<?php

class RestockDetail extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
	
	];
	
	public function product_detail()
	{
		return $this->belongsTo('ProductDetail');
	}
	
	public function restock()
	{
		return $this->belongsTo('Restock');
	}
}