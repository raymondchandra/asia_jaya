<?php

class transController extends \HomeController{

	/*
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
	}
	*/
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
	
	
	public function view_transaction(){
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$transactionController = new TransactionsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$dataAll = Transaction::whereRaw('created_at >= curdate()')->get();
				if(count($dataAll) != 0)
				{
					foreach($dataAll as $data){
						$data->name = Customer::find($data->customer_id)->name;
						$data->username = Account::find($data->sales_id)->username;
						$data->order = $this->getOrderArray($data->id);  
					}
				}else{
					$dataAll = null;
				}
			}
			else
			{
				$allTransactionJson = $transactionController->getSortedOnly($sortBy, $order);
				$allTransaction = json_decode($allTransactionJson->getContent());
				if($allTransaction->{'status'} != 'Not Found'){
					$dataAll = $allTransaction->{'messages'};
					foreach($dataAll as $data){
						$data->order = $this->getOrderArray($data->id); 
					}
				}else{
					$dataAll = null;
				}
			}
			$datas = null;
			if($dataAll != null){
				foreach($dataAll as $allData){
					$datas[] = (object)array('id'=>$allData->id, 'name'=>$allData->name, 'total'=>$allData->total, 'discount'=>$allData->discount, 'tax'=>$allData->tax, 'sales_id'=>$allData->sales_id, 'username'=>$allData->username, 'is_void'=>$allData->is_void, 'status'=>$allData->status, 'order'=>$allData->order, 'total_paid'=>$allData->total_paid, 'created_at'=>$allData->created_at, 'order'=>$allData->order, 'no_faktur'=>$allData->no_faktur);
				}
			}
		
			return View::make('pages.transaction.manage_transaction', compact('datas','sortBy','order','filtered'));
		}
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
	
	/*
	public function char_at($str, $pos)
	{
		return $str{$pos};
	}
	
	public function addDate($end_date){
		$month = "";
		$dates = "";
		$year = "";
		$i = 0;
		
		while($this->char_at($end_date,$i) != '/'){
			$month .= $this->char_at($end_date,$i);
			$i++;
		}
		$i++;
		while($this->char_at($end_date,$i) != '/'){
			$dates .= $this->char_at($end_date,$i);
			$i++;
		}
		$i++;
		while($i < strlen($end_date)){
			$year .= $this->char_at($end_date,$i);
			$i++;
		}
		
		$dates = intval($dates)+1;
		
		$end_date = $month . '/' . $dates . '/' . $year;
			
		return $end_date;
	}
	*/
	
	//reference ==> http://php.net/manual/en/function.date-add.php
	public function view_all_transaction2()
	{
	
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$transactionController = new TransactionsController();
		
		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');
		
		if($start_date != '' && $end_date != ''){
			//$finalEndDate = $this->addDate($end_date);
			$from = date("Y-m-d, G:i:s", strtotime($start_date));
			$to = date("Y-m-d, G:i:s", strtotime($end_date));
			$to = new DateTime($to);
			$diff1day = new DateInterval('P1D');
			$to->add($diff1day);
		}else{
			$from = '';
			$to = '';
		}
		
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
				$allTransactionJson = $transactionController->getSortedAll($sortBy, $order, $from, $to);
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
					$datas[] = (object)array('id'=>$allData->id, 'name'=>$allData->name, 'total'=>$allData->total, 'discount'=>$allData->discount, 'tax'=>$allData->tax, 'sales_id'=>$allData->sales_id, 'username'=>$allData->username, 'is_void'=>$allData->is_void, 'status'=>$allData->status, 'order'=>$allData->order, 'total_paid'=>$allData->total_paid, 'created_at'=>$allData->created_at, 'no_faktur'=>$allData->no_faktur);
				}
			}

			return View::make('pages.laporan_transaction.manage_laporan_transaction', compact('datas','sortBy','order','filtered','start_date','end_date'));
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
			$is_void = Input::get('is_void', '-');
			$status = Input::get('status', '-');
			
			if($sortBy == "none")
			{
				$allTransactionJson = $transactionController->getFilteredAccount($id, $name, $total, $discount, $tax, $sales_id, $username, $is_void, $status, $from, $to);
			}
			else
			{
				$allTransactionJson = $transactionController->getSortedFilteredAccount($id, $name, $total, $discount, $tax, $sales_id, $username, $is_void, $status, $sortBy, $order, $from, $to);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allTransaction = json_decode($allTransactionJson->getContent());
			$datas = null;
			if($allTransaction->{'status'} != 'Not Found'){
				$allTransactionData = $allTransaction->{'messages'};
				foreach($allTransactionData as $allData){
					$allData->order = $this->getOrderArray($allData->id);
					$datas[] = (object)array('id'=>$allData->id, 'name'=>$allData->name, 'total'=>$allData->total, 'discount'=>$allData->discount, 'tax'=>$allData->tax, 'sales_id'=>$allData->sales_id, 'username'=>$allData->username, 'is_void'=>$allData->is_void, 'status'=>$allData->status, 'order'=>$allData->order, 'total_paid'=>$allData->total_paid, 'created_at'=>$allData->created_at);
					
				}
			}

			return View::make('pages.laporan_transaction.manage_laporan_transaction', compact('datas','sortBy','order','filtered','id','name','total','discount','tax','sales_id','username','is_void','status','start_date','end_date'));
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
	
	/*
	public function filterByDateRange(){
		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');
		
		$from = date(date("Y-m-d, G:i:s", strtotime($start_date)));
		$to = date(date("Y-m-d, G:i:s", strtotime($end_date)));
		
		$dataAll = Transaction::whereBetween('created_at', array($from,$to))->get();
		foreach($dataAll as $data){
			$data->name = Customer::find($data->customer_id)->name;
			$data->username = Account::find($data->sales_id)->username;
			$data->order = $this->getOrderArray($data->id);
		}
		
		return $dataAll;
		
	}
	*/

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
				$ord->namaProduk = $product->product_code; //name;
				$ord->warna = $product_detail->color;
				$ord->hargaSatuan = $product->sales_price;
				$ord->foto = $product_detail->photo;
				$ord->stock_shop = $product_detail->stock_shop;
				$ord->stock_storage = $product_detail->stock_storage;
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
		if($total_paid>=$total)
		{
			$result = $controller->updateTransactionById($id, $total, $total_paid, $discount, $print_customer, $print_shop, $status);
			if($result == 1)
			{
				//update cash
				$cash = new CashesController();
				//$transactionId, $in, $out, $type
				$cashUpdate = $cash->insertWithParam($id, $total_paid, $total_paid-$total,"transaction");
				$cashResult = json_decode($cashUpdate->getContent());
				if($cashResult->{'code'} == 201)
				{
					$response = array('code'=>'200','status' => 'OK');
					return Response::json($response);
				}
				else
				{
					$response = array('code'=>'500','status' => 'NOK');
					return Response::json($response);
				}		
			}
			else
			{
				$response = array('code'=>'500','status' => 'NOK');
				return Response::json($response);
			}
		}
		else
		{
			$response = array('code'=>'500','status' => 'NOK');
			return Response::json($response);
		}
	}
	
	public function updateOrder()
	{
		$orderIds = Input::get('data');
		$orderQtys = Input::get('qty');
		$orderPrices = Input::get('prcs');
		$counter = Input::get('ctr');
		$deleted = Input::get('deleted');
		$orderController = new OrdersController();
		$cekResult = 1;
		$updateResult = 1;
		//deleteOrder dulu..permisi
		$deleted = explode(',',$deleted);
		if($deleted[0] == "-")
		{
			//ga ada yg harus di delete
		}
		else
		{
			for($x=0 ; $x<(count($deleted)-1) ;$x++)
			{
				$ord = Order::find($deleted[$x]);
				$ord->delete();
			}
		}
		
		for($i=0 ; $i<$counter ; $i++)
		{
			if($orderQtys[$i] == 0)
			{
				$i = $counter + 1;
				$cekResult = -1;
			}
		}
		
		if($cekResult == 1)
		{
			for($i=0 ; $i<$counter ; $i++)
			{
				$updateResult = $orderController->updateOrder($orderIds[$i], $orderQtys[$i], $orderPrices[$i]);
				if($updateResult == -1)
				{
					$i = $counter + 1;
				}
			}
			
			if($updateResult == 1)
			{
				$response = array('code'=>'200','status' => 'OK');
				return Response::json($response);
			}
			else
			{
				$response = array('code'=>'500','status' => 'NOK');
				return Response::json($response);
			}
		}
		else
		{
			$response = array('code'=>'500','status' => 'NOK');
			return Response::json($response);
		}
		
	}
	
	public function updateStock()
	{
		$orderIds = Input::get('data');
		$orderQtys = Input::get('qty');
		$counter = Input::get('ctr');
		$cekResult = 1;
		$message = "";
		$productDetailController = new ProductDetailsController();
		//cek dulu...
		for($i=0 ; $i<$counter ; $i++)
		{
			$orderDetail = Order::find($orderIds[$i]);
			$productDetail = ProductDetail::find($orderDetail->product_detail_id);
			$stock_shop = $productDetail->stock_shop;
			$stock_storage = $productDetail->stock_storage;
			if($orderQtys[$i] > $stock_shop)
			{
				//cek stock gudang
				if($orderQtys[$i] - $stock_shop > $stock_storage)
				{
					//wah masalah ni...kurang bro
					$i = $counter + 1;
					$cekResult = -1;
				}
				else
				{
					//ambil dari gudang juga.....
				}
			}
			else
			{
				//langsung kurangin aja JAK...
				
			}
		}
		//SIKAT!!!!!
		$updateResult = 1;
		if($cekResult == 1)
		{
			for($i=0 ; $i<$counter ; $i++)
			{
				$orderDetail = Order::find($orderIds[$i]);
				$productDetail = ProductDetail::find($orderDetail->product_detail_id);
				$message .= $productDetail->id;
				$stock_shop = $productDetail->stock_shop;
				$stock_storage = $productDetail->stock_storage;
				if($orderQtys[$i] > $stock_shop)
				{
					//cek stock gudang
					if($orderQtys[$i] - $stock_shop > $stock_storage)
					{
						//wah masalah ni...kurang bro
						$i = $counter + 1;
						$updateResult = -1;
					}
					else
					{
						//ambil dari gudang juga.....
						$productDetailController->updateMinusShop($productDetail->id, $stock_shop);
						$productDetailController->updateMinusStorage($productDetail->id, $orderQtys[$i]-$stock_shop);
					}
				}
				else
				{
					//langsung kurangin aja JAK...
					$productDetailController->updateMinusShop($productDetail->id, $orderQtys[$i]);
				}
				
				if($updateResult == -1)
				{
					$response = array('code'=>'500','status' => 'NOK');
					return Response::json($response);
				}
			}
			
			$response = array('code'=>'200','status' => 'NOK');
			return Response::json($response);
		}
		else
		{
			$response = array('code'=>'500','status' => 'NOK');
			return Response::json($response);
		}
		
	}
	
	public function makeVoid()
	{
		$id = Input::get('data');
		$transController = new TransactionsController();
		$voidResult = $transController->makeVoid($id);
		if($voidResult == 1)
		{
			$trans = Transaction::find($id);
			$cash = new CashesController();
			$cashUpdate = $cash->insertWithParam($id, 0, $trans->total,"void transaction");
			return Response::json($response = array('code'=>'200','status' => 'OK'));
		}
		else
		{
			return Response::json($response = array('code'=>'204','status' => 'NOK'));
		}
	}

}