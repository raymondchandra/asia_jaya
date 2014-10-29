<?php

class Transaction extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'customer_id',
		'total',
		'discount',
		'tax',
		'print_customer',
		'print_shop',
		'is_void',
		'sales_id',
		'status',
	];
	
	public function customer()
	{
		return $this->belongsTo('Customer');
	}
	
	public function sales()
	{
		return $this->belongsTo('Account');
	}

}