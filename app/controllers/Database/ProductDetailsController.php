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
			Productdetail::create($data);
			$respond = array('code'=>'201','status' => 'Created');
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
			$products = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->where('prod.product_code', 'LIKE', '%'.$keyword.'%')->where('prds.deleted','=',0)->orWhere('prod.name', 'LIKE', '%'.$keyword.'%')->where('prds.deleted','=',0)->get();
			foreach($products as $product => $key)
			{
				if($key->isSeri == '1')
				{
					$reference = $key->reference;
					$prdClr = $key->color;
					$reference = explode(';',$reference);
					$counter = count($reference);
					$prdClr = explode('-',$prdClr);
					$clr = "";
					for($i=0 ; $i<$counter-1 ; $i++)
					{
						$quant = explode('-',$reference[$i]);
						$productDetail = ProductDetail::find($quant[0]);
						if($productDetail->deleted == '0')
						{
							if($i == 0)
							{
								$clr .= $prdClr[$i]." x ".$quant[count($quant)-1];
							}
							else
							{
								$clr .= " ".$prdClr[$i]." x ".$quant[count($quant)-1];
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
					}
				}
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
	
	public function getTop10RepeatedProduct()
	{
		$respond = array();
		$orders = DB::table('orders')->select(DB::raw('product_detail_id,sum(quantity) as quant_total'))->join('transactions', 'transactions.id', '=','orders.transaction_id')->groupBy('customer_id')->groupBy('product_detail_id')->orderBy('quant_total','dsc')->take(10)->get();
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
		$productDetail = ProductDetail::where('product_id','=',$product->id)->first();
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
