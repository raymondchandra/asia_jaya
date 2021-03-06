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
	
	public function search()
	{
		try
		{
			$respond = array();
			$keyword = Input::get('keyword');
			$result = Customer::where('name', 'LIKE', '%'.$keyword.'%')->get();
			if(count($result) == 0)
			{
				//not found
				$response = array('code'=>'404','status' => 'Not Found');
			}
			else
			{
				//found!!
				$response = array('code'=>'200','status' => 'OK','messages'=>$result);
				
			}
			return Response::json($response);
		}
		catch(Exception $e)
		{
			$response = array('code'=>'403','status' => 'Forbidden');
			return Response::json($response);
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $customerName
		@return : response => success or failed
		-) Fungsi ini digunakan untuk memasukkan 1 baris baru ke dalam tabel Customer
	*/
	public function insertWithParam($customerName){
		$data = array('name' => $customerName);
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
	
	public function getAlls()
	{
		$joined = DB::table('customers')->leftJoin('transactions', 'transactions.customer_id', '=', 'customers.id')->select('customers.id', 'customers.name', DB::raw('COUNT(transactions.total) AS countTrans'), 'customers.created_at', DB::raw('SUM(transactions.total) AS total'))->where('transactions.is_void','=',0)->where('transactions.status','=','Paid')->groupBy('customers.id')->get();
		
		return $this->getReturn($joined);
	}
	
	public function getSortedAll($by, $order)
	{
	
		$joined = DB::table('customers')->leftJoin('transactions', 'transactions.customer_id', '=', 'customers.id')->select('customers.id', 'customers.name', DB::raw('COUNT(transactions.total) AS countTrans'), 'customers.created_at', DB::raw('SUM(transactions.total) AS total'))->where('transactions.is_void','=',0)->where('transactions.status','=','Paid')->groupBy('customers.id');
		
		$result = $joined->orderBy($by, $order)->get();
		
		return $this->getReturn($result);
	}
	
	public function getFilteredAccount($id, $custName, $count, $total, $created_at)
	{
		$isFirst = false;
		
		$joined = DB::table('customers')->leftJoin('transactions', 'transactions.customer_id', '=', 'customers.id')->select('customers.id', 'customers.name', DB::raw('COUNT(transactions.total) AS countTrans'), 'customers.created_at', DB::raw('SUM(transactions.total) AS total'))->where('transactions.is_void','=',0)->where('transactions.status','=','Paid')->groupBy('customers.id');
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.id', '=', $id);
			}
		}
		
		if($custName != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.name', 'LIKE', '%'.$custName.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.name', 'LIKE', '%'.$custName.'%');
			}
		}
		
		if($count != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->having(DB::raw('COUNT(transactions.total)'),'>',$count);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->having(DB::raw('COUNT(transactions.total)'),'>',$count);
			}
		}
		
		if($total != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->having(DB::raw('SUM(transactions.total)'),'>',$total);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->having(DB::raw('SUM(transactions.total)'),'>',$total);
			}
		}
		
		
		
		if($created_at != '-')
		{
			if($isFirst == false)
			{
				//$resultTab = $joined->where('customers.created_at', '=', $created_at);
				$resultTab = $joined->where('customers.created_at', 'LIKE', '%'.$created_at.'%');
				$isFirst = true;
			}
			else
			{
				//$resultTab = $resultTab->where('customers.created_at', '=', $created_at);
				$resultTab = $resultTab->where('customers.created_at', 'LIKE', '%'.$created_at.'%');
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
	
	public function getSortedFilteredAccount($id, $custName, $count, $total, $created_at)
	{
		$isFirst = false;
		
		$joined = DB::table('customers')->leftJoin('transactions', 'transactions.customer_id', '=', 'customers.id')->select('customers.id', 'customers.name', DB::raw('COUNT(transactions.total) AS countTrans'), 'customers.created_at', DB::raw('SUM(transactions.total) AS total'))->groupBy('customers.id');
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.id', '=', $id);
			}
		}
		
		if($custName != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('customers.name', 'LIKE', '%'.$custName.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('customers.name', 'LIKE', '%'.$custName.'%');
			}
		}
		
		
		if($count != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->having(DB::raw('COUNT(transactions.total)'),'>',$count);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->having(DB::raw('COUNT(transactions.total)'),'>',$count);
			}
		}
		
		if($total != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->having(DB::raw('SUM(transactions.total)'),'>',$total);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->having(DB::raw('SUM(transactions.total)'),'>',$total);
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

	public function getById($id)
	{
		$customer = Customer::find($id);
		return $this->getReturn($customer);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $customerName
		@return : data customer dengan nama tertentu
		-) Fungsi ini digunakan untuk mencari data customer sesuai dengan nama tertentu
	*/
	public function getByName($customerName)
	{
		$customer = Customer::where('name','=',$customerName)->get();
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
	
	public function getTop10Buyer()
	{
		$respond = array();
		$customer = DB::table('transactions')->select(DB::raw('customer_id,sum(total) as total'))->where('transactions.status','=','Paid')->where('transactions.is_void','=',0)->whereRaw('MONTH(created_at) >= MONTH(curdate())')->whereRaw('YEAR(created_at) >= YEAR(curdate())')->groupBy('customer_id')->orderBy('total','dsc')->take(10)->get();
		foreach($customer as $cust)
		{
			$cust->name = Customer::find($cust->customer_id)->name;
		}
		
		return $customer;
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
