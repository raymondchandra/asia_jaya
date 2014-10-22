<?php

class Cash extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'transaction_id',
		'in',
		'out',
		'current',
		'type',
	];

}