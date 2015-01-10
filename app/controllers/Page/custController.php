<?php

class custController extends \HomeController{
	public function view_customer(){
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$customerController = new CustomersController();
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$allData = $customerController->getAlls();
				$allDataJson = json_decode($allData->getContent());			
			}
			else
			{
				$allData = $customerController->getSortedAll($sortBy, $order);
				$allDataJson = json_decode($allData->getContent());
			}
			$datas = null;
			if($allDataJson->{'status'} != 'Not Found')
			{
				$datas = $allDataJson->{'messages'};
			}

			return View::make('pages.customer.manage_customer', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			//$id, $custName, $count, $total, $created_at
			$id = Input::get('id','-');
			$name = Input::get('name', '-');
			$total = Input::get('total', '-');
			$count = Input::get('count', '-');
			$created_at = Input::get('created_at', '-');
			
			if($sortBy == "none")
			{
				$allData = $customerController->getFilteredAccount($id, $name, $count, $total, $created_at);
			}
			else
			{
				$allData = $customerController->getFilteredAccount($id, $name, $count, $total, $created_at, $sortBy, $order);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allDataJson = json_decode($allData->getContent());	
			$datas = null;
			if($allDataJson->{'status'} != 'Not Found')
			{
				$datas = $allDataJson->{'messages'};
			}
			
			return View::make('pages.customer.manage_customer', compact('datas','sortBy','order','filtered','id','name','total','count','created_at'));
		}
		
	}
	
	public function view_history(){
		$id = Input::get('id');
		
		$transaction = $this->findSpesificTransaction($id);
		if($transaction!=null){
			foreach($transaction as $trans){
				$trans->salesName = $this->findSalesName($trans->sales_id);
			}
		}
		
		return View::make('pages.customer.customer_history', compact('transaction'));
	}
	
	public function findSalesName($sales_id){
		$salesData = Account::where('id', '=', $sales_id)->get();
		$username = "";
		foreach($salesData as $data){
			$username = $data->username;
		}
		return $username;
	}
	
	public function findSpesificTransaction($cust_id){
		$transaction = Transaction::where('customer_id', '=', $cust_id)->get();
		return $transaction;
	}
	
	public function countTransaction($cust_id){
		$transaction = Transaction::where('customer_id','=', $cust_id)->get();
		$count = 0;
		if($transaction!=null){
			foreach($transaction as $trans){
				$count++;
			}
		}
		return $count;
	}
	
	public function countTotal($cust_id){
		$transaction = Transaction::where('customer_id','=', $cust_id)->get();
		$total = 0;
		if($transaction!=null){
			foreach($transaction as $trans){
				$total = $total+$trans->total;
			}
		}
		return $total;
	}
}