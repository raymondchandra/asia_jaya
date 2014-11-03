<?php

class searchViewController extends \HomeController{
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return : Object json
		-) Fungsi ini digunakan untuk mendapatkan daftar barang yang merupakan gabungan dari tabel products dan product_details
	*/
	public function getList(){
		$productDetailController = new ProductDetailsController();
		$productJson = $productDetailController->getAll();
		$json = json_decode($productJson->getContent());
		
		if($json->{'status'}!="Not Found"){
			$products = $json->{'messages'};
			foreach($products as $product)
			{
				$product->product_name = ProductDetail::find($product->product_id)->product->name;
				$product->product_code = ProductDetail::find($product->product_id)->product->product_code;
				$product->sales_price = ProductDetail::find($product->product_id)->product->sales_price;
			}
			
			$response = array('code'=>'200','status' => 'OK','messages'=>$products);
		}else{
			$response = array('code'=>'404','status' => 'Not Found');
		}
		
		return Response::json($response);
	}
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return : Object json
		-) Fungsi ini digunakan untuk mendapatkan daftar barang yang sesuai dengan product code yang diminta
	*/
	public function getListByCode(){
		$productCode = 86651;
		
		//$products = ProductDetail::join('products', 'product_details.product_id', '=' , 'products.id')->where('product_code', '=' , $productCode)->get();
		
		$products = ProductDetail::join('products', 'product_details.product_id', '=' , 'products.id')->where('product_code', '=' , $productCode)->get();
		
		if(count($products)==0){
			$response = array('code'=>'404','status' => 'Not Found');
		}else{
		/*
			$result = array();
			foreach($products as $product){
				$result[] = (object) array('product_code'=>$product->product_code, 'name'=>$product->name, 'color'=>$product->color, 'stock_shop'=>$product->stock_shop, 'stock_storage'=>$product->stock_storage, 'sales_price'=>$product->sales_price);
			}
			$response = array('code'=>'200','status' => 'OK','messages'=>$result);
		*/
			$response = array('code'=>'200','status' => 'OK','messages'=>$products);
		}
		
		return Response::json($response);
	}
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return : Object json
		-) Fungsi ini digunakan untuk mendapatkan daftar barang yang sesuai dengan product name yang diminta
	*/
	public function getListByName(){
		$productName = "qui";
		
		//$products = ProductDetail::join('products', 'product_details.product_id', '=' , 'products.id')->where('name', '=' , $productName)->get();
		
		$products = ProductDetail::join('products', 'product_details.product_id', '=' , 'products.id')->where('name', '=' , $productName)->get();
		
		if(count($products)==0){
			$response = array('code'=>'404','status' => 'Not Found');
		}else{
		/*
			$result = array();
			foreach($products as $product){
				$result[] = (object) array('product_code'=>$product->product_code, 'name'=>$product->name, 'color'=>$product->color, 'stock_shop'=>$product->stock_shop, 'stock_storage'=>$product->stock_storage, 'sales_price'=>$product->sales_price);
			}
			$response = array('code'=>'200','status' => 'OK','messages'=>$result);
		*/
			$response = array('code'=>'200','status' => 'OK','messages'=>$products);
		}
		
		return Response::json($response);
	}
}