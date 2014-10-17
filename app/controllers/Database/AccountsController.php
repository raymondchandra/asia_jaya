<?php

class AccountsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Account::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Account::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($account)
	{
		$respond = array();
		if (count($account) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$account);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$account = Account::all();
		return $this->getReturn($account);
	}

	public function getById($id)
	{
		$account = Account::find($id);
		return $this->getReturn($account);
	}
	
	/*
	public function getBy<column>()
	{
		$account = Account::where('','=','')->get();
		return $this->getReturn($account);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$account = Account::find($id);
		if ($account == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Account::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$account->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}

	/*
	public function update<column>($id)
	{
		$respond = array();
		$account = Account::find($id);
		if ($account == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$account-> = ;
			try {
				$account->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	*/
	
	public function delete($id)
	{
		$respond = array();
		$account = Account::find($id);
		if ($account == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$account->delete();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}

	/*
	public function exist()
	{
		$respond = array();
		$account = Account::where('','=','')->get();
		if (count($account) >= 0)
		{
			$respond = array('code'=>'200','status' => 'OK');
		}
		else
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		return Response::json($respond);
	}
	*/

}
