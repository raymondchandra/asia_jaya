<?php

class transController extends \HomeController{

	public function view_transaction()
	{
		$transactionController = new TransactionsController();
		$allData = $transactionController->getAll();
		$allDataJson = json_decode($allData->getContent());
		
		if($allDataJson->{'status'}!='Not Found'){
			$dataAll = $allDataJson->{'messages'};
			foreach($dataAll as $data){
				$data->customerName = Customer::find($data->customer_id)->name;
				$data->salesName = Account::find($data->sales_id)->username;
				$data->order = $this->getOrderArray($data->id);
			}
		}else{
			$dataAll = null;
		}
		return View::make('pages.transaction.manage_transaction', compact('dataAll'));
		/*
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$accountController = new AccountsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$allEmployeeJson = $accountController->getAll();
				$allEmployee = json_decode($allEmployeeJson->getContent());
			}
			else
			{
				$allEmployeeJson = $accountController->getSortedAll($sortBy, $order);
				$allEmployee = json_decode($allEmployeeJson->getContent());
			}
			$datas = null;
			if($allEmployee->{'status'} != 'Not Found'){
				$allEmployeeData = $allEmployee->{'messages'};
				foreach($allEmployeeData as $allData){
					if($allData->role == '2' || $allData->role == '3'){
						$datas[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
					}
				}
			}

			return View::make('pages.account.manage_account', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			$username = Input::get('username','-');
			$role = Input::get('role', '-');
			$lastLogin = Input::get('lastLogin', '-');
			$active = Input::get('active', '-');
			
			if($sortBy == "none")
			{
				$allEmployeeJson = $accountController->getFilteredAccount($username, $role, $lastLogin, $active);
			}
			else
			{
				$allEmployeeJson = $accountController->getSortedFilteredAccount($username, $role, $lastLogin, $active, $sortBy, $order);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allEmployee = json_decode($allEmployeeJson->getContent());
			$datas = null;
			if($allEmployee->{'status'} != 'Not Found'){
				$allEmployeeData = $allEmployee->{'messages'};
				foreach($allEmployeeData as $allData){
					if($allData->role == '2' || $allData->role == '3'){
						$datas[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
					}
				}
			}

			return View::make('pages.account.manage_account', compact('datas','sortBy','order','filtered','username','role','lastLogin','active'));
		}
		
		*/
		
	}

	function updateVoid(){
		$transactionController = new TransactionsController();
		$id = 1;
		
		$update = $transactionController->updateVoid($id);
		
		return $update;
	}
	
	function updatePrintCustomer(){
		$transactionController = new TransactionsController();
		$id = 1;
		
		$update = $transactionController->updatePrintCustomer($id);
		
		return $update;
	}
	
	function getOrderByTransactionId($id){
		$idTransaction = $id;
		$order = Order::where('transaction_id', 'LIKE', $idTransaction)->get();
		
		if(count($order) == 0)
		{
			$order = null;
			$response = array('code'=>'404','status' => 'Not Found', 'messages' => $order);
		}
		else
		{
			foreach($order as $ord)
			{
				$product_detail = ProductDetail::find($ord->product_detail_id);
				$product = Product::find($product_detail->product_id);
				$ord->namaProduk = $product->name;
				$ord->warna = $product_detail->color;
				$ord->hargaSatuan = $product->sales_price;
			}
			$response = array('code'=>'200','status' => 'OK', 'messages' => $order);
		}
		
		return Response::json($response);
	}
	
	function getOrderArray($transaction_id){
		$order = Order::where('transaction_id', 'LIKE', $transaction_id)->get();
		$orderList = json_decode($order);
		$dataArray = null;
		foreach($orderList as $list){
			$dataArray[] = array(
				'id' => $list->id,
				'quantity' => $list->quantity,
				'transaction_id' => $list->transaction_id,
				'price' => $list->price,
				'product_detail_id' => $list->product_detail_id
			);
		}
		
		return $dataArray;
	}
	
	function getAllTransaction(){
		$transactionController = new TransactionsController();
		$allData = $transactionController->getAll();
		$allDataJson = json_decode($allData->getContent());
		
		if($allDataJson->{'status'}!='Not Found'){
			$dataAll = $allDataJson->{'messages'};
			foreach($dataAll as $data){
				$data->salesName = Account::find($data->sales_id)->username;
				$data->customerName = Customer::find($data->customer_id)->name;
				$data->order = $this->getOrderArray($data->id);
			}
			
			$response = array('code'=>'200','status' => 'OK','messages'=>$dataAll);
		}else{
			$response = array('code'=>'404','status' => 'Not Found');
		}
		
		return Response::json($response);
	}

}