<?php

class stockController extends \HomeController{
	public function viewAddStock()
	{
		return View::make('pages.restock.add_new_stock');
	}	
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
				$dataAll = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->select('prod.product_code','prod.name','prds.photo','prds.color','prod.modal_price','prod.min_price','prod.sales_price','prds.stock_shop','prds.stock_storage','prds.deleted','prod.id','prds.id AS idDetail','prds.isSeri AS isSeri', 'prds.reference AS reference')->where('prds.isSeri','=',0)->get();
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
					/*
					if($allData->isSeri == 1)
					{
						$reference = $allData->reference;
						$prdClr = $allData->color;
						$reference = explode(';',$reference);
						$counter = count($reference);
						$prdClr = explode('-',$prdClr);
						$clr = "";
						$shopTotal = "";
						$storageTotal = "";
						$salesPrice = 0;
						$minPrice = 0;
						$modPrice = 0;
						for($i=0 ; $i<$counter-1 ; $i++)
						{
							$quant = explode('-',$reference[$i]);
							$productDetail = ProductDetail::find($quant[0]);
							if($productDetail->deleted == '0')
							{							
								//cek stok
								$prd = Product::find($productDetail->product_id);
								$salesPrice += $prd->sales_price;
								$minPrice += $prd->min_price;
								$modPrice += $prd->modal_price;
								
								$shop = $productDetail->stock_shop;
								$shopTotal .= $shop." - ";
								
								$storage = $productDetail->stock_storage;
								$storageTotal .= $storage." - ";
								if($quant[count($quant)-1] > $shop)
								{
									if($quant[count($quant)-1] > ($shop + $storage))
									{
									 //jgn masukin
									}
									else
									{
										//masukin
										if($i == 0)
										{
											$clr .= $quant[count($quant)-1]." * ".$prdClr[$i];
										}
										else
										{
											$clr .= " - ".$quant[count($quant)-1]." * ".$prdClr[$i];
										}
									}
								}
								else
								{
									//masukin
									if($i == 0)
									{
										$clr .= $quant[count($quant)-1]." * ".$prdClr[$i];
									}
									else
									{
										$clr .= " - ".$quant[count($quant)-1]." * ".$prdClr[$i];
									}
								}
							}
						}
						$shopTotal = substr($shopTotal,0,strlen($shopTotal)-3);
						$storageTotal = substr($storageTotal,0,strlen($storageTotal)-3);
						$allData->color = $clr;
						$allData->stock_shop = $shopTotal;
						$allData->stock_storage = $storageTotal;
						$allData->min_price = $minPrice;
						$allData->sales_price = $salesPrice;
						$allData->modal_price = $modPrice;
					}
					*/
					$datas[] = (object)array('id'=>$allData->id, 'idDetail'=>$allData->idDetail, 'product_code'=>$allData->product_code, 'photo'=>$allData->photo, 'name'=>$allData->name, 'color'=>$allData->color, 'modal_price'=>$allData->modal_price, 'min_price'=>$allData->min_price, 'sales_price'=>$allData->sales_price, 'stock_shop'=>$allData->stock_shop, 'stock_storage'=>$allData->stock_storage, 'deleted'=>$allData->deleted, 'isSeri'=>$allData->isSeri);
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
					/*
					if($allData->isSeri == 1)
					{
						$reference = $allData->reference;
						$prdClr = $allData->color;
						$reference = explode(';',$reference);
						$counter = count($reference);
						$prdClr = explode('-',$prdClr);
						$clr = "";
						$shopTotal = "";
						$storageTotal = "";
						$salesPrice = 0;
						$minPrice = 0;
						$modPrice = 0;
						for($i=0 ; $i<$counter-1 ; $i++)
						{
							$quant = explode('-',$reference[$i]);
							$productDetail = ProductDetail::find($quant[0]);
							if($productDetail->deleted == '0')
							{							
								//cek stok
								$prd = Product::find($productDetail->product_id);
								$salesPrice += $prd->sales_price;
								$minPrice += $prd->min_price;
								$modPrice += $prd->modal_price;
								
								$shop = $productDetail->stock_shop;
								$shopTotal .= $shop." - ";
								
								$storage = $productDetail->stock_storage;
								$storageTotal .= $storage." - ";
								if($quant[count($quant)-1] > $shop)
								{
									if($quant[count($quant)-1] > ($shop + $storage))
									{
									 //jgn masukin
									}
									else
									{
										//masukin
										if($i == 0)
										{
											$clr .= $quant[count($quant)-1]." * ".$prdClr[$i];
										}
										else
										{
											$clr .= " - ".$quant[count($quant)-1]." * ".$prdClr[$i];
										}
									}
								}
								else
								{
									//masukin
									if($i == 0)
									{
										$clr .= $quant[count($quant)-1]." * ".$prdClr[$i];
									}
									else
									{
										$clr .= " - ".$quant[count($quant)-1]." * ".$prdClr[$i];
									}
								}
							}
						}
						$shopTotal = substr($shopTotal,0,strlen($shopTotal)-3);
						$storageTotal = substr($storageTotal,0,strlen($storageTotal)-3);
						$allData->color = $clr;
						$allData->stock_shop = $shopTotal;
						$allData->stock_storage = $storageTotal;
						$allData->min_price = $minPrice;
						$allData->sales_price = $salesPrice;
						$allData->modal_price = $modPrice;
					}
					*/
					$datas[] = (object)array('id'=>$allData->id, 'idDetail'=>$allData->idDetail, 'product_code'=>$allData->product_code, 'photo'=>$allData->photo, 'name'=>$allData->name, 'color'=>$allData->color, 'modal_price'=>$allData->modal_price, 'min_price'=>$allData->min_price, 'sales_price'=>$allData->sales_price, 'stock_shop'=>$allData->stock_shop, 'stock_storage'=>$allData->stock_storage, 'deleted'=>$allData->deleted, 'isSeri'=>$allData->isSeri);
					
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
		
		//update manager cuma boleh hargajual, stoktoko, stokgudang, deleted
		// if(Auth::user()->role == 2) //manager
		// {

		// }

		//cek restock
		$productDetail = ProductDetail::find($idDetail);
		$editFoto = $productDetail->photo;
		$stock_shop = $productDetail->stock_shop;
		$stock_storage = $productDetail->stock_storage;
		$controller = new RestocksController();
		if($editShop == $stock_shop && $editStorage == $stock_storage)
		{
			//tidak ada restock;
		}
		else
		{
			if($editStorage < $stock_storage && $editShop > $stock_shop)//restock gudang ke toko
			{
				$controller->insertWithParam(1, $idDetail, $editShop-$stock_shop, $editStorage-$stock_storage);
			}
			else if($editStorage > $stock_storage && $editShop < $stock_shop)//restock toko ke gudang
			{
				$controller->insertWithParam(2, $idDetail, $editShop-$stock_shop, $editStorage-$stock_storage);
			}
			else if($editStorage > $stock_storage && $editShop = $stock_shop)//restock dari luar ke gudang
			{				
				$controller->insertWithParam(3, $idDetail, $editShop-$stock_shop, $editStorage-$stock_storage);
			}
			else //restock dari luar ke toko
			{				
				$controller->insertWithParam(4, $idDetail, $editShop-$stock_shop, $editStorage-$stock_storage);
			}
		}
		
		if(Auth::user()->role == 1)
		{
			$productController = new ProductsController();
			$productDetailController = new ProductDetailsController();
			if($editModal == '-')
			{
				$product = Product::find($idProduct);
				$editModal = $product->modal_price;
			}
			
			$editProductJson = $productController->updateForViewStock($idProduct, $editName, $editModal, $editMin, $editSales, $editKode);
			$editDetailJson = $productDetailController->updateForViewStock($idDetail, $editColor, $editShop, $editStorage, $editFoto);
		}		
		
		return 1;
	}
	
	public function deleteProduct()
	{
		$id = Input::get('data');
		$productDetailController = new ProductDetailsController();
		
		return $productDetailController->deleteProdDet($id);
	}
	
	public function unDeleteProduct()
	{
		$id = Input::get('data');
		$productDetailController = new ProductDetailsController();
		
		return $productDetailController->unDeleteProdDet($id);
	}
	
	public function makeObral()
	{
		$amount = Input::get('amount');
		$id = Input::get('data');
		
		$controller = new ProductDetailsController();
		$productDetail = ProductDetail::find($id);
		$product = Product::find($productDetail->product_id);
		$obralResult = $controller->addObral($amount);
		if($obralResult == 1)
		{
			//masukin ke cash
			$cash = new CashesController();
			//$transactionId, $in, $out, $type
			$cashUpdate = $cash->insertWithParam('-', 0, $product->modal_price * $amount,"Obral");
			return $controller->updateMinusShop($id, $amount);
		}
		$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		return Response::json($respond);
	}
	
	
}