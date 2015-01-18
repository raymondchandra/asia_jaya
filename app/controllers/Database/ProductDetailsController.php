<?php

class ProductDetailsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Productdetail::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Productdetail::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@paramater : $color, $stockShop, $stockStorage, $productId, $deleted
		@return :
		-) Fungsi ini digunakan untuk menambahkan record baru ke dalam tabel Product Detail
	*/
	public function insertWithParam($color, $photo, $stockShop, $stockStorage, $productId, $deleted, $reference, $seri){
		$data = array('color'=>$color, 'photo'=>$photo, 'stock_shop'=>$stockShop, 'stock_storage'=>$stockStorage, 'product_id'=>$productId, 'deleted'=>$deleted, 'reference'=>$reference, 'isSeri'=>$seri);
		
		//validate
		$validator = Validator::make($data, Productdetail::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			$result = ProductDetail::create($data);
			$respond = array('code'=>'201','status' => 'Created','message'=>$result->id);
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($productdetail)
	{
		$respond = array();
		if (count($productdetail) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$productdetail);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$productdetail = Productdetail::all();
		return $this->getReturn($productdetail);
	}

	public function getById($id)
	{
		$productdetail = Productdetail::find($id);
		return $this->getReturn($productdetail);
	}
	
	public function getSeri($code)
	{
		$productdetail = Productdetail::where('color','=',$code.'-seri')->first();
		if($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$productdetail);
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $productId
		@return : product detail yang sesuai dengan productId
		-) Fungsi untuk melakukan pencarian product detail berdasarkan product id;
	*/
	public function getByProductId($productId)
	{
		$productdetail = Productdetail::where('product_id','=',$productId)->get();
		return $this->getReturn($productdetail);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $color
		@return : product detail yang sesuai dengan color
		-) Fungsi untuk melakukan pencarian product detail berdasarkan color
	*/
	public function getByColor($color)
	{
		$productdetail = Productdetail::where('color','=',$color)->get();
		return $this->getReturn($productdetail);
	}
	
	/*
	public function getBy<column>()
	{
		$productdetail = Productdetail::where('','=','')->get();
		return $this->getReturn($productdetail);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$productdetail = Productdetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Productdetail::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$productdetail->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $amount
		@return :
		-) Fungsi ini digunakan untuk melakukan perubahan terhadap kolom stock_shop
	*/
	public function updateShop($id, $amount)
	{
		$respond = array();
		$productdetail = ProductDetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $productdetail->stock_shop + $amount;
			$productdetail->stock_shop = $tempAmount;
			try {
				$productdetail->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $amount
		@return :
		-) Fungsi ini digunakan untuk melakukan perubahan terhadap kolom stock_shop (-)
	*/
	public function updateMinusShop($id, $amount)
	{
		$respond = array();
		$productdetail = ProductDetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $productdetail->stock_shop - $amount;
			$productdetail->stock_shop = $tempAmount;
			try {
				$productdetail->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $amount
		@return :
		-) Fungsi ini digunakan untuk melakukan perubahan terhadap kolom stock_storage
	*/
	public function updateStorage($id, $amount)
	{
		$respond = array();
		$productdetail = Productdetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $productdetail->stock_storage + $amount;
			$productdetail->stock_storage = $tempAmount;
			try {
				$productdetail->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id, $amount
		@return :
		-) Fungsi ini digunakan untuk melakukan perubahan terhadap kolom stock_storage (-)
	*/
	public function updateMinusStorage($id, $amount)
	{
		$respond = array();
		$productdetail = ProductDetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$tempAmount = $productdetail->stock_storage - $amount;
			$productdetail->stock_storage = $tempAmount;
			try {
				$productdetail->save();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	public function deleteProdDet($id)
	{
		$respond = array();
		$productdetail = Productdetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$productdetail->deleted = 1;
			try {
				$productdetail->save();
				$respond = array('code'=>'200','status' => 'OK');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	public function unDeleteProdDet($id)
	{
		$respond = array();
		$productdetail = Productdetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$productdetail->deleted = 0;
			try {
				$productdetail->save();
				$respond = array('code'=>'200','status' => 'OK');
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
		-) Fungsi ini digunakan untuk melakukan perubahan di view stock
	*/
	public function updateForViewStock($id, $editColor, $editShop, $editStorage, $editFoto)
	{
		$respond = array();
		$productdetail = Productdetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			$productdetail->color = $editColor;
			$productdetail->stock_shop = $editShop;
			$productdetail->stock_storage = $editStorage;
			if($editFoto != '-')
			{
				$productdetail->photo = "http://localhost/asia_jaya/public/assets/product_img/".$editFoto;
			}
			try {
				$productdetail->save();
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
		$productdetail = Productdetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$productdetail-> = ;
			try {
				$productdetail->save();
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
		$productdetail = Productdetail::find($id);
		if ($productdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$productdetail->delete();
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
		$productdetail = Productdetail::where('','=','')->get();
		if (count($productdetail) >= 0)
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
			$products = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->where('prod.product_code', 'LIKE', '%'.$keyword.'%')->where('prds.deleted','=',0)->orWhere('prod.name', 'LIKE', '%'.$keyword.'%')->orWhere('prds.color', 'LIKE', '%'.$keyword.'%')->where('prds.deleted','=',0)->get();
			foreach($products as $product => $key)
			{
				if($key->stock_shop == 0 && $key->stock_storage == 0)
				{
					if($key->isSeri == 0)
					{
						unset($products[$product]);
					}
				}
					
				/*
				if($key->isSeri == '1')
				{
					$reference = $key->reference;
					$prdClr = $key->color;
					$reference = explode(';',$reference);
					$counter = count($reference);
					$prdClr = explode('-',$prdClr);
					$clr = "";
					$shopTotal = 0;
					$storageTotal = 0;
					$salesPrice = 0;
					$minPrice = 0;
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
							
							$shop = $productDetail->stock_shop;
							$shopTotal += $shop;
							
							$storage = $productDetail->stock_storage;
							$storageTotal += $storage;
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
					if($clr == "")
					{
						unset($products[$product]);
					}
					else
					{
						$key->color = $clr;
						$key->stock_shop = $shopTotal;
						$key->stock_storage = $storageTotal;
						$key->min_price = $minPrice;
						$key->sales_price = $salesPrice;
					}
				}
				*/
			}
			if(count($products) == 0)
			{
				//not found
				$response = array('code'=>'404','status' => 'Not Found');
			}
			else
			{
				//found				
				$response = array('code'=>'200','status' => 'OK','messages'=>$products);
			}
			
			return Response::json($response);
		}
		catch(Exception $e)
		{
			//forbidden
			$response = array('code'=>'403','status' => $e->getMessage());
			return Response::json($response);
		}
	}
	
	public function getProductByReference()
	{
		$reference = Input::get('reference');
		$reference = explode(';',$reference,-1);
		$result = array();
		foreach($reference as $ref)
		{
			$explodeRes = explode('-',$ref);
			$prodDetId = $explodeRes[0];
			$products = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->where('prds.id', '=', $prodDetId)->first();
			if($products->stock_shop == 0 && $products->stock_storage == 0)
			{
				
			}
			else
			{
				$result[] = $products;
			}
			
		}
		
		if(count($result)==0)
		{
			$response = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$response = array('code'=>'200','status' => 'OK','messages'=>$result);
		}
		
		return $response;
	}
	
	public function getTop10RepeatedProduct()
	{
		$respond = array();
		$orders = DB::table('orders')->select(DB::raw('product_detail_id,sum(quantity) as quant_total'))->join('transactions', 'transactions.id', '=','orders.transaction_id')->whereRaw('MONTH(orders.created_at) >= MONTH(curdate())')->whereRaw('YEAR(orders.created_at) >= YEAR(curdate())')->groupBy('customer_id')->groupBy('product_detail_id')->orderBy('quant_total','dsc')->take(10)->get();
		foreach($orders as $ord)
		{
			$prdDtl = ProductDetail::find($ord->product_detail_id);
			$prd = Product::find($prdDtl->product_id);
			$ord->name = $prd->name." - ".$prdDtl->color;
		}
		
		return $orders;
	}
	
	public function addObral($amount)
	{
		$respond = array();
		$product = Product::where('product_code','=','000000')->first();
		$id;
		if($product == null)
		{
			$productController = new ProductsController();
			$id = $productController->insertWithParam("000000", "Barang Obral", 0, 0, 0, 0, 0, "-", 0);
			$product = Product::find($id);
		}
		$productDetail = ProductDetail::where('product_id','=',$product->id)->first();
		if($productDetail == null)
		{
			$productController = new ProductsController();
			$id = $this->insertWithParam("-", "-", 0, 0, $id, 0, 0, 0);
			$productDetail = ProductDetail::find($id);
		}
		
		$current = $productDetail->stock_shop;
		$productDetail->stock_shop = $current + $amount;
		
		try
		{
			$productDetail->save();
			return 1;
		}
		catch(Exception $e)
		{
			return -1;
		}
	}
	
}
