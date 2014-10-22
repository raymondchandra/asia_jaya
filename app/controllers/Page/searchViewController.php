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
		
		$productDetailsController = new ProductDetailsController();
		
		if($json->{'status'}=="Not Found"){
			return View::make('searchView');
		}else{
			$products = $json->{'messages'};

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
			
			/* cara langsung akses DB
			$result = DB::table('products')->leftJoin('product_details','products.id','=','product_details.product_id')->select('products.id','products.product_code','products.name','product_details.color')->get();
			
			return $result;*/
		}
	}
	
}