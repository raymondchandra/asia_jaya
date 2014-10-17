<?php

class RestockDetailsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Restockdetail::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Restockdetail::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($restockdetail)
	{
		$respond = array();
		if (count($restockdetail) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$restockdetail);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$restockdetail = Restockdetail::all();
		return $this->getReturn($restockdetail);
	}

	public function getById($id)
	{
		$restockdetail = Restockdetail::find($id);
		return $this->getReturn($restockdetail);
	}
	
	/*
	public function getBy<column>()
	{
		$restockdetail = Restockdetail::where('','=','')->get();
		return $this->getReturn($restockdetail);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$restockdetail = Restockdetail::find($id);
		if ($restockdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Restockdetail::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$restockdetail->update($data);
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
		$restockdetail = Restockdetail::find($id);
		if ($restockdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$restockdetail-> = ;
			try {
				$restockdetail->save();
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
		$restockdetail = Restockdetail::find($id);
		if ($restockdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$restockdetail->delete();
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
		$restockdetail = Restockdetail::where('','=','')->get();
		if (count($restockdetail) >= 0)
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
