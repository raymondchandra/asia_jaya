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
	
	/*
		@author : Gentry Swanri
		@parameter : $quantity, $transactionId, $price, $prodDetailId
		@return : response => created or failed
		-) Fungsi ini digunakan untuk memasukkan order milik customer ke dalam tabel order sesuai dengan parameter
	*/
	public function insertWithParam($quantity, $transactionId, $price, $prodDetailId, $modal){
		$data = array("quantity"=>$quantity, "transaction_id"=>$transactionId, "price"=>$price, "product_detail_id"=>$prodDetailId,'modal'=>$modal);
		
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
	
	public function updateOrder($id, $quantity, $price)
	{
		$order = Order::find($id);
		$productDetail = ProductDetail::find($order->product_detail_id);
		$product = Product::find($productDetail->product_id);
		$order->quantity = $quantity;
		$order->price = $price;
		$order->modal = $quantity * $product->modal_price;
		
		try
		{
			$order->save();
			return 1;
		}
		catch(Exception $e)
		{
			return -1;
		}
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
	
	public function getTop10ProductBought()
	{
		$respond = array();
		$orders = DB::table('orders')->select(DB::raw('product_detail_id,sum(quantity) as total'))->whereRaw('MONTH(created_at) >= MONTH(curdate())')->whereRaw('YEAR(created_at) >= YEAR(curdate())')->groupBy('product_detail_id')->orderBy('total','dsc')->take(10)->get();
		foreach($orders as $ord)
		{
			$prdDtl = ProductDetail::find($ord->product_detail_id);
			$prd = Product::find($prdDtl->product_id);
			$ord->name = $prd->name." - ".$prdDtl->color;
		}
		
		return $orders;
	}
	
	public function getDailyProfit($month)
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<=31 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price)-sum(modal) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('DAY(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->where(DB::raw('MONTH(orders.created_at)'),'=',$month)->first();
			if($datas->total == null)
			{
				$array[$i-1] = 0;
			}
			else
			{
				$array[$i-1] = $datas->total;
			}
		}
		
		$result = $array[0];
		for($i=1 ; $i<31 ; $i++)
		{
			$result .= ",".$array[$i];
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$result);
		return Response::json($respond);
	}
	
	public function getDailyIncome($month)
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<=31 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('DAY(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->where(DB::raw('MONTH(orders.created_at)'),'=',$month)->first();
			if($datas->total == null)
			{
				$array[$i-1] = 0;
			}
			else
			{
				$array[$i-1] = $datas->total;
			}
		}
		
		$result = $array[0];
		for($i=1 ; $i<31 ; $i++)
		{
			$result .= ",".$array[$i];
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$result);
		return Response::json($respond);
	}
	
	public function getDailyProfitDetail($month)
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<31 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price)-sum(modal) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('DAY(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->where(DB::raw('MONTH(orders.created_at)'),'=',$month)->first();
			if($datas->total == null)
			{
				$array[$i-1][0] = 0;
			}
			else
			{
				$array[$i-1][0] = $datas->total;
			}
		}
		for($i=1 ; $i<31 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('DAY(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->where(DB::raw('MONTH(orders.created_at)'),'=',$month)->first();
			if($datas->total == null)
			{
				$array[$i-1][1] = 0;
			}
			else
			{
				$array[$i-1][1] = $datas->total;
			}
		}
		
		$respond = array('code'=>'200','status' => 'OK','message'=>$array);
		return Response::json($respond);
	}
	
	public function getMonthlyProfitDetail()
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<13 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price)-sum(modal) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('MONTH(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->first();
			if($datas->total == null)
			{
				$array[$i-1][0] = 0;
			}
			else
			{
				$array[$i-1][0] = $datas->total;
			}
		}
		for($i=1 ; $i<13 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('MONTH(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->first();
			if($datas->total == null)
			{
				$array[$i-1][1] = 0;
			}
			else
			{
				$array[$i-1][1] = $datas->total;
			}
		}
		
		$respond = array('code'=>'200','status' => 'OK','message'=>$array);
		return Response::json($respond);
	}
	
	public function getYearlyProfit()
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<13 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price)-sum(modal) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('MONTH(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->first();
			if($datas->total == null)
			{
				$array[$i-1] = 0;
			}
			else
			{
				$array[$i-1] = $datas->total;
			}
		}
		$result = $array[0];
		for($i=1 ; $i<12 ; $i++)
		{
			$result .= ",".$array[$i];
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$result);
		return Response::json($respond);
	}
	
	public function getYearlyIncome()
	{
		$respond = array();
		$array = array();
		for($i=1 ; $i<13 ; $i++)
		{
			$datas = Order::select(DB::raw('sum(price) as total'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('MONTH(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->first();
			if($datas->total == null)
			{
				$array[$i-1] = 0;
			}
			else
			{
				$array[$i-1] = $datas->total;
			}
		}
		$result = $array[0];
		for($i=1 ; $i<12 ; $i++)
		{
			$result .= ",".$array[$i];
		}
		$respond = array('code'=>'200','status' => 'OK','message'=>$result);
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
