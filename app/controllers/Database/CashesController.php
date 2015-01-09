<?php

class CashesController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Cash::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Cash::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getTodayData()
	{
		$respond = array();
		$datas = Cash::all();
		if(count($datas) == 0)
		{
			$datas = null;
		}
		else
		{
			$total = 0;
			foreach($datas as $data)
			{
				$in = $data->in_amount;
				$out = $data->out_amount;
				$total = $total + $in -$out;
				$data->total = $total;
			}
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$datas);
		return Response::json($respond);
	}
	
	/*
		@author: Gentry Swanri
		@parameter :
		@return : 
		-) Fungsi ini berguna untuk memasukkan pembayaran tansaksi ke dalam tabel cashes sesuai dengan parameter
	*/
	public function insertWithParam($transactionId, $in, $out, $type){
		if($transactionId == "-")
		{
			$data = array("in_amount"=>$in, "out_amount"=>$out, "current"=>0, "type"=>$type);
		}
		else
		{
			$data = array("transaction_id"=>$transactionId, "in_amount"=>$in, "out_amount"=>$out, "current"=>0, "type"=>$type);
		}
				
		//validate
		$validator = Validator::make($data, Cash::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Cash::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($cash)
	{
		$respond = array();
		if (count($cash) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$cash);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$cash = Cash::all();
		return $this->getReturn($cash);
	}

	public function getById($id)
	{
		$cash = Cash::find($id);
		return $this->getReturn($cash);
	}
	
	/*
	public function getBy<column>()
	{
		$cash = Cash::where('','=','')->get();
		return $this->getReturn($cash);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$cash = Cash::find($id);
		if ($cash == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Cash::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$cash->update($data);
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
		$cash = Cash::find($id);
		if ($cash == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$cash-> = ;
			try {
				$cash->save();
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
		$cash = Cash::find($id);
		if ($cash == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$cash->delete();
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
		$cash = Cash::where('','=','')->get();
		if (count($cash) >= 0)
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
