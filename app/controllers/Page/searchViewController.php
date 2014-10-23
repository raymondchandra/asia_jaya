<?php

class searchViewController extends \HomeController{
	
	/*
		@author : Gentry Swanri
		@parameter : -
		@return : Array 2 dimensi
		-) Fungsi untuk menampilkan semua list barang tanpa filter saat akan melakukan pencarian.
		-) Mengembalikan array 2 dimensi yang berisi detaill barang yang akan ditampilkan.
		-) Index array dimensi 1 adalah productCode, name, price, color, stockShop, stockStorage.
		-) Index array dimensi 2 adalah 0, 1, 2, dst.
	*/
	public function getList(){
		$productController = new ProductsController();
		$productJson = $productController->getAll();
		$json = json_decode($productJson->getContent());
		
		if($json->{'status'}=="Not Found"){
			return View::make('searchView');
		}else{
			$products = $json->{'messages'};

			return $this->getProductSearchData($products);
			
			/* cara langsung akses DB
			$result = DB::table('products')->leftJoin('product_details','products.id','=','product_details.product_id')->select('products.id','products.product_code','products.name','product_details.color')->get();
			
			return $result;*/
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : -
		@return : Array 2 dimensi
		-) Fungsi untuk menampilkan semua list barang sesuai dengan kode barang yang dimasukkan saat akan melakukan pencarian.
		-) Mengembalikan array 2 dimensi yang berisi detaill barang yang akan ditampilkan.
		-) Index array dimensi 1 adalah productCode, name, price, color, stockShop, stockStorage.
		-) Index array dimensi 2 adalah 0, 1, 2, dst.
	*/
	public function getListByCode(){
		//$code = input::get('code');
		$code = 56908;
		
		$productController = new ProductsController();
		$productJson = $productController->getByProductCode($code);
		$json = json_decode($productJson->getContent());
		
		if($json->{'status'}=="Not Found"){
			return View::make('searchView');
		}else{
			$products = $json->{'messages'};
			
			return $this->getProductSearchData($products);
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : -
		@return : Array 2 dimensi
		-) Fungsi untuk menampilkan semua list barang sesuai dengan kode barang yang dimasukkan saat akan melakukan pencarian.
		-) Mengembalikan array 2 dimensi yang berisi detaill barang yang akan ditampilkan.
		-) Index array dimensi 1 adalah productCode, name, price, color, stockShop, stockStorage.
		-) Index array dimensi 2 adalah 0, 1, 2, dst.
	*/
	public function getListByName(){
		//$name = input::get('name');
		$name = "eius";
		
		$productController = new ProductsController();
		$productJson = $productController->getByProductName($name);
		$json = json_decode($productJson->getContent());
		
		if($json->{'status'}=="Not Found"){
			return View::make('searchView');
		}else{
			$products = $json->{'messages'};
			
			return $this->getProductSearchData($products);
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $products
		@return : Array 2 Dimensi
		-) Fungsi ini digunakan untuk melakukan pencarian product detail sesuai dengan product lalu 
			data product detail akan digabung dengan data product sesuai dengan yang ingin ditampilkan di View.
	*/
	public function getProductSearchData($products){
		$productDetailsController = new ProductDetailsController();
	
		foreach($products as $prod){
			if(json_decode($productDetailsController->getByProductId($prod->id)->getContent())->{'status'}!='Not Found'){
				$productDetails = json_decode($productDetailsController->getByProductId($prod->id)->getContent())->{'messages'};
				foreach($productDetails as $prodDetails){
					$productCode[] = $prod->product_code;
					$name[] = $prod->name;
					$price[] = $prod->min_price;
					$color[] = $prodDetails->color;
					$stockShop[] = $prodDetails->stock_shop;
					$stockStorage[] = $prodDetails->stock_storage;
				}
			}
		}
		
		$result = array(
			"productCode" => array($productCode),
			"name" => array($name),
			"price" => array($price),
			"color" => array($color),
			"stockShop" => array($stockShop),
			"stockStorage" => array($stockStorage),
		);
		
		return $result;
	}
	
}