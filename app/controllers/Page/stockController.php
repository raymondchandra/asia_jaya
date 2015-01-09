<?php

class stockController extends \HomeController{
		
	public function viewStock()
	{
		$products = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->get();
		if(count($products) == 0)
		{
			//not found
			$products = null;
		}else{
			foreach($products as $prod){
				$prod->idDetail = ProductDetail::find($prod->product_id)->id;
			}
		}
		
		return View::make('pages.stock.manage_stock', compact('products'));
	}
	
	public function viewStock2(){
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$prodController = new ProductsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$dataAll = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->select('prod.product_code','prod.name','prds.photo','prds.color','prod.modal_price','prod.min_price','prod.sales_price','prds.stock_shop','prds.stock_storage','prds.deleted','prod.id','prds.id AS idDetail')->get();
			}
			else
			{
				$allProductJson = $prodController->getSortedAll($sortBy, $order);
				$allProduct = json_decode($allProductJson->getContent());
				if($allProduct->{'status'}!='Not Found'){
					$dataAll = $allProduct->{'messages'};
				}
			}
			$datas = null;
			if(count($dataAll)!=0){
				foreach($dataAll as $allData){
					$datas[] = (object)array('id'=>$allData->id, 'idDetail'=>$allData->idDetail, 'product_code'=>$allData->product_code, 'photo'=>$allData->photo, 'name'=>$allData->name, 'color'=>$allData->color, 'modal_price'=>$allData->modal_price, 'min_price'=>$allData->min_price, 'sales_price'=>$allData->sales_price, 'stock_shop'=>$allData->stock_shop, 'stock_storage'=>$allData->stock_storage, 'deleted'=>$allData->deleted);
				}
			}
			
			return View::make('pages.stock.manage_stock', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			$product_code = Input::get('product_code','-');
			$name = Input::get('name', '-');
			$color = Input::get('color', '-');
			$modal_price = Input::get('modal_price', '-');
			$min_price = Input::get('min_price', '-');
			$sales_price = Input::get('sales_price', '-');
			$stock_shop = Input::get('stock_shop', '-');
			$stock_storage = Input::get('stock_storage', '-');
			$deleted = Input::get('deleted', '-');
			
			if($sortBy == "none")
			{
				$allProductJson = $prodController->getFilteredAccount($product_code, $name, $color, $modal_price, $min_price, $sales_price, $stock_shop, $stock_storage, $deleted);
			}
			else
			{
				$allProductJson = $prodController->getSortedFilteredAccount($product_code, $name, $color, $modal_price, $min_price, $sales_price, $stock_shop, $stock_storage, $deleted, $sortBy, $order);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allProduct = json_decode($allProductJson->getContent());
			$datas = null;
			if($allProduct->{'status'} != 'Not Found'){
				$allProductData = $allProduct->{'messages'};
				foreach($allProductData as $allData){
					$datas[] = (object)array('id'=>$allData->id, 'idDetail'=>$allData->idDetail, 'product_code'=>$allData->product_code, 'photo'=>$allData->photo, 'name'=>$allData->name, 'color'=>$allData->color, 'modal_price'=>$allData->modal_price, 'min_price'=>$allData->min_price, 'sales_price'=>$allData->sales_price, 'stock_shop'=>$allData->stock_shop, 'stock_storage'=>$allData->stock_storage, 'deleted'=>$allData->deleted);
					
				}
			}

			return View::make('pages.stock.manage_stock', compact('datas','sortBy','order','filtered','product_code','name','color','modal_price','min_price','sales_price','stock_shop','stock_storage','deleted'));
		}
	}
	
	public function editStock(){
		$idProduct = Input::get('idProduct');
		$idDetail = Input::get('idDetail');
		$editName = Input::get('editName');
		$editColor = Input::get('editColor');
		$editModal = Input::get('editModal');
		$editMin = Input::get('editMin');
		$editSales = Input::get('editSales');
		$editShop = Input::get('editShop');
		$editStorage = Input::get('editStorage');
		$editKode = Input::get('editKode');
		$editFoto = Input::get('editFoto');
		
		$productController = new ProductsController();
		$productDetailController = new ProductDetailsController();
		
		$editProductJson = $productController->updateForViewStock($idProduct, $editName, $editModal, $editMin, $editSales, $editKode);
		$editDetailJson = $productDetailController->updateForViewStock($idDetail, $editColor, $editShop, $editStorage, $editFoto);
	}
	
	public function deleteProduct()
	{
		$id = Input::get('data');
		$productDetailController = new ProductDetailsController();
		
		return $productDetailController->deleteProdDet($id);
	}
	
	public function makeObral()
	{
		$amount = Input::get('amount');
		$id = Input::get('data');
		
		$controller = new ProductDetailsController();
		$obralResult = $controller->addObral($amount);
		if($obralResult == 1)
		{
			return $controller->updateMinusShop($id, $amount);
		}
		$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		return Response::json($respond);
	}
	
	
}