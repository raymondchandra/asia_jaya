<?php

class ProductsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Product::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Product::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $productCode, $name, $modalPrice, $minPrice, $salesPrice, $stockShop, $stockStorage, $type, $deleted
		@return :
		-) Fungsi ini digunakan untuk menambahkan record baru ke dalam tabel Product
	*/
	public function insertWithParam($productCode, $name, $modalPrice, $minPrice, $salesPrice, $stockShop, $stockStorage, $type, $deleted){
		$data = array('product_code'=>$productCode, 'name'=>$name, 'modal_price'=>$modalPrice, 'min_price'=>$minPrice, 'sales_price'=>$salesPrice, 'stock_shop'=>$stockShop, 'stock_storage'=>$stockStorage, 'type'=>$type, 'deleted'=>$deleted);
		
		//validate
		$validator = Validator::make($data, Product::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Product::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($product)
	{
		$respond = array();
		if (count($product) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$product);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$product = Product::all();
		return $this->getReturn($product);
	}

	public function getById($id)
	{
		$product = Product::find($id);
		return $this->getReturn($product);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $productCode
		@return : product yang sesuai dengan productCode
		-) Fungsi ini berfungsi melakukan pencarian product berdasarkan product code
	*/
	public function getByProductCode($productCode)
	{
		$product = Product::where('product_code','=',$productCode)->get();
		return $this->getReturn($product);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $productName
		@return : product yang sesuai dengan productName
		-) Fungsi ini berfungsi melakukan pencarian product berdasarkan product code
	*/
	public function getByProductName($productName)
	{
		$product = Product::where('name','=',$productName)->get();
		return $this->getReturn($product);
	}
	
	/*
	public function getBy<column>()
	{
		$product = Product::where('','=','')->get();
		return $this->getReturn($product);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Product::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$product->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $shopAmount
		@return :
		-) Fungsi ini digunakan untuk mengupdate stockShop
	*/
	public function updateShop($id, $shopAmount)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $product->stock_shop + $shopAmount;
			$product->stock_shop = $tempAmount;
			try {
				$product->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $shopAmount
		@return :
		-) Fungsi ini digunakan untuk mengupdate stockShop (-)
	*/
	public function updateMinusShop($id, $shopAmount)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $product->stock_shop - $shopAmount;
			$product->stock_shop = $tempAmount;
			try {
				$product->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $shopAmount
		@return :
		-) Fungsi ini digunakan untuk mengupdate stockStorage
	*/
	public function updateStorage($id, $storageAmount)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $product->stock_storage + $storageAmount;
			$product->stock_storage = $tempAmount;
			try {
				$product->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $shopAmount
		@return :
		-) Fungsi ini digunakan untuk mengupdate stockStorage (-)
	*/
	public function updateMinusStorage($id, $storageAmount)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $product->stock_storage - $storageAmount;
			$product->stock_storage = $tempAmount;
			try {
				$product->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : 
		@return :
		-) Fungsi ini digunakan untuk mengupdate view Stock
	*/
	public function updateForViewStock($id, $editName, $editModal, $editMin, $editSales, $editKode)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$product->product_code = $editKode;
			$product->name = $editName;
			$product->modal_price = $editModal;
			$product->min_price = $editMin;
			$product->sales_price = $editSales;
			try {
				$product->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}

	/*
	public function update<column>($id)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$product-> = ;
			try {
				$product->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	*/
	
	public function delete($id)
	{
		$respond = array();
		$product = Product::find($id);
		if ($product == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$product->delete();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}

	/*
	public function exist()
	{
		$respond = array();
		$product = Product::where('','=','')->get();
		if (count($product) >= 0)
		{
			$respond = array('code'=>'200','status' => 'OK');
		}
		else
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		return Response::json($respond);
	}
	*/
	
	public function search()
	{
		try
		{
			$keyword = Input::get('keyword');
			$products = Product::where('product_code', 'LIKE', $keyword)->orWhere('name', 'LIKE', $keyword)->get();
			if(count($products) == 0)
			{
				//not found
				$response = array('code'=>'404','status' => 'Not Found');
			}
			else
			{
				//found
				foreach($products as $product)
				{
					$productDetail = ProductDetail::find($product->id);
					$product->product_color =  $productDetail->color;
				}
				
				$response = array('code'=>'200','status' => 'OK','messages'=>$products);
			}
			
			return Response::json($response);
		}
		catch(Exception $e)
		{
			//forbidden
			$response = array('code'=>'403','status' => 'FORBIDDEN');
			return Response::json($response);
		}
	}
	
	public function getSortedAll($by, $order)
	{
		$products = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->select('prod.product_code','prod.name','prds.photo','prds.color','prod.modal_price','prod.min_price','prod.sales_price','prds.stock_shop','prds.stock_storage','prds.deleted','prod.id','prds.id AS idDetail','prds.isSeri AS isSeri', 'prds.reference AS reference');
	
		$result = $products->orderBy($by, $order)->get();
		
		return $this->getReturn($result);
	}
	
	public function getFilteredAccount($product_code, $name, $color, $modal_price, $min_price, $sales_price, $stock_shop, $stock_storage, $deleted)
	{
		$isFirst = false;
		
		$joined = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->select('prod.product_code','prod.name','prds.photo','prds.color','prod.modal_price','prod.min_price','prod.sales_price','prds.stock_shop','prds.stock_storage','prds.deleted','prod.id','prds.id AS idDetail','prds.isSeri AS isSeri', 'prds.reference AS reference');
		
		if($product_code != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.product_code', 'LIKE', '%'.$product_code.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.product_code', 'LIKE', '%'.$product_code.'%');
			}
		}
		
		if($name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.name', 'LIKE', '%'.$name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.name', 'LIKE', '%'.$name.'%');
			}
		}
		
		if($color != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.color', 'LIKE', '%'.$color.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.color', 'LIKE', '%'.$color.'%');
			}
		}
		
		if($modal_price != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.modal_price', '=', $modal_price);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.modal_price', '=', $modal_price);
			}
		}
		
		if($min_price != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.min_price', '=', $min_price);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.min_price', '=', $min_price);
			}
		}
		
		if($sales_price != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.sales_price', '=', $sales_price);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.sales_price', '=', $sales_price);
			}
		}
		
		if($stock_shop != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.stock_shop', '=', $stock_shop);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.stock_shop', '=', $stock_shop);
			}
		}
		
		if($stock_storage != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.stock_storage', '=', $stock_storage);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.stock_storage', '=', $stock_storage);
			}
		}
		
		if($deleted != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.deleted', '=', $deleted);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.deleted', '=', $deleted);
			}
		}
		
		if($isFirst == false)
		{
			$result = $joined->get();
			$isFirst = true;
		}
		else
		{
			$result = $resultTab->get();
		}
		
		return $this->getReturn($result);
	}
	
	public function getSortedFilteredAccount($product_code, $name, $color, $modal_price, $min_price, $sales_price, $stock_shop, $stock_storage, $deleted, $sortBy, $order)
	{
		$isFirst = false;
		
		$joined = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->select('prod.product_code','prod.name','prds.photo','prds.color','prod.modal_price','prod.min_price','prod.sales_price','prds.stock_shop','prds.stock_storage','prds.deleted','prod.id','prds.id AS idDetail','prds.isSeri AS isSeri', 'prds.reference AS reference');
		
		if($product_code != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.product_code', 'LIKE', '%'.$product_code.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.product_code', 'LIKE', '%'.$product_code.'%');
			}
		}
		
		if($name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.name', 'LIKE', '%'.$name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.name', 'LIKE', '%'.$name.'%');
			}
		}
		
		if($color != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.color', 'LIKE', '%'.$color.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.color', 'LIKE', '%'.$color.'%');
			}
		}
		
		if($modal_price != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.modal_price', '=', $modal_price);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.modal_price', '=', $modal_price);
			}
		}
		
		if($min_price != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.min_price', '=', $min_price);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.min_price', '=', $min_price);
			}
		}
		
		if($sales_price != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prod.sales_price', '=', $sales_price);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prod.sales_price', '=', $sales_price);
			}
		}
		
		if($stock_shop != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.stock_shop', '=', $stock_shop);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.stock_shop', '=', $stock_shop);
			}
		}
		
		if($stock_storage != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.stock_storage', '=', $stock_storage);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.stock_storage', '=', $stock_storage);
			}
		}
		
		if($deleted != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('prds.deleted', '=', $deleted);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('prds.deleted', '=', $deleted);
			}
		}
		
		if($isFirst == false)
		{
			$result = $joined->orderBy($sortBy, $order)->get();
			$isFirst = true;
		}
		else
		{
			$result = $resultTab->orderBy($sortBy, $order)->get();
		}
		
		return $this->getReturn($result);
	}

}
