<?php

class Account extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [
		'username',
		'password',
		'role',
		'last_login',
		'active'
	];

}