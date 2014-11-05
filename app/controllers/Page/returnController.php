<?php

class returnController extends \HomeController{
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return :
		-) Fungsi ini digunakan apabila ada pembeli ynag ingin menukarkan barang yang telah dibeli
		-) Type mempunyai 3 jenis, yaitu 1=>barang dengan uang, 2=>barang dengan baarang sama, dan 3=>barang dengan barang beda
	*/
	public function returnProduct(){
		//Dummy data
		$orderId = 1;
		$type = 1;
		$status = "pending";
		$solution = "pending";
		$tradeProductId = 1;
		$difference = 0;
		
		$returnController = new ReturnsController();
		$addReturns = $returnController->insertWithParam($orderId, $type, $status, $solution, $tradeProductId, $difference);
		return $addReturns;
	}
	
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
			$updateStorage = $productDetailController->updateStorage($productId, $storageAmount);
			
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
	
	public function doRestock($type){
		$restockId = -1;
	
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
		
		$type = 4;
		
		$respond = array();
		
		//update status and solution;
		$updateReturn = $this->updateReturn($returnId);
		if($updateReturn==1){
			//find product id
			$productId = $this->findProductId($returnId);
			if($productId != -1){
				//add product
				$addProduct = $this->addProduct($productId, $quantityShopTotal, $quantityStorageTotal);
				if($addProduct==1){
					//add product detail and get its id. There is a possibility to use foreach in here
					$productDetailId = $this->addProductDetail($productId, $color, $quantityShopColor, $quantityStorageColor);
					if($productDetailId != -1){
						//add restock and get its id
						$restockId = $this->doRestock($type);
						if($restockId != -1){
							//add restock detail
							$addRestockDetail = $this->doRestockDetail($restockId, $productDetailId, $quantityShopColor, $quantityStorageColor);
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
}
