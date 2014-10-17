<?php

class OrdersController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Order::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Order::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($order)
	{
		$respond = array();
		if (count($order) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$order);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$order = Order::all();
		return $this->getReturn($order);
	}

	public function getById($id)
	{
		$order = Order::find($id);
		return $this->getReturn($order);
	}
	
	/*
	public function getBy<column>()
	{
		$order = Order::where('','=','')->get();
		return $this->getReturn($order);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$order = Order::find($id);
		if ($order == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Order::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$order->update($data);
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
		$order = Order::find($id);
		if ($order == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$order-> = ;
			try {
				$order->save();
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
		$order = Order::find($id);
		if ($order == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$order->delete();
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
		$order = Order::where('','=','')->get();
		if (count($order) >= 0)
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
