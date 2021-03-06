<?php

class accountController extends \BaseController {
	
	
	public function viewAccount()
	{
		//return View::make('pages.admin.attribute.manage_attribute', compact('attributes','sortBy','sortType','page','filtered'));
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$accountController = new AccountsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$allEmployeeJson = $accountController->getAll();
				$allEmployee = json_decode($allEmployeeJson->getContent());
			}
			else
			{
				$allEmployeeJson = $accountController->getSortedAll($sortBy, $order);
				$allEmployee = json_decode($allEmployeeJson->getContent());
			}
			$datas = null;
			if($allEmployee->{'status'} != 'Not Found'){
				$allEmployeeData = $allEmployee->{'messages'};
				foreach($allEmployeeData as $allData){
					if($allData->role == '2' || $allData->role == '3' || $allData->role == '1'){
						$datas[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
					}
				}
			}

			return View::make('pages.account.manage_account', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			$username = Input::get('username','-');
			$role = Input::get('role', '-');
			$lastLogin = Input::get('lastLogin', '-');
			$active = Input::get('active', '-');
			
			if($sortBy == "none")
			{
				$allEmployeeJson = $accountController->getFilteredAccount($username, $role, $lastLogin, $active);
			}
			else
			{
				$allEmployeeJson = $accountController->getSortedFilteredAccount($username, $role, $lastLogin, $active, $sortBy, $order);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allEmployee = json_decode($allEmployeeJson->getContent());
			$datas = null;
			if($allEmployee->{'status'} != 'Not Found'){
				$allEmployeeData = $allEmployee->{'messages'};
				foreach($allEmployeeData as $allData){
					if($allData->role == '2' || $allData->role == '3'){
						$datas[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
					}
				}
			}

			return View::make('pages.account.manage_account', compact('datas','sortBy','order','filtered','username','role','lastLogin','active'));
		}
		
		
		
	}
	
	public function getEmployee(){
		$accountController = new AccountsController();
		
		$allEmployeeJson = $accountController->getAll();
		$allEmployee = json_decode($allEmployeeJson->getContent());
		
		if($allEmployee->{'status'} != 'Not Found'){
			$allEmployeeData = $allEmployee->{'messages'};
			foreach($allEmployeeData as $allData){
				if($allData->role == '2' || $allData->role == '3'){
					$data[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
				}
			}
		}
		
		return View::make('pages.account.manage_log', compact('data'));
		
		//$respond = array('code'=>'200','status' => 'OK','messages'=>$data);
		//return Response::json($respond);
	}
	
	public function changeActive(){
		$accountController = new AccountsController();
		$id = Input::get('id');
		
		return $accountController->updateActive($id);
	}
	
	public function manageLog()
	{
		//return View::make('pages.admin.attribute.manage_attribute', compact('attributes','sortBy','sortType','page','filtered'));
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$accountController = new AccountsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$allEmployeeJson = $accountController->getAll();
				$allEmployee = json_decode($allEmployeeJson->getContent());
			}
			else
			{
				$allEmployeeJson = $accountController->getSortedAll($sortBy, $order);
				$allEmployee = json_decode($allEmployeeJson->getContent());
			}
			$datas = null;
			if($allEmployee->{'status'} != 'Not Found'){
				$allEmployeeData = $allEmployee->{'messages'};
				foreach($allEmployeeData as $allData){
					if($allData->role == '2' || $allData->role == '3'){
						$datas[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
					}
				}
			}

			return View::make('pages.account.manage_log', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			$username = Input::get('username','-');
			$role = Input::get('role', '-');
			$lastLogin = Input::get('lastLogin', '-');
			$id = Input::get('id', '-');
			
			if($sortBy === "none")
			{
				$allEmployeeJson = $accountController->getFilteredAccount2($username, $role, $lastLogin, $id);
			}
			else
			{
				$allEmployeeJson = $accountController->getSortedFilteredAccount2($username, $role, $lastLogin, $id, $sortBy, $order);
			}
			//$allEmployeeJson = $accountController->getFilteredProfile($username, $role, $lastLogin, $active);
			$allEmployee = json_decode($allEmployeeJson->getContent());
			$datas = null;
			if($allEmployee->{'status'} != 'Not Found'){
				$allEmployeeData = $allEmployee->{'messages'};
				foreach($allEmployeeData as $allData){
					if($allData->role == '2' || $allData->role == '3'){
						$datas[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
					}
				}
			}

			return View::make('pages.account.manage_log', compact('datas','sortBy','order','filtered','username','role','lastLogin','id'));
		}
		
		
		
	}
}