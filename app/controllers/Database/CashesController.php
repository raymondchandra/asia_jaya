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
		$datas = Cash::whereRaw('created_at >= curdate()')->get();
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
	
	public function getTodayTotalCash()
	{
		$respond = array();
		$total = 0;
		$datas = Cash::whereRaw('created_at >= curdate()')->get();
		if(count($datas) == 0)
		{
			$datas = null;
		}
		else
		{
			
			foreach($datas as $data)
			{
				$in = $data->in_amount;
				$out = $data->out_amount;
				$total = $total + $in -$out;
				$data->total = $total;
			}
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$total);
		return Response::json($respond);
	}
	
	public function getMonthlyCashFlow()
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<32 ; $i++)
		{
			if($i<10)
			{
				$date = "0".$i;
				
			}
			else
			{
				$date = $i;
			}
			
			if($i<9)
			{
				$date2 = "0".$i+1;
				
			}
			else
			{
				$date2 = $i+1;
			}
			
			if(date('n')<10)
			{
				$month = "0".date('n');
			}
			else
			{
				$month = date('n');
			}
			
			$todayDate = date('Y')."-".$month."-".$date;
			$datas = Cash::where(DB::raw('DATE(created_at)'),'=',$todayDate)->whereRaw('YEAR(created_at) = YEAR(curdate())')->get();
			$todayTotal = 0;
			foreach($datas as $data)
			{
				$todayTotal += $data->in_amount;
				$todayTotal -= $data->out_amount;
			}
			$array[$i-1] = $todayTotal;
		}
		$result = $array[0];
		for($i=1 ; $i<31 ; $i++)
		{
			$result .= ",".$array[$i];
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$result);
		return Response::json($respond);
	}
	
	
	
	public function getYearlyCashFlow()
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<13 ; $i++)
		{
			$datas = Cash::where(DB::raw('MONTH(created_at)'),'=',$i)->whereRaw('YEAR(created_at) = YEAR(curdate())')->get();
			$todayTotal = 0;
			foreach($datas as $data)
			{
				$todayTotal += $data->in_amount;
				$todayTotal -= $data->out_amount;
			}
			$array[$i-1] = $todayTotal;
		}
		$result = $array[0];
		for($i=1 ; $i<12 ; $i++)
		{
			$result .= ",".$array[$i];
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$result);
		return Response::json($respond);
	}
	
	public function getSortedAll($by, $order)
	{
			$resultTemp = DB::table('cashes')->select('type', 'transaction_id', 'in_amount', 'out_amount', DB::raw('SUM(in_amount-out_amount) AS total'), 'created_at');
		
			$result = $resultTemp->orderBy($by, $order)->whereRaw('created_at >= curdate()')->get();
			
			/*
			$total = 0;
			foreach($result as $data)
			{
				$in = $data->in_amount;
				$out = $data->out_amount;
				$total = $total + $in -$out;
				$data->total = $total;
			}
			*/
		
		return $this->getReturn($result);
	}

	public function getTodayInpuCash(){


		$cashes = DB::table('cashes')->where('type', '=', 'opening cash')->whereRaw('created_at >= curdate()')->get();

		$uangKasReturn = 0;
		foreach ($cashes as $uangKas) {
			 	$uangKasReturn += $uangKas->in_amount;
		}

		return $uangKasReturn;

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
