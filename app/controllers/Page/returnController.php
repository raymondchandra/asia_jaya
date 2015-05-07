<?php

class returnController extends \HomeController{
	
	public function updateReturn($returnId){
		$returnController = new ReturnsController();
	
		$statusJson = $returnController->updateStatus($returnId);
		$solutionJson = $returnController->updateSolution($returnId);
		$status = json_decode($statusJson->getContent());
		$solution = json_decode($solutionJson->getContent());
		
		if($status->{'status'} == 'No Content' && $solution->{'status'} == 'No Content'){
			return 1;
		}else{
			return -1;
		}
	}
	
	public function findProductId($returnId){
		$returnDB = ReturnDB::find($returnId);
		if($returnDB!=null){
			return $returnDB->trade_product_id;
		}else{
			return -1;
		}
	}
	
	public function addProduct($productId, $shopAmount, $storageAmount){
		$productController = new ProductsController();
		
		$updateShop = $productController->updateShop($productId, $shopAmount);
		$updateShopDecode = json_decode($updateShop->getContent());
		
		$updateStorage = $productController->updateStorage($productId, $storageAmount);
		$updateStorageDecode = json_decode($updateStorage->getContent());
		
		if($updateShopDecode->{'status'} == 'No Content' && $updateStorageDecode->{'status'} == 'No Content'){
			return 1;
		}else{
			return -1;
		}
	}
	
	public function minusProduct($productId, $shopAmount, $storageAmount){
		$productController = new ProductsController();
		
		$updateShop = $productController->updateMinusShop($productId, $shopAmount);
		$updateShopDecode = json_decode($updateShop->getContent());
		
		$updateStorage = $productController->updateMinusStorage($productId, $storageAmount);
		$updateStorageDecode = json_decode($updateStorage->getContent());
		
		if($updateShopDecode->{'status'} == 'No Content' && $updateStorageDecode->{'status'} == 'No Content'){
			return 1;
		}else{
			return -1;
		}
	}
	
	public function findProductDetailId($productDetailController, $productId, $color){
		$productDetailId = -1;
		
		/* this one isn't work. Don't know why
			$listProduct = ProductDetail::where('product_id','=',$productId);
			foreach($listProduct as $list){
				if($list->color == $color){
					$productDetailId = $list->id;
				}
			}
		*/
		
		$allData = $productDetailController->getAll();
		$dataJson = json_decode($allData->getContent());
		if($dataJson->{'status'} != 'Not Found'){
			$listProduct = $dataJson->{'messages'};
			foreach($listProduct as $list){
				if($list->product_id == $productId){
					if($list->color == $color){
						$productDetailId = $list->id;
					}
				}
			}
		}
		return $productDetailId;
	}
	
	public function addProductDetail($productId, $color, $shopAmount, $storageAmount){
		$productDetailController = new ProductDetailsController();
		$productDetailId = $this->findProductDetailId($productDetailController, $productId, $color);
		if($productDetailId != -1){
			$updateShop = $productDetailController->updateShop($productDetailId, $shopAmount);
			$updateStorage = $productDetailController->updateStorage($productDetailId, $storageAmount);
			
			$updateShopDecode = json_decode($updateShop->getContent());
			$updateStorageDecode = json_decode($updateStorage->getContent());
			
			if($updateShopDecode->{'status'} == 'No Content' && $updateStorageDecode->{'status'} == 'No Content'){
				return $productDetailId;
			}else{
				return -1;
			}
		}else{
			return -1;
		}
	}
	
	public function minusProductDetail($productId, $color, $shopAmount, $storageAmount){
		$productDetailController = new ProductDetailsController();
		$productDetailId = $this->findProductDetailId($productDetailController, $productId, $color);
		if($productDetailId != -1){
			$updateShop = $productDetailController->updateMinusShop($productDetailId, $shopAmount);
			$updateStorage = $productDetailController->updateMinusStorage($productDetailId, $storageAmount);
			
			$updateShopDecode = json_decode($updateShop->getContent());
			$updateStorageDecode = json_decode($updateStorage->getContent());
			
			if($updateShopDecode->{'status'} == 'No Content' && $updateStorageDecode->{'status'} == 'No Content'){
				return $productDetailId;
			}else{
				return -1;
			}
		}else{
			return -1;
		}
	}
	
	public function doRestock(){
		$restockId = -1;
		$type = 4;
	
		$restockController = new RestocksController();
		$restockStatus = $restockController->insertWithParam($type);
		$restockStat = json_decode($restockStatus->getContent());
		
		if($restockStat->{'status'} == 'Created'){
			$all = $restockController->getAll();
			$allJson = json_decode($all->getContent());
			
			if($allJson->{'status'} != 'Not Found'){
				$allMsg = $allJson->{'messages'};
				foreach($allMsg as $msg){
					$restockId = $msg->id;
				}
			}
		}
		
		return $restockId;
	}
	
	public function doRestockDetail($restockId, $productDetailId, $shopAmount, $storageAmount){
		$restockDetailController = new RestockDetailsController();
		
		$restockStatus = $restockDetailController->insertWithParam($restockId, $productDetailId, $shopAmount, $storageAmount);
		$statusJson = json_decode($restockStatus->getContent());
		
		if($statusJson->{'status'} == 'Created'){
			return 1;
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return :
		-) Fungsi ini digunakan memfinalisasi proses return yang dilakukan sebelumnya
	*/
	public function finalizeReturn(){
		$returnId = 1;
		
		$color = 'Sienna';
		$quantityShopColor = 100;
		$quantityStorageColor = 100;
		
		$quantityShopTotal = 100;
		$quantityStorageTotal = 100;
		
		$type = 2;
		
		$respond = array();
		
		//update status and solution;
		$updateReturn = $this->updateReturn($returnId);
		if($updateReturn==1){
			//find product id
			$productId = $this->findProductId($returnId);
			if($productId != -1){
				//add product
				$addProduct = $this->addProduct($productId, $quantityShopTotal, $quantityStorageTotal);
				if($type == 3){
					$minusProduct = $this->minusProduct($productId, $quantityShopTotal, $quantityStorageTotal);
				}else{
					$minusProduct = 1;
				}
				if($addProduct==1 && $minusProduct == 1){
					//add product detail and get its id. There is a possibility to use foreach in here
					$productDetailIdAdd = $this->addProductDetail($productId, $color, $quantityShopColor, $quantityStorageColor);
					if($type == 3){
						$productDetailIdMinus = $this->minusProductDetail($productId, $color, $quantityShopColor, $quantityStorageColor);
					}else{
						$productDetailIdMinus = 0;
					}
					if($productDetailIdAdd != -1 && $productDetailIdMinus != -1){
						//add restock and get its id
						$restockId = $this->doRestock();
						if($restockId != -1){
							//add restock detail
							$addRestockDetail = $this->doRestockDetail($restockId, $productDetailIdAdd, $quantityShopColor, $quantityStorageColor);
							if($addRestockDetail == 1){
								$respond = array('code'=>'201','status' => 'Created');
							}else{
								$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'add restock detail failed');
							}
						}else{
							$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'add restock failed');
						}
					}else{
						$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'add product detail failed');
					}
				}else{
					$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'add product failed');
				}
			}else{
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'product id not found');
			}
		}else{
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'update return table failed');
		}
		
		return Response::json($respond);
	}
	
	//bagian sambung ke view
	/*
	public function view_return(){
		$returnController = new ReturnsController();
		$dataJson = $returnController->getAll();
		$data = json_decode($dataJson->getContent());
		$dataAll = null;
		
		if($data->{'status'}!='Not Found'){
			$dataAll = $data->{'messages'};
		}
		
		return View::make('pages.return.manage_return', compact('dataAll'));
	}
	*/
	
	public function view_return()
	{
		//return View::make('pages.admin.attribute.manage_attribute', compact('attributes','sortBy','sortType','page','filtered'));
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$returnController = new ReturnsController();
		
		$start_date = Input::get('start_date');
		$end_date = Input::get('end_date');
		
		if($start_date != '' && $end_date != ''){
			//$finalEndDate = $this->addDate($end_date);
			$from = date("Y-m-d, G:i:s", (strtotime ( '-1 day' , strtotime ( $start_date) ) ));
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
				$allReturnJson = $returnController->getAll();
				$allReturn = json_decode($allReturnJson->getContent());
				
				if($allReturn->{'status'} != 'Not Found'){
					$allReturnData = $allReturn->{'messages'};
					foreach($allReturnData as $data){
						$order = Order::find($data->order_id);
						$transaction = Transaction::find($order->transaction_id);
						$prod_id = ProductDetail::find($order->product_detail_id)->product_id;
						
						$data->no_nota = $transaction->no_faktur;
						$data->kode_barang = Product::find($prod_id)->product_code;
						$data->nama_pelanggan = Customer::find($transaction->customer_id)->name;
						$data->productColor = ProductDetail::find($order->product_detail_id)->color;
					}
				}else{
					$allReturnData = null;
				}
			}
			else
			{
				$allReturnJson = $returnController->getSortedAll($sortBy, $order, $from, $to);
				$allReturn = json_decode($allReturnJson->getContent());
				
				if($allReturn->{'status'} != 'Not Found'){
					$allReturnData = $allReturn->{'messages'};
				}else{
					$allReturnData = null;
				}
			}
			$datas = null;
			if($allReturnData != null){
				foreach($allReturnData as $allData){
					if($allData->trade_product_id != null)
					{
						if($allData->trade_product_id != null)
						{
							$productDetail = ProductDetail::find($allData->trade_product_id);
							$product = Product::find($productDetail->product_id);
							$prdCd = $product->product_code;
							$prdClr = $productDetail->color;
						}
						else
						{
							$prdCd = '-';
							$prdClr = '-';
						}
						$datas[] = (object)array('id'=>$allData->id, 'no_nota'=>$allData->no_nota, 'kode_barang'=>$allData->kode_barang, 'nama_pelanggan'=>$allData->nama_pelanggan, 'type'=>$allData->type, 'status'=>$allData->status, 'solution'=>$allData->solution, 'trade_product_id'=>$prdCd, 'difference'=>$allData->difference, 'created_at'=>$allData->created_at, 'trade_color'=>$prdClr,'product_color'=>$allData->productColor);
					}
					else
					{
						$datas[] = (object)array('id'=>$allData->id, 'no_nota'=>$allData->no_nota, 'kode_barang'=>$allData->kode_barang, 'nama_pelanggan'=>$allData->nama_pelanggan, 'type'=>$allData->type, 'status'=>$allData->status, 'solution'=>$allData->solution, 'trade_product_id'=>'-', 'difference'=>$allData->difference, 'created_at'=>$allData->created_at,'trade_color'=>'-','product_color'=>$allData->productColor);
					}
					
				}
			}

			return View::make('pages.return.manage_return', compact('datas','sortBy','order','filtered','start_date','end_date'));
		}
		else
		{
			$no_nota = Input::get('no_nota','-');
			$kode_barang = Input::get('kode_barang','-');
			$nama_pelanggan = Input::get('nama_pelanggan','-');
			$type = Input::get('type', '-');
			$status = Input::get('status', '-');
			$solution = Input::get('solution', '-');
			$trade_product_id = Input::get('trade_product_id', '-');
			$difference = Input::get('difference', '-');
			$created_at = Input::get('created_at', '-');
			
			if($sortBy == "none")
			{
				$allReturnJson = $returnController->getFilteredAccount($no_nota, $kode_barang, $nama_pelanggan, $type, $status, $solution, $trade_product_id, $difference, $created_at, $from, $to);
			}
			else
			{
				$allReturnJson = $returnController->getSortedFilteredAccount($no_nota, $kode_barang, $nama_pelanggan, $type, $status, $solution, $trade_product_id, $difference, $created_at, $sortBy, $order, $from, $to);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allReturn = json_decode($allReturnJson->getContent());
			$datas = null;
			if($allReturn->{'status'} != 'Not Found'){
				$allReturnData = $allReturn->{'messages'};
				foreach($allReturnData as $allData){
					if($allData->trade_product_id != null)
						{
							$productDetail = ProductDetail::find($allData->trade_product_id);
							$product = Product::find($productDetail->product_id);
							$prdCd = $product->product_code;
							$prdClr = $productDetail->color;
						}
						else
						{
							$prdCd = '-';
							$prdClr = '-';
						}
					$datas[] = (object)array('id'=>$allData->id, 'no_nota'=>$allData->no_nota, 'kode_barang'=>$allData->kode_barang, 'nama_pelanggan'=>$allData->nama_pelanggan, 'type'=>$allData->type, 'status'=>$allData->status, 'solution'=>$allData->solution, 'trade_product_id'=>$prdCd, 'difference'=>$allData->difference, 'created_at'=>$allData->created_at,'trade_color'=>$prdClr,'product_color'=>$allData->productColor);
				}
			}

			return View::make('pages.return.manage_return', compact('datas','sortBy','order','filtered','no_nota','kode_barang','nama_pelanggan','type','status','solution','trade_product_id', 'difference','created_at', 'start_date', 'end_date'));
		}
		
		
		
	}
	
	public function search_product_return(){
		//$transaction_id = Input::get('data');
		//$transaction_id = 1;
		
		$dataOrder = Transaction::where('id', '>', 0)->where('is_void','=',0)->get();
		foreach($dataOrder as $data){
			$data->cust_name = $this->find_cust_name($data->id);
		}
		
		//return $transaction_id;
		return View::make('pages.return.search_return', compact('dataOrder'));
	}
	
	/*
	public function search_product_return()
	{
		//return View::make('pages.admin.attribute.manage_attribute', compact('attributes','sortBy','sortType','page','filtered'));
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$returnController = new ReturnsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$dataAll = Order::where('transaction_id', '>', 0)->get();
				foreach($dataAll as $data){
					$data->cust_name = $this->find_cust_name($data->transaction_id);
					$product_data = $this->find_product_order($data->product_detail_id);
					$data->prod_id = $product_data->id;
					$data->prod_code = $product_data->product_code;
					$data->prod_name = $product_data->name;
				}
			}
			else
			{
				$dataJson = $returnController->getSortedAll2($sortBy, $order);
				$data = json_decode($dataJson->getContent());
				if($data->{'status'} != 'Not Found'){
					$dataAll = $data->{'messages'};
				}
			}
			$datas = null;
			foreach($dataAll as $allData){
				$datas[] = (object)array('id'=>$allData->id, 'cust_name'=>$allData->cust_name, 'prod_code'=>$allData->prod_code, 'prod_name'=>$allData->prod_name, 'transaction_id'=>$allData->transaction_id, 'created_at'=>$allData->created_at, 'quantity'=>$allData->quantity, 'price'=>$allData->price, 'prod_id'=>$allData->prod_id);
			}

			return View::make('pages.return.search_return', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			$id = Input::get('id','-');
			$cust_name = Input::get('cust_name', '-');
			$prod_code = Input::get('prod_code', '-');
			$prod_name = Input::get('prod_name', '-');
			$transaction_id = Input::get('transaction_id', '-');
			$created_at = Input::get('created_at', '-');
			
			if($sortBy == "none")
			{
				$dataAllJson = $returnController->getFilteredAccount2($id, $cust_name, $prod_code, $prod_name, $transaction_id, $created_at);
			}
			else
			{
				$dataAllJson = $returnController->getSortedFilteredAccount2($id, $cust_name, $prod_code, $prod_name, $transaction_id, $created_at, $sortBy, $order);
			}
			
			$dataAll = json_decode($dataAllJson->getContent());
			$datas = null;
			if($dataAll->{'status'} != 'Not Found'){
				$data = $dataAll->{'messages'};
				foreach($data as $allData){
					$datas[] = (object)array('id'=>$allData->id, 'cust_name'=>$allData->cust_name, 'prod_code'=>$allData->prod_code, 'prod_name'=>$allData->prod_name, 'transaction_id'=>$allData->transaction_id, 'created_at'=>$allData->created_at, 'quantity'=>$allData->quantity, 'price'=>$allData->price, 'prod_id'=>$allData->prod_id);
				}
			}

			return View::make('pages.return.search_return', compact('datas','sortBy','order','filtered','id','cust_name','prod_code','prod_name','transaction_id','created_at'));
		}	
	}
	*/
	
	public function search_product_return2(){
		$cust_name = Input::get('cust_name');
		$prod_code = Input::get('prod_code');
		$prod_name = Input::get('prod_name');
		$no_nota = Input::get('no_nota');
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
		
		/*$list_cust = Customer::where('name', 'LIKE', $cust_name)->get();
		foreach($list_cust as $listCust){
			$cust_id = $listCust->id;
			$trans_list = Transaction::where('customer_id', '=', $cust_id);
			foreach($trans_list as $listTrans){
				$trans_id = $listTrans->id;
				$order_list = Order::where('transaction_id', '=', $trans_id);
				foreach($order_list as $listOrder){
					
				}
			}
		}*/
		
		$cust_id = Customer::where('name', 'LIKE', '%'.$cust_name.'%')->get();
		if($cust_id == null)
		{
			return null;
		}
		else
		{
			$ids = array();
			foreach($cust_id as $id)
			{
				$ids[] = $id->id;
			}
			if($from != '' && $to != ''){
				$joinTable = DB::table('orders')->join('product_details', 'orders.product_detail_id', "=",'product_details.id')->join('products', 'product_details.product_id',"=", 'products.id')->join('transactions', 'orders.transaction_id', '=', 'transactions.id')->whereIn('customer_id',$ids)->where('product_code', 'LIKE','%'.$prod_code.'%' )->where('name', 'LIKE', '%'.$prod_name.'%')->where('transactions.no_faktur', 'LIKE', '%'.$no_nota.'%')->where('transactions.is_void','=',0)->whereBetween('orders.created_at', array($from, $to))->select('transactions.customer_id AS customer_id', 'orders.transaction_id AS transaction_id', 'products.product_code AS prod_code', 'orders.id AS id', 'transactions.no_faktur AS no_nota', 'orders.quantity AS quantity', 'orders.price AS price', 'orders.created_at AS created_at')->groupBy('transactions.no_faktur')->get();
			}else{
				$joinTable = DB::table('orders')->join('product_details', 'orders.product_detail_id', "=",'product_details.id')->join('products', 'product_details.product_id',"=", 'products.id')->join('transactions', 'orders.transaction_id', '=', 'transactions.id')->whereIn('customer_id',$ids)->where('product_code', 'LIKE','%'.$prod_code.'%' )->where('name', 'LIKE', '%'.$prod_name.'%')->where('transactions.no_faktur', 'LIKE', '%'.$no_nota.'%')->where('transactions.is_void','=',0)->select('transactions.customer_id AS customer_id','orders.transaction_id AS transaction_id','products.product_code AS prod_code','orders.id AS id', 'transactions.no_faktur AS no_nota', 'orders.quantity AS quantity', 'orders.price AS price', 'orders.created_at AS created_at')->groupBy('transactions.no_faktur')->get();
			}
			foreach($joinTable as $data){
				$data->cust_name = Customer::find($data->customer_id)->name;
			}
			
			return $joinTable;
		}
		//$joinTransOr = DB::table('orders')->join('transactions', 'orders.transaction_id', '=', 'transactions.id')->where('customer_id', '=', $cust_id)->get();
		//$joinProdDet = DB::table('product_details')->join('products', 'product_details.product_id', '=', 'products.id')->get();
	}
	
	function getOrderByOrderId(){
		$id = Input::get('data');
		$order = Order::where('id','=',$id)->get();
		
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
				$ord->stock_shop = $product_detail->stock_shop;
				$ord->stock_storage = $product_detail->stock_storage;
			}
			$response = array('code'=>'200','status' => 'OK', 'messages' => $order);
		}
		
		return Response::json($response);
	}
	
	public function find_cust_name($transaction_id){
		$customer_id = Transaction::find($transaction_id)->customer_id;
		$customer_name = Customer::find($customer_id)->name;
		return $customer_name;
	}
	
	public function find_product_order($prod_detail_id){
		$prod_id = ProductDetail::find($prod_detail_id)->product_id;
		$prod_data = Product::find($prod_id);
		return $prod_data;
	}
	
	public function returnProduct(){
		$orderId = Input::get('order_id');
		$no_nota = Input::get('no_nota');
		$type = Input::get('type');
		$status = "pending";
		$solution = "pending";
		$tradeProductId = Input::get('trade_id');
		$return_quantity = Input::get('return_quantity');
		$difference = -1;
		$modDiff = -1;
		$nominal_uang = Input::get('nominal_uang');
		
		if($tradeProductId==''){
			$tradeProductId = null;
		}
		
		$order_data = Order::find($orderId);
		$product_detail_data = ProductDetail::find($order_data->product_detail_id);
		$product_data = Product::find($product_detail_data->product_id);
		$currentPrice = $product_data->sales_price; //ini adalah HARGA JUAL TAS SEKARANG
		$currentModal = $product_data->modal_price;
		$currentProfit = $currentPrice - $currentModal;
		$priceReturn = $order_data->price / $order_data->quantity; //ini adalah HARGA SATUAN TAS SAAT DIBELI
		$returnModal = $order_data->modal / $order_data->quantity;
		$priceReturn = $priceReturn * $return_quantity;
		$returnModal = $returnModal * $return_quantity;
		$returnProfit = $priceReturn - $returnModal;
		$out_amount = $priceReturn;
		$in_amount = 0;
		if($type == 1){
			$type = 1;
			$tradeProductId = $order_data->product_detail_id;
			$in_amount = $currentPrice * $return_quantity;
			//$difference = ($currentPrice * $return_quantity) - $priceReturn;
			/*difference untuk tukar barang sama akan selalu 0 walaupun inflasi*/
			$difference = 0;
			$modDiff = $returnProfit - ($currentProfit*$return_quantity);
			// if($difference<0){
			// 	$difference = 0;
			// }
			
		}else if($type == 2){
			$type = 2;
			
			$product_id = ProductDetail::find($tradeProductId)->product_id;
			$product_price = Product::find($product_id)->sales_price;
			$product_modal = Product::find($product_id)->modal_price;
			$in_amount = $product_price * $return_quantity;
			//$difference = ($product_price*$return_quantity)-$priceReturn;
			//newcode
			$difference = $nominal_uang - $priceReturn;			
			$in_amount = $nominal_uang;
			$modDiff = $returnProfit - ($product_modal*$return_quantity);
			if($difference < 0){
				$difference = $difference;
			}
		}else{
			$type = 3;
			
			$in_amount = $nominal_uang;
			if($nominal_uang != ''){
				//$difference = $nominal_uang-$priceReturn;
				$difference = $nominal_uang;
				$modDiff =  $nominal_uang - $returnProfit;
				if($difference<0){
					$difference = $difference;
				}
			}
		}
		
		$returnController = new ReturnsController();
		
		//edit stock
		//kurangin stock
		
		$orderPerPrice = $order_data->price / $order_data->quantity;
		$orderPerModal = $order_data->modal / $order_data->quantity;
		$newQuantity = $order_data->quantity - $return_quantity;
		$order_data->quantity = $newQuantity;
		$order_data->price = $newQuantity*$orderPerPrice;
		$order_data->modal = $newQuantity*$orderPerModal;
		try
		{			
			if($type != 3)
			{
				$transId = $order_data->transaction_id;
				$orderController = new OrdersController();
				$tradeProductDetail = ProductDetail::find($tradeProductId);
				$tradeProduct = Product::find($tradeProductDetail->product_id);
				$newModal = $tradeProduct->modal_price * $return_quantity;
				$newPrice = $tradeProduct->sales_price * $return_quantity;
				//return $newPrice;
				
				//kurangin stock si doi
				$productDetail = ProductDetail::find($tradeProductId);
				$productDetail_shop = $productDetail->stock_shop;
				$productDetail_storage = $productDetail->stock_storage;
				if($productDetail_shop < $return_quantity)
				{
					if($return_quantity > ($productDetail_shop + $productDetail_storage))
					{
						return "stok barang tidak cukup";
					}
					else
					{
						$newShopStock = 0;
						$newStorageStock = $productDetail_storage + $productDetail_shop - $return_quantity;
						//$quantity, $transactionId, $price, $prodDetailId, $modal
						//return $newPrice;
						//$orderController->insertWithParam($return_quantity, $transId, $newPrice, $tradeProductId, $newModal);
						$addReturns = $returnController->insertWithParam($no_nota, $orderId, $type, $status, $solution, $tradeProductId, $difference, $modDiff, $return_quantity, $out_amount, $in_amount);
						$temp = json_decode($addReturns->getContent());
						$productDetail->stock_shop = 0;
						$productDetail->stock_storage = $productDetail->stock_storage - ($return_quantity - $productDetail_shop);
						$productDetail->save();
						//$order_data->save();
					}
				}
				else
				{
					$newShopStock = $productDetail_shop - $return_quantity;
					//return $newPrice;
					//$orderController->insertWithParam($return_quantity, $transId, $newPrice, $tradeProductId, $newModal);
					$addReturns = $returnController->insertWithParam($no_nota, $orderId, $type, $status, $solution, $tradeProductId, $difference, $modDiff, $return_quantity, $out_amount, $in_amount);
					$temp = json_decode($addReturns->getContent());
					$productDetail->stock_shop = $productDetail_shop - $return_quantity;
					$productDetail->save();
					//$order_data->save();
				}
			}
			else
			{
				$addReturns = $returnController->insertWithParam($no_nota, $orderId, $type, $status, $solution, $tradeProductId, $difference, $modDiff, $return_quantity, $out_amount, $in_amount);
				$temp = json_decode($addReturns->getContent());
				//$order_data->save();
			}
			//return $addReturns;
			return $temp->{'status'};
		}
		catch(Exception $ex)
		{
			return "gagal";
		}
		return "gagal";
	}
	
	public function updateSolution()
	{
		$id = Input::get('data');
		$solusi = Input::get('solusi');
		$idx_solusi = Input::get('idx_solusi');
		$controller = new RestocksController();
		$returnController = new ReturnsController();
		
		// if($solusi == "Masukan ke stok toko")
		if($idx_solusi == 0)
		{
			//rubah stock
			$return = ReturnDB::find($id);
			$order = Order::find($return->order_id);
			$productDetail = ProductDetail::find($order->product_detail_id);
			$currentStock = $productDetail->stock_shop;
			$productDetail->stock_shop = $currentStock + $return->return_quantity;
			try
			{
				$productDetail->save();
				//restock
				$controller->insertWithParam(5, $productDetail->id, $return->return_quantity, 0);
			}
			catch(Exception $e)
			{
				
			}
			
			/*TIDAK USAH MASUK KE KAS KARENA HANYA BUTUH UPDATE STOK*/
			/*
			//masukin ke cash
			$cash = new CashesController();
			//$transactionId, $in, $out, $type
			$order = Order::find($return->order_id);
			$productDetail = ProductDetail::find($order->product_detail_id);
			$product = Product::find($productDetail->product_id);
			$cashUpdate = $cash->insertWithParam('-', 0, $product->modal_price * $return->return_quantity,"Obral");
			*/
			//NOTE : kolom 'current' di kas diisi harga_jual retur
			// $cashUpdate = $cash->insertWithParamByReturn
			// 										('-', 
			// 										0,															
			// 										0,
			// 										$product->sales_price * $return->return_quantity, 
			// 										"Retur");
		}
		else
		{

			//tambah barang obral
			$return = ReturnDB::find($id);
			$controller = new ProductDetailsController();
			$obralResult = $controller->addObral($return->return_quantity);
			if($obralResult == 1)
			{
				//masukin ke cash
				$cash = new CashesController();
				//$transactionId, $in, $out, $type
				$order = Order::find($return->order_id);
				$productDetail = ProductDetail::find($order->product_detail_id);
				$product = Product::find($productDetail->product_id);
				$cashUpdate = $cash->insertWithParam('-', 0, $product->modal_price * $return->return_quantity,"Obral");
				//NOTE : kolom 'current' di kas diisi harga_jual retur
				// $cashUpdate = $cash->insertWithParamByReturn
				// 										('-', 
				// 										0,															
				// 										$product->modal_price * $return->return_quantity,
				// 										$product->sales_price * $return->return_quantity, 
				// 										"Obral");
			}
			
		}
		return $returnController->updateSolution($id, $solusi);
	}
}
