<?php

class transController extends \HomeController{

	public function view_transaction()
	{
		$transactionController = new TransactionsController();
		
		$dataAll = Transaction::whereRaw('created_at >= curdate()')->get();
		if(count($dataAll) != 0)
		{
			foreach($dataAll as $data){
				$data->customerName = Customer::find($data->customer_id)->name;
				$data->salesName = Account::find($data->sales_id)->username;
				$data->order = $this->getOrderArray($data->id);
			}
		}
		else
		{
			$dataAll = null;
		}
		return View::make('pages.transaction.manage_transaction', compact('dataAll'));
		/*
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
		*/
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
	
	public function view_all_transaction()
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
		
		return View::make('pages.laporan_transaction.manage_laporan_transaction', compact('dataAll'));
	}
	
	public function view_all_transaction2()
	{
	
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$transactionController = new TransactionsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$allTransactionJson = $transactionController->getAll();
				$allTransaction = json_decode($allTransactionJson->getContent());
				if($allTransaction->{'status'}!='Not Found'){
					$dataAll = $allTransaction->{'messages'};
					foreach($dataAll as $data){
						$data->name = Customer::find($data->customer_id)->name;
						$data->username = Account::find($data->sales_id)->username;
						$data->order = $this->getOrderArray($data->id);
					}
				}
			}
			else
			{
				$allTransactionJson = $transactionController->getSortedAll($sortBy, $order);
				$allTransaction = json_decode($allTransactionJson->getContent());
				if($allTransaction->{'status'}!='Not Found'){
					$dataAll = $allTransaction->{'messages'};
					foreach($dataAll as $data){
						$data->order = $this->getOrderArray($data->id);
					}
				}
			}
			$datas = null;
			if($allTransaction->{'status'} != 'Not Found'){
				foreach($dataAll as $allData){
					$datas[] = (object)array('id'=>$allData->id, 'name'=>$allData->name, 'total'=>$allData->total, 'discount'=>$allData->discount, 'tax'=>$allData->tax, 'sales_id'=>$allData->sales_id, 'username'=>$allData->username, 'void'=>$allData->is_void, 'status'=>$allData->status, 'order'=>$allData->order, 'total_paid'=>$allData->total_paid);
				}
			}

			return View::make('pages.laporan_transaction.manage_laporan_transaction', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			$id = Input::get('id','-');
			$name = Input::get('name', '-');
			$total = Input::get('total', '-');
			$discount = Input::get('discount', '-');
			$tax = Input::get('tax', '-');
			$sales_id = Input::get('sales_id', '-');
			$username = Input::get('username', '-');
			$void = Input::get('void', '-');
			$status = Input::get('status', '-');
			
			if($sortBy == "none")
			{
				$allTransactionJson = $transactionController->getFilteredAccount($id, $name, $total, $discount, $tax, $sales_id, $username, $void, $status);
			}
			else
			{
				$allTransactionJson = $transactionController->getSortedFilteredAccount($id, $name, $total, $discount, $tax, $sales_id, $username, $void, $status, $sortBy, $order);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allTransaction = json_decode($allTransactionJson->getContent());
			$datas = null;
			if($allTransaction->{'status'} != 'Not Found'){
				$allTransactionData = $allTransaction->{'messages'};
				foreach($allTransactionData as $allData){
					$allData->order = $this->getOrderArray($allData->id);
					$datas[] = (object)array('id'=>$allData->id, 'name'=>$allData->name, 'total'=>$allData->total, 'discount'=>$allData->discount, 'tax'=>$allData->tax, 'sales_id'=>$allData->sales_id, 'username'=>$allData->username, 'void'=>$allData->is_void, 'status'=>$allData->status, 'order'=>$allData->order, 'total_paid'=>$allData->total_paid);
					
				}
			}

			return View::make('pages.laporan_transaction.manage_laporan_transaction', compact('datas','sortBy','order','filtered','id','name','total','discount','tax','sales_id','username','void','status'));
		}
	
		/*
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
		
		return View::make('pages.laporan_transaction.manage_laporan_transaction', compact('dataAll'));
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
	
	function getOrderByTransactionId(){
		$idTransaction = Input::get('data');
		$order = Order::where('transaction_id', '=', $idTransaction)->get();
		
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
				$ord->foto = $product_detail->photo;
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
	
	public function updateTransaction()
	{
		$id = Input::get('data');
		$total = Input::get('total');
		$total_paid = Input::get('paid');
		$discount = Input::get('discount');
		$print_customer = 1;
		$print_shop = 0;
		$status = "Paid";
		$controller = new TransactionsController();
		$result = $controller->updateTransactionById($id, $total, $total_paid, $discount, $print_customer, $print_shop, $status);
		if($result == 1)
		{
			//update cash
			$cash = new CashesController();
			//$transactionId, $in, $out, $type
			$cashUpdate = $cash->insertWithParam($id, $total, $total_paid-$total,"transaction");
			$cashResult = json_decode($cashUpdate->getContent());
			if($cashResult->{'code'} == 201)
			{
				$response = array('code'=>'200','status' => 'OK');
			}
			else
			{
				$response = array('code'=>'500','status' => 'NOK');
			}		
		}
		else
		{
			$response = array('code'=>'500','status' => 'NOK');
		}
	}

}