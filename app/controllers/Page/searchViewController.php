<?php

class searchViewController extends \HomeController{
	
	public function getList(){
		$productController = new ProductsController();
		$productJson = $productController->getAll();
		
		$json = json_decode($productJson->getContent());
		
		if($json->{'status'}=="Not Found"){
			return View::make('searchView');
		}else{
			$products = $json->{'messages'};
			foreach($products as $prod){
				$productID = $prod->id;
			}
			return "ditemukan";
		}

		//$products = $json->{'messages'};
		
		//return View::make('searchView', compact('products'));
		
		//return $json->{'status'};
		
		//return 'hello';
	}
	
}