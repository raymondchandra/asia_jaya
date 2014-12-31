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
		$editKode = Input::get('editKode','-');
		
		$productController = new ProductsController();
		$productDetailController = new ProductDetailsController();
		
		$editProductJson = $productController->updateForViewStock($idProduct, $editName, $editModal, $editMin, $editSales, $editKode);
		$editDetailJson = $productDetailController->updateForViewStock($idDetail, $editColor, $editShop, $editStorage);
	}
}