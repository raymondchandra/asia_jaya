<?php

class accountController extends \HomeController {
	
	public function getEmployee(){
		$accountController = new AccountsController();
		
		$allEmployeeJson = $accountController->getAll();
		$allEmployee = json_decode($allEmployeeJson->getContent());
		
		if($allEmployee->{'status'} != 'Not Found'){
			$allEmployeeData = $allEmployee->{'messages'};
			foreach($allEmployeeData as $allData){
				if($allData->role == 'manager' || $allData->role == 'sales'){
					$data[] = (object)array('id'=>$allData->id, 'username'=>$allData->username, 'role'=>$allData->role, 'last_login'=>$allData->last_login, 'active'=>$allData->active, 'created_at'=>$allData->created_at, 'updated_at'=>$allData->updated_at);
				}
			}
		}
		
		$respond = array('code'=>'200','status' => 'OK','messages'=>$data);
		
		return Response::json($respond);
	}
	
	public function changeActive(){
		$accountController = new AccountsController();
		$id = 2;
		
		return $accountController->updateActive($id);
	}
}