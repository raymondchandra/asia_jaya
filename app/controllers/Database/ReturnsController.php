<?php

class ReturnsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, ReturnDB::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			ReturnDB::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return :
		-) Fungsi ini digunakan untuk menambahkan 1 baris baru ke dalam tabel return
	*/
	public function insertWithParam($orderId, $type, $status, $solution, $tradeProductId, $difference, $returnQuantity){
		$data = array("order_id"=>$orderId, "type"=>$type, "status"=>$status, "solution"=>$solution, "trade_product_id"=>$tradeProductId, "difference"=>$difference, "return_quantity"=>$returnQuantity);
		$validator = Validator::make($data, ReturnDB::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			ReturnDB::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($return)
	{
		$respond = array();
		if (count($return) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$return);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$return = ReturnDB::all();
		return $this->getReturn($return);
	}

	public function getById($id)
	{
		$return = ReturnDB::find($id);
		return $this->getReturn($return);
	}
	
	/*
	public function getBy<column>()
	{
		$return = Return::where('','=','')->get();
		return $this->getReturn($return);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$return = ReturnDB::find($id);
		if ($return == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, ReturnDB::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$return->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id
		@return :
		-) Fungsi ini digunakan untuk mengubah status dari pending -> fixed
	*/
	public function updateStatus($id)
	{
		$respond = array();
		$return = ReturnDB::find($id);
		if ($return == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$return->status = 'fixed';
			try {
				$return->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id
		@return :
		-) Fungsi ini digunakan untuk mengubah solution dari pending -> fixed
	*/
	public function updateSolution($id)
	{
		$respond = array();
		$return = ReturnDB::find($id);
		if ($return == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$return->solution = 'fixed';
			try {
				$return->save();
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
		$return = Return::find($id);
		if ($return == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$return-> = ;
			try {
				$return->save();
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
		$return = ReturnDB::find($id);
		if ($return == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$return->delete();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	public function getTop10ReturnedProduct()
	{
		$respond = array();
		$orders = DB::table('orders')->select(DB::raw('product_detail_id,sum(return_quantity) as total'))->join('returns', 'returns.order_id', '=','orders.id')->groupBy('product_detail_id')->orderBy('total')->take(10)->get();
		foreach($orders as $ord)
		{
			$prdDtl = ProductDetail::find($ord->product_detail_id);
			$prd = Product::find($prdDtl->product_id);
			$ord->name = $prd->name." - ".$prdDtl->color;
		}
		
		return $orders;
	}

	/*
	public function exist()
	{
		$respond = array();
		$return = Return::where('','=','')->get();
		if (count($return) >= 0)
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
