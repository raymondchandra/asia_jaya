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
	
	/*
		@author : Gentry Swanri
		@parameter : $customerId, $total, $salesId
		@return : response => created or failed
		-) Fungsi ini digunakan untuk memasukkan transaksi baru ke dalam tabel transaksi sesuai dengan parameter
	*/
	public function insertWithParam($customerId, $total, $salesId, $discount, $tax){
		$data = array("customer_id"=>$customerId, "total"=>$total, "discount"=>$discount, "tax"=>$tax, "print_customer"=>0, "print_shop"=>0, "is_void"=>0, "sales_id"=>$salesId, "status"=>"UnPaid");
		
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
		@author : Gentry Swanri
		@parameter : $customerId
		@return : data transaksi dengan customer id tertentu
		-) Fungsi ini digunakan untuk mengembalikan data dari transaksi sesuai dengan customer id
	*/
	public function getByCustomerId($customerId)
	{
		$transaction = Transaction::where('customer_id','=',$customerId)->get();
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
		@author : Gentry Swanri
	*/
	public function updateVoid($id)
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
			$transaction->is_void = 1;
			try {
				$transaction->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
	*/
	public function updatePrintCustomer($id)
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
			$transaction->print_customer = 1;
			try {
				$transaction->save();
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
	
	public function getSortedAll($by, $order)
	{
		$joined = DB::table('transactions')->join('customers', 'transactions.customer_id', '=', 'customers.id')->join('accounts', 'transactions.sales_id', '=', 'accounts.id')->select('transactions.id', 'customers.name', 'transactions.total', 'transactions.discount', 'transactions.tax', 'transactions.sales_id', 'accounts.username', 'transactions.is_void', 'transactions.status','transactions.total_paid');
		$result = $joined->orderBy($by, $order)->get();
		
		return $this->getReturn($result);
	}
	
	public function getFilteredAccount($id, $custName, $total, $discount, $tax, $salesId, $salesName, $void, $status)
	{
		$isFirst = false;
		
		$joined = DB::table('transactions')->join('customers', 'transactions.customer_id', '=', 'customers.id')->join('accounts', 'transactions.sales_id', '=', 'accounts.id')->select('transactions.id', 'customers.name', 'transactions.total', 'transactions.discount', 'transactions.tax', 'transactions.sales_id', 'accounts.username', 'transactions.is_void', 'transactions.status','transactions.total_paid');
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('transactions.id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('transactions.id', '=', $id);
			}
		}
		
		if($custName != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('name', 'LIKE', '%'.$custName.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('name', 'LIKE', '%'.$custName.'%');
			}
		}
		
		if($total != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('total', '=', $total);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('total', '=', $total);
			}
		}
		
		if($discount != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('discount', '=', $discount);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('discount', '=', $discount);
			}
		}
		
		if($tax != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('tax', '=', $tax);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('tax', '=', $tax);
			}
		}
		
		if($salesId != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('sales_id', '=', $salesId);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('sales_id', '=', $salesId);
			}
		}
		
		if($salesName != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('username', 'LIKE', '%'.$salesName.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('username', 'LIKE', '%'.$salesName.'%');
			}
		}
		
		if($void != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('is_void', '=', $void);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('is_void', '=', $void);
			}
		}
		
		if($status != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('status', 'LIKE', '%'.$status.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('status', 'LIKE', '%'.$status.'%');
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
	
	public function getSortedFilteredAccount($id, $custName, $total, $discount, $tax, $salesId, $salesName, $void, $status, $sortBy, $order)
	{
		$isFirst = false;
		
		$joined = DB::table('transactions')->join('customers', 'transactions.customer_id', '=', 'customers.id')->join('accounts', 'transactions.sales_id', '=', 'accounts.id')->select('transactions.id', 'customers.name', 'transactions.total', 'transactions.discount', 'transactions.tax', 'transactions.sales_id', 'accounts.username', 'transactions.is_void', 'transactions.status','transactions.total_paid');
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('transactions.id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('transactions.id', '=', $id);
			}
		}
		
		if($custName != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('name', 'LIKE', '%'.$custName.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('name', 'LIKE', '%'.$custName.'%');
			}
		}
		
		if($total != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('total', '=', $total);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('total', '=', $total);
			}
		}
		
		if($discount != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('discount', '=', $discount);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('discount', '=', $discount);
			}
		}
		
		if($tax != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('tax', '=', $tax);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('tax', '=', $tax);
			}
		}
		
		if($salesId != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('sales_id', '=', $salesId);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('sales_id', '=', $salesId);
			}
		}
		
		if($salesName != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('username', 'LIKE', '%'.$salesName.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('username', 'LIKE', '%'.$salesName.'%');
			}
		}
		
		if($void != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('void', '=', $void);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('void', '=', $void);
			}
		}
		
		if($status != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('status', 'LIKE', '%'.$status.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('status', 'LIKE', '%'.$status.'%');
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
	
	public function updateTransactionById($id, $total, $total_paid, $discount, $print_customer, $print_shop, $status)
	{
		$transaction = Transaction::find($id);
		$transaction->total = $total;
		$transaction->total_paid = $total_paid;
		$transaction->discount = $discount;
		$transaction->print_customer = $print_customer;
		$transaction->print_shop = $print_shop;
		$transaction->status = $status;
		
		try
		{
			$transaction->save();
			return 1;
		}
		catch(Exception $e)
		{
			return 0;
		}
	}
	
	public function makeVoid($id)
	{
		$transaction = Transaction::find($id);
		$transaction->is_void = 1;
		try
		{
			$transaction->save();
			return 1;
		}
		catch(Exception $e)
		{
			return -1;
		}
	}

}
