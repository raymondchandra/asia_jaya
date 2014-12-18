<?php

class mobile_view extends \BaseController{

	/*
		@author : Gentry Swanri
		@parameter : $customerName
		@return : customerId or -1 if failed
		-) Fungsi untuk menambahkan customer baru ke dalam tabel customers
		-) Fungsi ini juga dilakukan agar customerId dapat digunakan sebagai referensi fungsi lain
	*/
	public function addCustomer($customerName){
		$customerController = new CustomersController();
		$addCustomer = $customerController->insertWithParam($customerName);
		$addJson = json_decode($addCustomer->getContent());
		
		if($addJson->{'status'}=="Created"){
			$custDataJson = $customerController->getByName($customerName);
			$dataJson = json_decode($custDataJson->getContent());
			
			if($dataJson->{'status'}=="Not Found"){
				return -1;
			}else{
				$data = $dataJson->{'messages'};
				foreach($data as $dataCust){
					$custId = $dataCust->id;
				}
				return $custId;
			}
		}else{
			//echo "customer = "; var_dump($addJson->{'messages'});
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $quantity, $transactionId, $price, $productDetailId
		@return : 1 for created, -1 for failed
		-) Fungsi untuk melakukan iterasi untuk semua jenis produk yang dibeli lalu memasukkannya ke dalam tabel order
	*/
	public function addOrders($quantity, $transactionId, $price, $productDetailId){
		$orderController = new OrdersController();
		$addOrder = $orderController->insertWithParam($quantity, $transactionId, $price, $productDetailId);
		$addJson = json_decode($addOrder->getContent());
		
		//echo $addJson->{'status'};
		
		if($addJson->{'status'}=="Created"){
			return 1;
		}else{
			echo "orders = "; var_dump($addJson->{'messages'});
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $salesId, $customerId, $total
		@return : transactionId, or -1 if failed
		-) Fungsi untuk menambahkan transaksi baru ke dalam tabel transaksi
		-) Fungsi ini juga dilakukan agar transactionId dapat digunakan sebagai referensi untuk fungsi lain
	*/
	public function addTransaction($salesId, $customerId, $total, $discount, $tax){
		$transactionController = new TransactionsController();
		$addTransaction = $transactionController->insertWithParam($customerId, $total, $salesId, $discount, $tax);
		$addJson = json_decode($addTransaction->getContent());
		
		if($addJson->{'status'}=="Created"){
			$dataTransaction = $transactionController->getByCustomerId($customerId);
			$dataJson = json_decode($dataTransaction->getContent());
			
			if($dataJson->{'status'}=="Not Found"){
				return -1;
			}else{
				$data = $dataJson->{'messages'};
				foreach($data as $dataTransaction){
					$transId = $dataTransaction->id;
				}
				return $transId;
			}
		}else{
			echo "Transaction = "; var_dump($addJson->{'messages'});
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return : success or failed
		-) Fungsi untuk melakukan finalisasi pembelian oleh customer
		-) Fungsi ini memanggil fungsi addCustomer, addTransaction, dan addOrders secara berurutan
		-) Diapnggil berulang kali sesuai dengan banyak produk yang diorder
	*/
	public function finalize(){
		/*
			-) Pramuniaga menekan tombol finalize lalu memasukkan nama customer
			-) Memanggil fungsi @addCustomer
			-) Memanggil fungsi @addTransaction
			-) Memanggil fungsi @addOrders
			-) Memanggil fungsi @addCashes
		*/
		
		//data transaksi (dummy)
		$total = Input::get('total');
		$custName = Input::get('customer_name');
		$idCustomer = Input::get('id_customer');
		$productList = Input::get('product_list');
		$discount = Input::get('discount');
		$tax = Input::get('tax');
		//var_dump($productList);
		//$productList[] = array("name"=>"ea", "color"=>"Gold","quantity"=>"3");
		//$productName = "fugit";
		//$color = "LightCoral";
		//salesId didapet dari Auth::user()->id
		$salesId = 1;
		$response = array();
		
		//addCustomer
		if($idCustomer == "none")
		{
			$customerId = $this->addCustomer($custName);
		}
		else
		{
			$customerId = $idCustomer;
		}

		if($customerId!=-1){
			//add Transaction
			$transactionId = $this->addTransaction($salesId, $customerId, $total, $discount, $tax);
			if($transactionId!=-1){
				$productController = new ProductsController();
				$productDetailController = new ProductDetailsController();
				foreach($productList as $prodList){
					$product = $productController->getByProductName($prodList["name"]);
					$productJson = json_decode($product->getContent());
					if($productJson->{'status'}=="Not Found"){
						$response = array('code'=>'500','status' => 'Internal Server Error', 'messages' => 'Product Name Not Found');
					}else{
						$productMessages = $productJson->{'messages'};
						foreach($productMessages as $prodMes){
							$productId = $prodMes->id;
							$price = $prodMes->sales_price;
						}
						$detailByProductId = $productDetailController->getByProductId($productId);
						$prodIdJson = json_decode($detailByProductId->getContent());
						if($prodIdJson->{'status'}=="Not Found"){
							$response = array('code'=>'500','status' => 'Internal Server Error', 'messages' => 'Product Id Not Found');
						}else{
							$detail = $prodIdJson->{'messages'};
							$productDetailId = -1;
							foreach($detail as $det){
								if($det->color == $prodList["color"]){
									$productDetailId = $det->id;
								}
							}
							
							if($productDetailId!=-1){
								//add Orders
								$addOrders = $this->addOrders($prodList['quantity'], $transactionId, $price, $productDetailId);
								if($addOrders!=-1){
									$response = array('code'=>'201','status' => 'Created');
								}else{
									$response = array('code'=>'500','status' => 'Internal Server Error', 'messages' => 'Add Order Failed');
								}
							}else{
								$response = array('code'=>'500','status' => 'Internal Server Error', 'messages' => 'Product Detail Id Not Found');
							}
						}
					}
				}
			}else{
				$response = array('code'=>'500','status' => 'Internal Server Error', 'messages' => 'Add Transaction Failed');
			}
		}else{
			$response = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $productList);
		}
		
		return Response::json($response);
	}

}