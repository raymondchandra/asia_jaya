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
	public function insertWithParam($no_nota, $orderId, $type, $status, $solution, $tradeProductId, $difference, $returnQuantity, $in_amount, $out_amount){
		$data = array("no_faktur"=>$no_nota, "order_id"=>$orderId, "type"=>$type, "status"=>$status, "solution"=>$solution, "trade_product_id"=>$tradeProductId, "difference"=>$difference, "return_quantity"=>$returnQuantity);
		$validator = Validator::make($data, ReturnDB::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			ReturnDB::create($data);
			//masukin ke cash dulu ya..ijin aja sih ini ma
			$transId = Order::find($orderId);
			$amount = Input::get('amount');
			$controller = new CashesController();
			$controller->insertWithParam($transId->transaction_id,$in_amount,$in_amount,'return');
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
	public function updateSolution($id,$solution)
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
			$return->solution = $solution;
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
		$orders = DB::table('orders')->select(DB::raw('product_detail_id,sum(return_quantity) as total'))->join('returns', 'returns.order_id', '=','orders.id')->whereRaw('MONTH(returns.created_at) >= MONTH(curdate())')->groupBy('product_detail_id')->orderBy('total','dsc')->take(10)->get();
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
	
	public function getSortedAll($by, $order, $from, $to)
	{
		if($from != '' && $to != ''){
			$joined = DB::table('returns')->join('orders', 'returns.order_id', '=', 'orders.id')->join('transactions', 'orders.transaction_id', '=','transactions.id')->join('product_details', 'orders.product_detail_id','=', 'product_details.id')->join('products', 'product_details.product_id', '=', 'products.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->select('returns.id AS id', 'transactions.no_faktur AS no_nota', 'products.product_code AS kode_barang', 'customers.name AS nama_pelanggan', 'returns.type AS type', 'returns.status AS status', 'returns.solution AS solution', 'returns.trade_product_id AS trade_product_id', 'returns.difference AS difference', 'returns.created_at AS created_at')->whereBetween('returns.created_at', array($from, $to));
		}else{
			$joined = DB::table('returns')->join('orders', 'returns.order_id', '=', 'orders.id')->join('transactions', 'orders.transaction_id', '=','transactions.id')->join('product_details', 'orders.product_detail_id','=', 'product_details.id')->join('products', 'product_details.product_id', '=', 'products.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->select('returns.id AS id', 'transactions.no_faktur AS no_nota', 'products.product_code AS kode_barang', 'customers.name AS nama_pelanggan', 'returns.type AS type', 'returns.status AS status', 'returns.solution AS solution', 'returns.trade_product_id AS trade_product_id', 'returns.difference AS difference', 'returns.created_at AS created_at');
		}
		
		$result = $joined->orderBy($by, $order)->get();
		
		return $this->getReturn($result);
	}
	
	public function getFilteredAccount($no_nota, $kode_barang, $nama_pelanggan, $type, $status, $solution, $tradeProductId, $difference, $created, $from, $to)
	{
		if($from != '' && $to != ''){
			$joined = DB::table('returns')->join('orders', 'returns.order_id', '=', 'orders.id')->join('transactions', 'orders.transaction_id', '=','transactions.id')->join('product_details', 'orders.product_detail_id','=', 'product_details.id')->join('products', 'product_details.product_id', '=', 'products.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->select('returns.id AS id', 'transactions.no_faktur AS no_nota', 'products.product_code AS kode_barang', 'customers.name AS nama_pelanggan', 'returns.type AS type', 'returns.status AS status', 'returns.solution AS solution', 'returns.trade_product_id AS trade_product_id', 'returns.difference AS difference', 'returns.created_at AS created_at')->whereBetween('returns.created_at', array($from, $to));
		}else{
			$joined = DB::table('returns')->join('orders', 'returns.order_id', '=', 'orders.id')->join('transactions', 'orders.transaction_id', '=','transactions.id')->join('product_details', 'orders.product_detail_id','=', 'product_details.id')->join('products', 'product_details.product_id', '=', 'products.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->select('returns.id AS id', 'transactions.no_faktur AS no_nota', 'products.product_code AS kode_barang', 'customers.name AS nama_pelanggan', 'returns.type AS type', 'returns.status AS status', 'returns.solution AS solution', 'returns.trade_product_id AS trade_product_id', 'returns.difference AS difference', 'returns.created_at AS created_at');
		}
	
		$isFirst = false;
		
		if($no_nota != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('transactions.no_faktur', '=', $no_nota);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('transactions.no_faktur', '=', $no_nota);
			}
		}
		
		if($kode_barang != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.product_code', 'LIKE', '%'.$kode_barang.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.product_code', 'LIKE', '%'.$kode_barang.'%');
			}
		}
		
		if($nama_pelanggan != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.name', 'LIKE', '%'.$nama_pelanggan.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.name', 'LIKE', '%'.$nama_pelanggan.'%');
			}
		}
		
		if($type != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.type', '=', $type);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.type', '=', $type);
			}
		}
		
		if($status != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.status', 'LIKE', '%'.$status.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.status', 'LIKE', '%'.$status.'%');
			}
		}
		
		if($solution != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.solution', 'LIKE', '%'.$solution.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.solution', 'LIKE', '%'.$solution.'%');
			}
		}
		
		if($tradeProductId != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.trade_product_id', '=', $tradeProductId);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.trade_product_id', '=', $tradeProductId);
			}
		}
		
		if($difference != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.difference', '=', $difference);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.difference', '=', $difference);
			}
		}
		
		if($created != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.created_at', 'LIKE', '%'.$created.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.created_at', 'LIKE', '%'.$created.'%');
			}
		}
		
		if($isFirst == false)
		{
			$result = $joined->get();
			$isFirst = true;
		}
		else
		{
			$result = $resultTab->get();
		}
		
		return $this->getReturn($result);
	}
	
	public function getSortedFilteredAccount($no_nota, $kode_barang, $nama_pelanggan, $type, $status, $solution, $tradeProductId, $difference, $created, $sortBy, $order, $from, $to)
	{
		if($from != '' && $to != ''){
			$joined = DB::table('returns')->join('orders', 'returns.order_id', '=', 'orders.id')->join('transactions', 'orders.transaction_id', '=','transactions.id')->join('product_details', 'orders.product_detail_id','=', 'product_details.id')->join('products', 'product_details.product_id', '=', 'products.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->select('returns.id AS id', 'transactions.no_faktur AS no_nota', 'products.product_code AS kode_barang', 'customers.name AS nama_pelanggan', 'returns.type AS type', 'returns.status AS status', 'returns.solution AS solution', 'returns.trade_product_id AS trade_product_id', 'returns.difference AS difference', 'returns.created_at AS created_at')->whereBetween('returns.created_at', array($from, $to));
		}else{
			$joined = DB::table('returns')->join('orders', 'returns.order_id', '=', 'orders.id')->join('transactions', 'orders.transaction_id', '=','transactions.id')->join('product_details', 'orders.product_detail_id','=', 'product_details.id')->join('products', 'product_details.product_id', '=', 'products.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->select('returns.id AS id', 'transactions.no_faktur AS no_nota', 'products.product_code AS kode_barang', 'customers.name AS nama_pelanggan', 'returns.type AS type', 'returns.status AS status', 'returns.solution AS solution', 'returns.trade_product_id AS trade_product_id', 'returns.difference AS difference', 'returns.created_at AS created_at');
		}
	
		$isFirst = false;
		
		if($no_nota != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('transactions.no_faktur', '=', $no_nota);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('transactions.no_faktur', '=', $no_nota);
			}
		}
		
		if($kode_barang != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.product_code', 'LIKE', '%'.$kode_barang.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.product_code', 'LIKE', '%'.$kode_barang.'%');
			}
		}
		
		if($nama_pelanggan != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.name', 'LIKE', '%'.$nama_pelanggan.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.name', 'LIKE', '%'.$nama_pelanggan.'%');
			}
		}
		
		if($type != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.type', '=', $type);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.type', '=', $type);
			}
		}
		
		if($status != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.status', 'LIKE', '%'.$status.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.status', 'LIKE', '%'.$status.'%');
			}
		}
		
		if($solution != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.solution', 'LIKE', '%'.$solution.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.solution', 'LIKE', '%'.$solution.'%');
			}
		}
		
		if($tradeProductId != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.trade_product_id', '=', $tradeProductId);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.trade_product_id', '=', $tradeProductId);
			}
		}
		
		if($difference != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.difference', '=', $difference);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.difference', '=', $difference);
			}
		}
		
		if($created != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('returns.created_at', 'LIKE', '%'.$created.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('returns.created_at', 'LIKE', '%'.$created.'%');
			}
		}
		
		if($isFirst == false)
		{
			$result = $joined->orderBy($sortBy, $order)->get();
			$isFirst = true;
		}
		else
		{
			$result = $resultTab->orderBy($sortBy, $order)->get();
		}
		
		return $this->getReturn($result);
	}
	
	public function getSortedAll2($by, $order)
	{
		$joined = DB::table('orders')->join('transactions', 'orders.transaction_id', '=', 'transactions.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->join('product_details', 'orders.product_detail_id', "=",'product_details.id')->join('products', 'product_details.product_id',"=", 'products.id')->select('orders.id','customers.name AS cust_name','products.product_code AS prod_code','products.name AS prod_name','orders.transaction_id','orders.created_at AS created_at','orders.quantity','orders.price', 'products.id AS prod_id');
		
		$result = $joined->orderBy($by, $order)->get();
		
		return $this->getReturn($result);
	}
	
	public function getFilteredAccount2($id, $cust_name, $prod_code, $prod_name, $transaction_id, $created_at)
	{
		$isFirst = false;
		
		$joined = DB::table('orders')->join('transactions', 'orders.transaction_id', '=', 'transactions.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->join('product_details', 'orders.product_detail_id', "=",'product_details.id')->join('products', 'product_details.product_id',"=", 'products.id')->select('orders.id','customers.name AS cust_name','products.product_code AS prod_code','products.name AS prod_name','orders.transaction_id','orders.created_at AS created_at','orders.quantity','orders.price', 'products.id AS prod_id');
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('orders.id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('orders.id', '=', $id);
			}
		}
		
		if($cust_name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.name', 'LIKE', '%'.$cust_name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.name', 'LIKE', '%'.$cust_name.'%');
			}
		}
		
		if($prod_code != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.product_code', 'LIKE', '%'.$prod_code.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.product_code', 'LIKE', '%'.$prod_code.'%');
			}
		}
		
		if($prod_name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.name', 'LIKE', '%'.$prod_name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.name', 'LIKE', '%'.$prod_name.'%');
			}
		}
		
		if($transaction_id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('orders.transaction_id', '=', $transaction_id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('orders.transaction_id', '=', $transaction_id);
			}
		}
		
		if($created_at != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('orders.created_at', 'LIKE', '%'.$created_at.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('orders.created_at', 'LIKE', '%'.$created_at.'%');
			}
		}
		
		if($isFirst == false)
		{
			$result = $joined->get();
			$isFirst = true;
		}
		else
		{
			$result = $resultTab->get();
		}
		
		return $this->getReturn($result);
	}
	
	public function getSortedFilteredAccount2($id, $cust_name, $prod_code, $prod_name, $transaction_id, $created_at, $sortBy, $order)
	{
		$isFirst = false;
		
		$joined = DB::table('orders')->join('transactions', 'orders.transaction_id', '=', 'transactions.id')->join('customers', 'transactions.customer_id', '=', 'customers.id')->join('product_details', 'orders.product_detail_id', "=",'product_details.id')->join('products', 'product_details.product_id',"=", 'products.id')->select('orders.id','customers.name AS cust_name','products.product_code AS prod_code','products.name AS prod_name','orders.transaction_id','orders.created_at AS created_at','orders.quantity','orders.price', 'products.id AS prod_id');
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('orders.id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('orders.id', '=', $id);
			}
		}
		
		if($cust_name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.name', 'LIKE', '%'.$cust_name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.name', 'LIKE', '%'.$cust_name.'%');
			}
		}
		
		if($prod_code != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.product_code', 'LIKE', '%'.$prod_code.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.product_code', 'LIKE', '%'.$prod_code.'%');
			}
		}
		
		if($prod_name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.name', 'LIKE', '%'.$prod_name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.name', 'LIKE', '%'.$prod_name.'%');
			}
		}
		
		if($transaction_id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('orders.transaction_id', '=', $transaction_id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('orders.transaction_id', '=', $transaction_id);
			}
		}
		
		if($created_at != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('orders.created_at', 'LIKE', '%'.$created_at.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('orders.created_at', 'LIKE', '%'.$created_at.'%');
			}
		}
		
		if($isFirst == false)
		{
			$result = $joined->orderBy($sortBy, $order)->get();
			$isFirst = true;
		}
		else
		{
			$result = $resultTab->orderBy($sortBy, $order)->get();
		}
		
		return $this->getReturn($result);
	}

}
