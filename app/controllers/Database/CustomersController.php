<?php

class CustomersController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Customer::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Customer::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($customer)
	{
		$respond = array();
		if (count($customer) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$customer);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$customer = Customer::all();
		return $this->getReturn($customer);
	}

	public function getById($id)
	{
		$customer = Customer::find($id);
		return $this->getReturn($customer);
	}
	
	/*
	public function getBy<column>()
	{
		$customer = Customer::where('','=','')->get();
		return $this->getReturn($customer);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$customer = Customer::find($id);
		if ($customer == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Customer::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$customer->update($data);
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
		$customer = Customer::find($id);
		if ($customer == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$customer-> = ;
			try {
				$customer->save();
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
		$customer = Customer::find($id);
		if ($customer == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$customer->delete();
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
		$customer = Customer::where('','=','')->get();
		if (count($customer) >= 0)
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
