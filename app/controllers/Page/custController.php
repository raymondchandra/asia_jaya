<?php

class custController extends \HomeController{
	public function view_customer(){
		$customerController = new CustomersController();
		$allData = $customerController->getAll();
		$allDataJson = json_decode($allData->getContent());
		
		if($allDataJson->{'status'}!='Not Found'){
			$dataAll = $allDataJson->{'messages'};
			foreach($dataAll as $data){
				$data->countTrans = $this->countTransaction($data->id);
				$data->total = $this->countTotal($data->id);
			}
		}else{
			$dataAll = null;
		}
		
		return View::make('pages.customer.manage_customer', compact('dataAll'));
	}
	
	public function view_history(){
		$id = Input::get('id');
		
		$transaction = $this->findSpesificTransaction($id);
		if($transaction!=null){
			foreach($transaction as $trans){
				$trans->salesName = $this->findSalesName($trans->sales_id);
			}
		}
		
		return View::make('pages.customer.customer_history', compact('transaction'));
	}
	
	public function findSalesName($sales_id){
		$salesData = Account::where('id', '=', $sales_id)->get();
		$username = "";
		foreach($salesData as $data){
			$username = $data->username;
		}
		return $username;
	}
	
	public function findSpesificTransaction($cust_id){
		$transaction = Transaction::where('customer_id', '=', $cust_id)->get();
		return $transaction;
	}
	
	public function countTransaction($cust_id){
		$transaction = Transaction::where('customer_id','=', $cust_id)->get();
		$count = 0;
		if($transaction!=null){
			foreach($transaction as $trans){
				$count++;
			}
		}
		return $count;
	}
	
	public function countTotal($cust_id){
		$transaction = Transaction::where('customer_id','=', $cust_id)->get();
		$total = 0;
		if($transaction!=null){
			foreach($transaction as $trans){
				$total = $total+$trans->total;
			}
		}
		return $total;
	}
}