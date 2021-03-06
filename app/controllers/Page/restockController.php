<?php

class restockController extends \HomeController{
	
	/*
		@author : Gentry Swanri
		@paramater :
		@return : Created or Not
		-) Fungsi ini digunakan untuk melakukan restock
		-) type 1 = add new stock, type 2 = shop -> storage, type 3 = storage -> shop
		-) Fungsi ini merupakan Fungsi Utama
		-) Jika Type =2 maka quantity shop = 0 ;  Jika Type = 3 maka quantity Storage = 0;
	*/
	public function doRestockProduct(){
		$name = 'qui';
		$color = 'Green';
		$type = 2;
		$quantityShop = 0;
		$quantityStorage = 100;
		$photo = "a.jpg";
		
		$respond = array();
		$ableRestock = 1;
		$insertNew = -1;
		
		//find the product id
		$productId = $this->findProductId($name);
		
		//Check if restock new product or old product. If old product, is the amount enough to do restock ?
		if($productId == -1){
			$insertNew = 1;
		
			$productId = $this->addNewProduct($productCode, $name, $modalPrice, $minPrice, $salesPrice, $productShop, $productStorage, $type, $productDeleted, $color, $detailShop, $detailStorage, $detailDeleted, $photo);
		}else{
			$ableRestock = $this->isAbleRestock($productId, $color, $quantityShop, $quantityStorage, $type);
		}
		
		if($productId != -1 && $ableRestock == 1){
			$productDetailId = $this->findProductDetailId($productId, $color);
			if($productDetailId != -1){
				$productSuccess = $this->productSection($productId, $color, $type, $quantityShop, $quantityStorage, $insertNew);
				$restockSuccess = $this->restockSection($type, $productDetailId, $quantityShop, $quantityStorage);
				
				if($productSuccess == 1 && $restockSuccess == 1){
					$respond = array('code'=>'201','status' => 'Created');
				}else{
					$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'add product and restock failed');
				}
			}else{
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'product detail id not found');
			}
		}else{
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages'=>'product id not found or not able to restock');
		}
		
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $productId, $color, $type, $shopAmount, $storageAmount, $insertNew
		@return : 1 or -1
		-) Fungsi ini digunakan untuk menangani bagian restock bagian tabel product dan product detail
	*/
	public function productSection($productId, $color, $type, $shopAmount, $storageAmount, $insertNew){
		$success = -1;
		$productDetailId = $this->findProductDetailId($productId, $color);
	
		if($type == 2 || $type == 3){
			$temp1 = $this->addProductDetail($productDetailId, $shopAmount, $storageAmount);
			$temp2 = $this->addProduct($productId, $shopAmount, $storageAmount);
			
			$temp3 = $this->substractProductDetail($productDetailId, $shopAmount, $storageAmount);
			$temp4 = $this->substractProduct($productId, $shopAmount, $storageAmount);
			
			if($temp1 == 1 && $temp2 == 1 && $temp3 == 1 && $temp4 == 1){
				$success = 1;
			}
		}else if($type == 1 && $insertNew == -1){
			$temp1 = $this->addProductDetail($productDetailId, $shopAmount, $storageAmount);
			$temp2 = $this->addProduct($productId, $shopAmount, $storageAmount);
			
			if($temp1 == 1 && $temp2 == 1){
				$success = 1;
			}
		}else if($type == 1 && $insertNew == 1){
			$success = 1;
		}
		
		return $success;
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $productId, $color, $quantityShop, $quantityStorage, $type
		@return : 1 or -1
		-) Fungsi ini digunakan untuk mengecek apakan proses restocok dari shop ke storage dan sebaliknya banyaknya mencukupi
	*/
	public function isAbleRestock($productId, $color, $quantityShop, $quantityStorage, $type){
		$productDetailId = $this->findProductDetailId($productId, $color);
		$able = -1;
		
		if($productDetailId != -1){
			$productDetail = Productdetail::find($productDetailId);
			if($productDetail != null){
				if($type==2 && $productDetail->stock_shop >= $quantityShop){
					$able = 1;
				}else if($type==3 && $productDetail->stockStorage >= $quantityStorage){
					$able = 1;
				}else if($type == 1 || $type == 4){
					$able = 1;
				}
			}
		}
		
		return $able;
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $type, $productDetailId, $quantityShop, $quantityStorage
		@return :
		-) Fungsi ini digunakan untuk menangani bagian tabel restock dan restock detail
	*/
	public function restockSection($type, $productDetailId, $quantityShop, $quantityStorage){
		//addRestockRecord and get its id
		$restockId = $this->addRestockRecord($type);
		if($restockId != 1){
			//add restock detail
			$addRestockDetail = $this->addRestockDetailRecord($restockId, $productDetailId, $type, $quantityShop, $quantityStorage);
			if($addRestockDetail == 1){
				return 1;
			}else{
				return -1;
			}
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $type
		@return : $restockId
		-) Fungsi ini digunakan untuk menambahkan record baru ke tabel Restock
	*/
	public function addRestockRecord($type){
		$restockController = new RestocksController();
		$restockId = -1;
		
		$addStatus = $restockController->insertWithParam($type);
		$addJson = json_decode($addStatus->getContent());
		
		if($addJson->{'status'} == 'Created'){
			$allRecord = $restockController->getAll();
			$allRecordJson = json_decode($allRecord->getContent());
			if($allRecordJson->{'status'} != 'Not Found'){
				$data = $allRecordJson->{'messages'};
				foreach($data as $record){
					$restockId = $record->id;
				}
			}
		}
		
		return $restockId;
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $name
		@return : $productId
		-) Fungsi ini digunakan untuk mencari produk id yang sesuai dengan nama produk
	*/
	public function findProductId($name){
		$productController = new ProductsController();
		$productId = -1;
		
		$allProduct = $productController->getAll();
		$allProductJson = json_decode($allProduct->getContent());
		
		if($allProductJson->{'status'} != 'Not Found'){
			$data = $allProductJson->{'messages'};
			foreach($data as $record){
				if($record->name == $name){
					$productId = $record->id;
				}
			}
		}
		
		return $productId;
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $productId, $color
		@return : $productDetailId
		-) Fungsi ini digunakan untuk mencari produk detail id yang sesuai dengan produk id dan warna
	*/
	public function findProductDetailId($productId, $color){
		$productDetailController = new ProductDetailsController();
		$productDetailId = -1;
		
		$allProductDetail = $productDetailController->getAll();
		$allProductDetailJson = json_decode($allProductDetail->getContent());
		
		if($allProductDetailJson->{'status'} != 'Not Found'){
			$data = $allProductDetailJson->{'messages'};
			foreach($data as $record){
				if($record->product_id == $productId){
					if($record->color == $color){
						$productDetailId = $record->id;
					}
				}
			}
		}
		
		return $productDetailId;
	}
	
	/*
	public function findNewProductDetailId(){
		$productDetailController = new ProductDetailsController();
		$productDetailId = -1;
		
		$allData = $productDetailController->getAll();
		$allDataJson = json_decode($allData->getContent());
		
		if($allDataJson->{'status'}  != 'Not Found'){
			$record = $allDataJson->{'messages'};
			foreach($record as $rec){
				$productDetailId = $rec->id;
			}
		}
		
		return $productDetailId;
	}
	*/
	
	/*
		@author : Gentry Swanri
		@paramater : $restockId, $productDetailId, $type, $shopAmount, $storageAmount
		@return : 1 or -1
		-) Fungsi ini digunakan untuk menambahkan record baru ke tabel Restock Detail
	*/
	public function addRestockDetailRecord($restockId, $productDetailId, $type, $shopAmount, $storageAmount){
		$restockDetailController = new RestockDetailsController();
		
		$shopAmountTemp = $shopAmount;
		$storageAmountTemp = $storageAmount;
		
		if($type==2){
			$shopAmountTemp = $storageAmount * -1;
		}else if($type==3){
			$storageAmountTemp = $shopAmount * -1;
		}
		
		$addStatus = $restockDetailController->insertWithParam($restockId, $productDetailId, $shopAmountTemp, $storageAmountTemp);
		$addStatusJson = json_decode($addStatus->getContent());
		
		if($addStatusJson->{'status'} == 'Created'){
			return 1;
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $productId, $shopAmount, $storageAmount
		@return : 1 or -1
		-) Fungsi ini digunakan untuk menambahkan quantity produk
	*/
	public function addProduct($productId, $shopAmount, $storageAmount){
		$productController = new ProductsController();
		
		$updateShop = $productController->updateShop($productId, $shopAmount);
		$updateShopJson = json_decode($updateShop->getContent());
		
		$updateStorage = $productController->updateStorage($productId, $storageAmount);
		$updateStorageJson = json_decode($updateStorage->getContent());
		
		if($updateShopJson->{'status'} == 'No Content' && $updateStorageJson->{'status'} == 'No Content'){
			return 1;
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $productId, $shopAmount, $storageAmount
		@return : 1 or -1
		-) Fungsi ini digunakan untuk mengurangi quantity produk
	*/
	public function substractProduct($productId, $shopAmount, $storageAmount){
		$productController = new ProductsController();
		
		$updateShop = $productController->updateMinusShop($productId, $storageAmount);
		$updateShopJson = json_decode($updateShop->getContent());
		
		$updateStorage = $productController->updateMinusStorage($productId, $shopAmount);
		$updateStorageJson = json_decode($updateStorage->getContent());
		
		if($updateShopJson->{'status'} == 'No Content' && $updateStorageJson->{'status'} == 'No Content'){
			return 1;
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $productDetailId, $shopAmount, $storageAmount
		@return : 1 or -1
		-) Fungsi ini digunakan untuk menambahkan quantity produk detail
	*/
	public function addProductDetail($productDetailId, $shopAmount, $storageAmount){
		$productDetailController = new ProductDetailsController();
		
		$updateShop = $productDetailController->updateShop($productDetailId, $shopAmount);
		$updateShopJson = json_decode($updateShop->getContent());
		
		$updateStorage = $productDetailController->updateStorage($productDetailId, $storageAmount);
		$updateStorageJson = json_decode($updateStorage->getContent());
		
		if($updateShopJson->{'status'} == 'No Content' && $updateStorageJson->{'status'} == 'No Content'){
			return 1;
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $productDetailId, $shopAmount, $storageAmount
		@return : 1 or -1
		-) Fungsi ini digunakan untuk mengurangi quantity produk detail
	*/
	public function substractProductDetail($productDetailId, $shopAmount, $storageAmount){
		$productDetailController = new ProductDetailsController();
		
		$updateShop = $productDetailController->updateMinusShop($productDetailId, $storageAmount);
		$updateShopJson = json_decode($updateShop->getContent());
		
		$updateStorage = $productDetailController->updateMinusStorage($productDetailId, $shopAmount);
		$updateStorageJson = json_decode($updateStorage->getContent());
		
		if($updateShopJson->{'status'} == 'No Content' && $updateStorageJson->{'status'} == 'No Content'){
			return 1;
		}else{
			return -1;
		}
	}
	
	public function addNewProductView2()
	{
		$productCode = Input::get('product_code');
		$name = Input::get('name');
		$color = Input::get('color');
		$modalPrice = Input::get('modal_price');
		$minPrice = Input::get('min_price');
		$salesPrice = Input::get('sales_price');
		$stockShop = Input::get('detail_stock_shop');
		$stockStorage = Input::get('detail_stock_storage');
		$photo = Input::get('photo');
		$counter = Input::get('counter');
		$productController = new ProductsController();
		for($i=0 ; $i<$counter ; $i++)
		{
			if($productCode[$i] != '-' && $productCode[$i] !="")
			{
				$product = $productController->getByCode($productCode[$i]);
				$productJson = json_decode($product->getContent());
				//cek produk..udah ada apa belum
				if($productJson->{'code'} == '404')
				{
					//buat baru
					$insertResult = $productController->insertWithParam($productCode[$i], $name[$i], $modalPrice[$i]*1000, $minPrice[$i]*1000, $salesPrice[$i]*1000, $stockShop[$i], $stockStorage[$i], 1, 0);
					$insertResultJson = json_decode($insertResult->getContent());
					if($insertResultJson->{'code'} == '500')
					{
						//gagal
					}
					else
					{
						//berhasil
						$id = $insertResultJson->{'message'};
					}
				}
				else
				{
					//update stock product..
					$prdctRes = $productJson->{'messages'};
					$prdct = Product::find($prdctRes->id);
					$id = $prdct->id;
					$current_shop = $prdct->stock_shop;
					$current_storage = $prdct->stock_storage;
					$prdct->stock_shop = $current_shop + $stockShop[$i];
					$prdct->stock_storage = $current_storage + $stockStorage[$i];
					try
					{
						$prdct->save();
					}
					catch(Exception $ex)
					{
					
					}
				}
				
				//buat produk detail baru
				$productDetailController = new ProductDetailsController();
				//cek dulu warnanya..ada yg sama apa ga
				if($productDetailController->checkColor($id, $color[$i]) == 1)
				{
					$insertDetailStatus = $this->insertNewProductDetail($color[$i], $photo[$i], $stockShop[$i], $stockStorage[$i], $id,0, 0, 0);
				}

				//cek seri
				$productDetailController = new ProductDetailsController();
				$checker = $productDetailController->getByProductId($id);
				$checkerJson = json_decode($checker->getContent());
				$chekerResult = $checkerJson->{'messages'};
				if(count($chekerResult) <= 1)
				{
					//jgn buatin seri
				}
				else
				{
					//buatin seri
					//buat reference dulu
					$reference = "";
					foreach($chekerResult as $rslt)
					{
						if($rslt->isSeri == 0)
						{
							$reference .= $rslt->id."-1;";
						}
					}
					$seri = $productDetailController->getSeri($productCode[$i]);
					$seriJson = json_decode($seri->getContent());
					if($seriJson->{'code'} == '404')
					{
						//buat seri baru
						$insertDetailStatus = $this->insertNewProductDetail($productCode[$i]."-seri", 'assets/img/nophoto.jpg', 0, 0, $id,0, $reference, 1);
					}
					else
					{
						//update reference seri...
						$prdctSeriRes = $seriJson->{'messages'};
						$prdctSeri = ProductDetail::find($prdctSeriRes->id);
						$prdctSeri->reference = $reference;
						try
						{
							$prdctSeri->save();
						}
						catch(Exception $ex)
						{
						
						}
						
					}
				}
			}
		}
		
		return "proses selesai";
	}
	
	public function addNewProductView(){
		$productCode = Input::get('product_code');
		$name = Input::get('name');
		$modalPrice = Input::get('modal_price');
		$minPrice = Input::get('min_price');
		$salesPrice = Input::get('sales_price');
		$productShop = Input::get('stock_shop');
		$productStorage = Input::get('stock_storage');
		$type = 1;
		$productDeleted = 0;
		$color = Input::get('color');
		$detailShop = Input::get('detail_stock_shop');
		$detailStorage = Input::get('detail_stock_storage');
		$detailDeleted = 0;
		$photo = Input::get('photo');
		$i_warna = Input::get('i_warna');
		$reference = Input::get('reference','0');
		$isSeri = Input::get('seri', '0');
		
		$newProductId = $this->addNewProduct($productCode, $name, $modalPrice, $minPrice, $salesPrice, $productShop, $productStorage, $type,$productDeleted, $color, $detailShop, $detailStorage, $detailDeleted, $photo, $i_warna, $reference, $isSeri);
		
		if($newProductId != -1){
			return "add new product success";
		}else{
			return "add new product failes";
		}
	}
	
	public function addNewSeri()
	{
		$productId = Input::get('product_id');
		$productDeleted = 0;
		$color = Input::get('color');
		$detailShop = Input::get('detail_stock_shop');
		$detailStorage = Input::get('detail_stock_storage');
		$detailDeleted = 0;
		$photo = Input::get('photo');
		$i_warna = Input::get('i_warna');
		$reference = Input::get('reference','0');
		$isSeri = Input::get('seri', '0');
		
		$insertDetailStatus = $this->insertNewProductDetail($color[1], $photo[1], $detailShop[1], $detailStorage[1], $productId, $detailDeleted, $reference, $isSeri);
		
		if($insertDetailStatus != -1){
			return "success add new Seri";
		}
		else
		{
			return "failed add new Seri";
		}
		
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $productCode, $name, $modalPrice, $minPrice, $salesPrice, $productShop, $productStorage, $type, $productDeleted, $color, $detailShop, $detailStorage, $detailDeleted
		@return : 1 or -1
		-) Fungsi ini digunakan untuk menangani bagian penambahan record baru apabila ada produk yang tidak ada di tabel
	*/
	public function addNewProduct($productCode, $name, $modalPrice, $minPrice, $salesPrice, $productShop, $productStorage, $type, $productDeleted, $color, $detailShop, $detailStorage, $detailDeleted, $photo, $i_warna, $reference, $seri){
	
		$insertProductStatus = $this->insertNewProduct($productCode, $name, $modalPrice, $minPrice, $salesPrice, $productShop, $productStorage, $type, $productDeleted);
		
		if($insertProductStatus == 1){
			$productId = $this->findProductId($name);
			$controller = new RestocksController();
			$i = 1;
			$check = true;
			$seriReference = "";
			$seriClr = "";
			
			while($i<=$i_warna && $check == true){
				$seriClr .= $color[$i]."-";
				$insertDetailStatus = $this->insertNewProductDetail($color[$i], $photo[$i], $detailShop[$i], $detailStorage[$i], $productId,$detailDeleted, $reference, $seri);
				if($insertDetailStatus == -1 || $i==$i_warna)
				{
					$check = false;
				}
				else
				{
					//restock buat product detail id=insertDetailStatus;
					if($detailShop[$i] != 0)//restock dari luar ke toko
					{
						$controller->insertWithParam(4, $insertDetailStatus, $detailShop[$i], 0);
					}
					else if($detailStorage[$i] != 0)//restock dari luar ke gudang
					{
						$controller->insertWithParam(5, $productDetailId, 0, $detailStorage[$i]);
					}
				}
				$seriReference.= $insertDetailStatus."-1;";
				
				$i++;
			}
			$seriClr = substr($seriClr,0,strlen($seriClr)-1);
			if($i_warna > 1)
			{
				$insertDetailStatus = $this->insertNewProductDetail("Seri-".$productCode, '-', 0, 0, $productId,$detailDeleted, $seriReference, 1);
			}
			if($insertDetailStatus != -1){
				return $productId;
			}else{
				return -1;
			}
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $productCode, $name, $modalPrice, $minPrice, $salesPrice, $stockShop, $stockStorage, $type, $deleted
		@return : 1 or -1
		-) Fungsi ini digunakan untuk menambahkan record baru ke dalam tabel Product
	*/
	public function insertNewProduct($productCode, $name, $modalPrice, $minPrice, $salesPrice, $stockShop, $stockStorage, $type, $deleted){
		$productController = new ProductsController();
		
		$status = $productController->insertWithParam($productCode, $name, $modalPrice, $minPrice, $salesPrice, $stockShop, $stockStorage, $type, $deleted);
		$statusJson = json_decode($status->getContent());
		
		if($statusJson->{'status'} == 'Created'){
			return 1;
		}else{
			return -1;
		}
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $color, $stockShop, $stockStorage, $productId, $deleted
		@return : 1 or -1
		-) Fungsi ini digunakan untuk menambahkan record baru ke dalam tabel Product Detail
	*/
	public function insertNewProductDetail($color, $photo, $stockShop, $stockStorage, $productId, $deleted, $reference, $seri){
		$productDetailController = new ProductDetailsController();
		
		$addStatus = $productDetailController->insertWithParam($color, $photo, $stockShop, $stockStorage, $productId, $deleted, $reference, $seri);
		$addStatusJson = json_decode($addStatus->getContent());
		
		if($addStatusJson->{'status'} == 'Created'){
			return $addStatusJson->{'message'};
		}else{
			return -1;
		}
	}
	
	//based on : http://www.formget.com/ajax-image-upload-php/#
	//based on : http://stackoverflow.com/questions/6974684/how-to-send-formdata-objects-with-ajax-requests-in-jquery
	public function uploadImage(){
		//$data = Input::get('data');
		if(isset($_FILES['file']['name']))
		{
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$newFileName = Input::get('fileName').".".$ext;
			if(true){
				$sourcePath = $_FILES['file']['tmp_name']; 																						// Storing source path of the file in a variable
				$targetPath = "/xampp/htdocs/asia_jaya/public/assets/product_img/".$newFileName; 		// Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; 																				// Moving Uploaded file
				return "Upload Success";
			}else{
				return "Filename is already exist";
			}
		}else{
			return "Upload Failed";
		}
	}
	
	public function uploadImageV3(){
		//$data = Input::get('data');
		$id = Input::get('id');
		$productDetail = ProductDetail::find($id);
		$product = Product::find($productDetail->product_id);
		if(isset($_FILES['file']['name']))
		{
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$newFileName = $product->product_code."-".$productDetail->color.".".$ext;
			$productDetail->photo = "assets/product_img/".$newFileName;
			try
			{
				$productDetail->save();
				if(true)
				{
					$sourcePath = $_FILES['file']['tmp_name']; 																						// Storing source path of the file in a variable
					$targetPath = "/xampp/htdocs/asia_jaya/public/assets/product_img/".$newFileName; 		// Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; 																				// Moving Uploaded file
					return "Upload Success";
				}else
				{
					return "Filename is already exist";
				}
			}
			catch(Exception $ex)
			{
				
			}
			
		}else{
			return "Upload Failed";
		}
	}
	
	public function uploadArrayImage(){
		$datas = explode( ',', Input::get('fileName'));
		
		$count = Input::get('count');
		$mark = 0;
		$fileName[] = array();
		
		for($i=0 ; $i<$count ; $i++)
		{
			if(isset($_FILES['file_'.$i]['name']))
			{
				$ext = pathinfo($_FILES['file_'.$i]['name'], PATHINFO_EXTENSION);
				$newFileName = $datas[$i].".".$ext;
				if(true){
					$sourcePath = $_FILES['file_'.$i]['tmp_name']; 																						// Storing source path of the file in a variable
					$targetPath = "/xampp/htdocs/asia_jaya/public/assets/product_img/".$newFileName; 		// Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; 																				// Moving Uploaded file
					//return "Upload Success";
					$mark = 0;
				}else{
					//return "Filename is already exist";
					$mark = 1;
				}
			}else{
				//return "Upload Failed";
				$mark = 2;
			}
		}
		if($mark == 0)
		{
			return "Upload Success";
		}
		else if($mark == 1)
		{
			return "Filename is already exist";
		}
		else
		{
			return "Upload Failed";
		}
	}
}