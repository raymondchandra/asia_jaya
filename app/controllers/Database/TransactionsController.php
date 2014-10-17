<?php

class TransactionsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Transaction::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Transaction::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($transaction)
	{
		$respond = array();
		if (count($transaction) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$transaction);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$transaction = Transaction::all();
		return $this->getReturn($transaction);
	}

	public function getById($id)
	{
		$transaction = Transaction::find($id);
		return $this->getReturn($transaction);
	}
	
	/*
	public function getBy<column>()
	{
		$transaction = Transaction::where('','=','')->get();
		return $this->getReturn($transaction);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$transaction = Transaction::find($id);
		if ($transaction == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Transaction::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$transaction->update($data);
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
		$transaction = Transaction::find($id);
		if ($transaction == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$transaction-> = ;
			try {
				$transaction->save();
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
		$transaction = Transaction::find($id);
		if ($transaction == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$transaction->delete();
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
		$transaction = Transaction::where('','=','')->get();
		if (count($transaction) >= 0)
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
