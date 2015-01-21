<?php

class RestockDetailsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Restockdetail::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Restockdetail::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	/*
		@author : Gentry Swanri
		@parameter : 
		@return :
		-) Fungsi ini digunakan untuk meng-insert record baru ke dalam tabel restock detail
	*/
	public function insertWithParam($restockId, $productDetailId, $shopAmount, $storageAmount){
		$data = array('restock_id'=>$restockId, 'product_detail_id'=>$productDetailId, 'stock_shop'=>$shopAmount, 'stock_storage'=>$storageAmount,'restock_by'=>Auth::user()->id);
		//validate
		$validator = Validator::make($data, Restockdetail::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Restockdetail::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($restockdetail)
	{
		$respond = array();
		if (count($restockdetail) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$restockdetail);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$restockdetail = Restockdetail::all();
		return $this->getReturn($restockdetail);
	}

	public function getById($id)
	{
		$restockdetail = Restockdetail::find($id);
		return $this->getReturn($restockdetail);
	}
	
	/*
	public function getBy<column>()
	{
		$restockdetail = Restockdetail::where('','=','')->get();
		return $this->getReturn($restockdetail);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$restockdetail = Restockdetail::find($id);
		if ($restockdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Restockdetail::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$restockdetail->update($data);
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
		$restockdetail = Restockdetail::find($id);
		if ($restockdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$restockdetail-> = ;
			try {
				$restockdetail->save();
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
		$restockdetail = Restockdetail::find($id);
		if ($restockdetail == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$restockdetail->delete();
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	public function getAlls()
	{
		$joined = DB::table('product_details')->join('restock_details', 'product_details.id', '=', 'restock_details.product_detail_id')->join('products', 'products.id', '=', 'product_details.product_id')->select('products.product_code', 'products.name', 'product_details.color', 'restock_details.stock_shop', 'restock_details.stock_storage', 'restock_details.created_at','restock_details.restock_by')->orderBy('restock_details.created_at','dsc')->get();
		
		return $this->getReturn($joined);
	}
	
	public function getSortedAll($by, $order)
	{
		$joined = DB::table('product_details')->join('restock_details', 'product_details.id', '=', 'restock_details.product_detail_id')->join('products', 'products.id', '=', 'product_details.product_id')->select('products.product_code', 'products.name as name', 'product_details.color', 'restock_details.stock_shop', 'restock_details.stock_storage', 'restock_details.created_at','restock_details.restock_by')->orderBy($by,$order)->get();
		
		return $this->getReturn($joined);
	}
	
	public function getFilteredRestock($code, $prod_name, $color, $shop, $storage, $created_at, $eksekutor)
	{
		$isFirst = false;
		
		$joined = DB::table('product_details')->join('restock_details', 'product_details.id', '=', 'restock_details.product_detail_id')->join('products', 'products.id', '=', 'product_details.product_id')->select('products.product_code', 'products.name', 'product_details.color', 'restock_details.stock_shop', 'restock_details.stock_storage', 'restock_details.created_at','restock_details.restock_by')->orderBy('restock_details.created_at','dsc');
		
		if($code != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.product_code', '=', $code);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.product_code', '=', $code);
			}
		}
		
		if($prod_name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.name', 'LIKE', '%'.$prod_name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.name', 'LIKE', '%'.$prod_name.'%');
			}
		}
		
		if($color != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('product_details.color', 'LIKE', '%'.$color.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('product_details.color', 'LIKE', '%'.$color.'%');
			}
		}
		
		if($shop != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('restock_details.stock_shop', '=', $shop);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('restock_details.stock_shop', '=', $shop);
			}
		}
		
		if($storage != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('restock_details.stock_storage', '=', $storage);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('restock_details.stock_storage', '=', $storage);
			}
		}
		
		if($created_at != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('restock_details.created_at', 'LIKE', '%'.$created_at.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('restock_details.created_at', 'LIKE', '%'.$created_at.'%');
			}
		}
		
		if($eksekutor != '-')
		{
		
			$accountController = new AccountsController();
			$account = $accountController->getByName($eksekutor);
			$accountJson = json_decode($account->getContent());
			if($accountJson->{'code'} != 404)
			{
				$ids = array();
				foreach($accountJson->{'messages'} as $acc)
				{
					$ids[] = $acc->id;
				}
			
				if($isFirst == false)
				{
					$resultTab = $joined->whereIn('restock_details.restock_by', $ids);
					$isFirst = true;
				}
				else
				{
					$resultTab = $resultTab->whereIn('restock_details.restock_by', $ids);
				}
			}
			else
			{
				if($isFirst == false)
				{
					$resultTab = $joined->where('restock_details.restock_by', '=', '-');
					$isFirst = true;
				}
				else
				{
					$resultTab = $resultTab->where('restock_details.restock_by', '=', '-');
				}
			}
		}
		
		if($isFirst == false)
		{
			$result = $joined->get();
			$isFirst = true;
		}
		else
		{
			$result = $resultTab->orderBy('restock_details.created_at','dsc')->get();
		}
		
		return $this->getReturn($result);
	}
	
	public function getSortedFilteredAccount($code, $prod_name, $color, $shop, $storage, $created_at, $sortBy, $order, $eksekutor)
	{
		$isFirst = false;
		
		$joined = DB::table('product_details')->join('restock_details', 'product_details.id', '=', 'restock_details.product_detail_id')->join('products', 'products.id', '=', 'product_details.product_id')->select('products.product_code', 'products.name', 'product_details.color', 'restock_details.stock_shop', 'restock_details.stock_storage', 'restock_details.created_at','restock_details.restock_by');
		
		if($code != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.product_code', '=', $code);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.product_code', '=', $code);
			}
		}
		
		if($prod_name != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('products.product_code', 'LIKE', '%'.$prod_name.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('products.product_code', 'LIKE', '%'.$prod_name.'%');
			}
		}
		
		if($color != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('product_details.color', 'LIKE', '%'.$total.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('product_details.color', 'LIKE', '%'.$total.'%');
			}
		}
		
		if($shop != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('restock_details.stock_shop', '=', $shop);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('restock_details.stock_shop', '=', $shop);
			}
		}
		
		if($storage != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('restock_details.stock_storage', '=', $storage);
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('restock_details.stock_storage', '=', $storage);
			}
		}
		
		if($created_at != '-')
		{
			if($isFirst == false)
			{
				$resultTab = $joined->where('restock_details.created_at', 'LIKE', '%'.$created_at.'%');
				$isFirst = true;
			}
			else
			{
				$resultTab = $resultTab->where('restock_details.created_at', 'LIKE', '%'.$created_at.'%');
			}
		}
		
		if($eksekutor != '-')
		{
		
			$accountController = new AccountsController();
			$account = $accountController->getByName($eksekutor);
			$accountJson = json_decode($account->getContent());
			if($accountJson->{'code'} != 404)
			{
				$ids = array();
				foreach($accountJson->{'messages'} as $acc)
				{
					$ids[] = $acc->id;
				}
			
				if($isFirst == false)
				{
					$resultTab = $joined->whereIn('restock_details.restock_by', $ids);
					$isFirst = true;
				}
				else
				{
					$resultTab = $resultTab->whereIn('restock_details.restock_by', $ids);
				}
			}
			else
			{
				if($isFirst == false)
				{
					$resultTab = $joined->where('restock_details.restock_by', '=', '-');
					$isFirst = true;
				}
				else
				{
					$resultTab = $resultTab->where('restock_details.restock_by', '=', '-');
				}
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
	
	/*
	public function exist()
	{
		$respond = array();
		$restockdetail = Restockdetail::where('','=','')->get();
		if (count($restockdetail) >= 0)
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
