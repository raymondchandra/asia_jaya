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
	public function insertWithParam($color, $stockShop, $stockStorage, $productId, $deleted){
		$data = array('color'=>$color, 'stock_shop'=>$stockShop, 'stock_storage'=>$stockStorage, 'product_id'=>$productId, 'deleted'=>$deleted);
		
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
		$productdetail = Productdetail::find($id);
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
		$productdetail = Productdetail::find($id);
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
		$productdetail = Productdetail::find($id);
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

}
