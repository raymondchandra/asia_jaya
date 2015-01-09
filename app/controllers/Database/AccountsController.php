<?php

class AccountsController extends \BaseController {
	
	public function insert()
	{
		$respond = array();
		$data = Input::all();
		//validate
		$validator = Validator::make($data, Account::$rules);

		if ($validator->fails())
		{
			$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
			return Response::json($respond);
		}

		//save
		try {
			Account::create($data);
			$respond = array('code'=>'201','status' => 'Created');
		} catch (Exception $e) {
			$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
		}
		return Response::json($respond);
	}
	
	public function getReturn($account)
	{
		$respond = array();
		if (count($account) == 0)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$respond = array('code'=>'200','status' => 'OK','messages'=>$account);
		}
		return Response::json($respond);
	}
	
	public function getAll()
	{
		$account = Account::all();
		return $this->getReturn($account);
	}

	public function getById($id)
	{
		$account = Account::find($id);
		return $this->getReturn($account);
	}
	
	public function getSortedAll($by, $order)
	{
		$account = Account::orderBy($by, $order)->get();
		
		return $this->getReturn($account);
	}
	
	public function getFilteredAccount($username, $role, $lastLogin, $active)
	{
		$isFirst = false;
		
		if($username != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('username', 'LIKE', '%'.$username.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('username', 'LIKE', '%'.$username.'%');
			}
		}
		
		if($role != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('role', '=', $role);
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('role', '=', $role);
			}
		}
		
		if($lastLogin != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('last_login', 'LIKE', '%'.$lastLogin.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('last_login', 'LIKE', '%'.$lastLogin.'%');
			}
		}
		
		if($active != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('active', '=', $active);
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('active', '=', $active);
			}
		}
		
		if($isFirst == false)
		{
			$account = Account::all();
			$isFirst = true;
		}
		else
		{
			$account = $accountTab->get();
		}
		
		return $this->getReturn($account);
	}
	
	public function getFilteredAccount2($username, $role, $lastLogin, $id)
	{
		$isFirst = false;
		
		if($username != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('username', 'LIKE', '%'.$username.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('username', 'LIKE', '%'.$username.'%');
			}
		}
		
		if($role != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('role', 'LIKE', '%'.$role.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('role', 'LIKE', '%'.$role.'%');
			}
		}
		
		if($lastLogin != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('last_login', 'LIKE', '%'.$lastLogin.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('last_login', 'LIKE', '%'.$lastLogin.'%');
			}
		}
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('id', '=', $id);
			}
		}
		
		if($isFirst == false)
		{
			$account = Account::all();
			$isFirst = true;
		}
		else
		{
			$account = $accountTab->get();
		}
		
		return $this->getReturn($account);
	}
	
	public function getSortedFilteredAccount($username, $role, $lastLogin, $active, $sortBy, $order)
	{
		$isFirst = false;
		
		if($username != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('username', 'LIKE', '%'.$username.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('username', 'LIKE', '%'.$username.'%');
			}
		}
		
		if($role != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('role', '=', $role);
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('role', '=', $role);
			}
		}
		
		if($lastLogin != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('last_login', 'LIKE', '%'.$lastLogin.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('last_login', 'LIKE', '%'.$lastLogin.'%');
			}
		}
		
		if($active != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('active', '=', $active);
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('active', '=', $active);
			}
		}
		
		if($isFirst == false)
		{
			$account = Account::orderBy($sortBy, $order)->get();
			$isFirst = true;
		}
		else
		{
			$account = $accountTab->orderBy($sortBy, $order)->get();
		}
		
		return $this->getReturn($account);
	}
	
	public function getSortedFilteredAccount2($username, $role, $lastLogin, $id, $sortBy, $order)
	{
		$isFirst = false;
		
		if($username != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('username', 'LIKE', '%'.$username.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('username', 'LIKE', '%'.$username.'%');
			}
		}
		
		if($role != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('role', 'LIKE', '%'.$role.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('role', 'LIKE', '%'.$role.'%');
			}
		}
		
		if($lastLogin != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('last_login', 'LIKE', '%'.$lastLogin.'%');
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('last_login', 'LIKE', '%'.$lastLogin.'%');
			}
		}
		
		if($id != '-')
		{
			if($isFirst == false)
			{
				$accountTab = Account::where('id', '=', $id);
				$isFirst = true;
			}
			else
			{
				$accountTab = $accountTab->where('id', '=', $id);
			}
		}
		
		if($isFirst == false)
		{
			$account = Account::orderBy($sortBy, $order)->get();
			$isFirst = true;
		}
		else
		{
			$account = $accountTab->orderBy($sortBy, $order)->get();
		}
		
		return $this->getReturn($account);
	}
	
	/*
	public function getBy<column>()
	{
		$account = Account::where('','=','')->get();
		return $this->getReturn($account);
	}
	*/

	public function updateFull($id)
	{
		$respond = array();
		$account = Account::find($id);
		if ($account == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			$data = Input::all();
			//validate
			$validator = Validator::make($data, Account::$rules);

			if ($validator->fails())
			{
				$respond = array('code'=>'400','status' => 'Bad Request','messages' => $validator->messages());
				return Response::json($respond);
			}
			//save
			try {
				$account->update($data);
				$respond = array('code'=>'204','status' => 'No Content');
			} catch (Exception $e) {
				$respond = array('code'=>'500','status' => 'Internal Server Error', 'messages' => $e);
			}
			
		}
		return Response::json($respond);
	}
	
	public function addAccount()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$role = Input::get('role');
		$active = 0;
		$account = new Account();
		$account->username = $username;
		$account->password = Hash::make($password);
		$account->role = $role;
		$account->active = $active;
		
		try
		{
			$account->save();
			return Response::json(array('code'=>'200','status' => 'OK','messages' => $account->id));
		}
		catch(Exception $ex)
		{
			return Response::json(array('code'=>'400','status' => 'Bad Request'));
		}
	}
	
	public function editAccount()
	{
		$id = Input::get('id');
		$username = Input::get('username');
		$password = Input::get('password');
		$isEditPassword = Input::get('isEditPassword');
		$role = Input::get('role');
		$account  = Account::find($id);
		$account->username = $username;
		if($isEditPassword === 'yes')
		{
			$account->password = Hash::make($password);
		}
		$account->role = $role;
		try
		{
			$account->save();
			return $respond = array('code'=>'200','status' => 'OK');
		}
		catch(Exception $ex)
		{
			return $respond = array('code'=>'400','status' => 'Bad Request');
		}
	}
	
	public function deleteAccount()
	{
		$id = Input::get('id');
		$username = Input::get('username');
		$password = Input::get('password');
		$isEditPassword = Input::get('isEditPassword');
		$role = Input::get('role');
		$account  = Account::find($id);
		$account->username = $username;
		if($isEditPassword === 'yes')
		{
			$account->password = Hash::make($password);
		}
		$account->role = $role;
		try
		{
			$account->save();
			return $respond = array('code'=>'200','status' => 'OK');
		}
		catch(Exception $ex)
		{
			return $respond = array('code'=>'400','status' => 'Bad Request');
		}
	}
	
	/*
		@author : Gentry Swanri
		@parameter : $id
		@return :
		-) Fungsi untuk mengupdate status active karyawan
	*/
	public function updateActive($id)
	{
		$respond = array();
		$account = Account::find($id);
		if ($account == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			if($account->active == 1){
				$account->active = 0;
			}else{
				$account->active = 1;
			}
			try {
				$account->save();
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
		$account = Account::find($id);
		if ($account == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			//edit value
			//$account-> = ;
			try {
				$account->save();
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
		$account = Account::find($id);
		if ($account == null)
		{
			$respond = array('code'=>'404','status' => 'Not Found');
		}
		else
		{
			try {
				$account->delete();
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
		$account = Account::where('','=','')->get();
		if (count($account) >= 0)
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
