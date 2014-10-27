<?php

class finalizeSellController extends \HomeController{
	
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
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $transactionId
		@return : 1 for created, -1 for failed
		-) Fungsi untuk untuk melakukan proses pembayaran oleh customer atas pesanannya
	*/
	public function addCashes($transactionId){
		$cashController = new CashesController();
		$addCashes = $cashController->insertWithParam($transactionId);
		$addJson = json_decode($addCashes->getContent());
		
		if($addJson->{'status'}=="Created"){
			return 1;
		}else{
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
		
		echo $addJson->{'status'};
		
		if($addJson->{'status'}=="Created"){
			return 1;
		}else{
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
	public function addTransaction($salesId, $customerId, $total){
		$transactionController = new TransactionsController();
		$addTransaction = $transactionController->insertWithParam($customerId, $total, $salesId);
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
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return : success or failed
		-) Fungsi untuk melakukan finalisasi pembelian oleh customer
		-) Fungsi ini memanggil fungsi addCustomer, addTransaction, addOrders, dan addCashes secara berurutan
	*/
	public function finalize(){
		/*
			-) Pramuniaga menekan tombol finalize lalu memasukkan nama customer dan mendapatkan total harga
			-) Memanggil fungsi @addCustomer
			-) Memanggil fungsi @addTransaction
			-) Memanggil fungsi @addOrders
			-) Memanggil fungsi @addCashes
		*/
		
		//return "Posting Something";
		//data transaksi (dummy)
		///*
		$total = 500000;
		$custName = "Uji Coba Customer";
		$salesId = 99;
		$productName = "eius";
		$color = "FireBrick";
		$quantity = 3;
		
		//addCustomer
		$customerId = $this->addCustomer($custName);
		
		echo $customerId;
		
		if($customerId!=-1){
			//add Transaction
			$transactionId = $this->addTransaction($salesId, $customerId, $total);
			if($transactionId!=-1){
				$productController = new ProductsController();
				$product = $productController->getByProductName($productName);
				$productJson = json_decode($product->getContent());
				if($productJson->{'status'}=="Not Found"){
					return "product name not found == Failed";
				}else{
					$productMessages = $productJson->{'messages'};
					foreach($productMessages as $prodMes){
						$productId = $prodMes->id;
						$price = $prodMes->min_price;
					}
					$productDetailController = new ProductDetailsController();
					$detailByProductId = $productDetailController->getByProductId($productId);
					$prodIdJson = json_decode($detailByProductId->getContent());
					if($prodIdJson->{'status'}=="Not Found"){
						return "Product Id Not Found";
					}else{
						$detail = $prodIdJson->{'messages'};
						$productDetailId = -1;
						foreach($detail as $det){
							if($det->color == $color){
								$productDetailId = $det->id;
							}
						}
						
						if($productDetailId!=-1){
							//add Orders
							$addOrders = $this->addOrders($quantity, $transactionId, $price, $productDetailId);
							if($addOrders!=-1){
								return "Finalize Success";
								/*$addCashes = $this->addCashes($transactionId);
								if($addCashes!=-1){
									return "Finalize Success";
								}else{
									return "Add Cashes Failed";
								}*/
							}else{
								return "Add Orders Failed";
							}
						}else{
							return "Product Detail Id Not Found";
						}
					}
				}
			}else{
				return "Add Transaction Failed";
			}
		}else{
			return "Add Customer Failed";
		}
		//*/
	}
}