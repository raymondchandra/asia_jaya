<?php

class transController extends \HomeController{

	function updateVoid(){
		$transactionController = new TransactionsController();
		$id = 1;
		
		$update = $transactionController->updateVoid($id);
		
		return $update;
	}
	
	function updatePrintCustomer(){
		$transactionController = new TransactionsController();
		$id = 1;
		
		$update = $transactionController->updatePrintCustomer($id);
		
		return $update;
	}
	
	function getOrderByTransactionId(){
		$idTransaction = 1;
		$order = Order::where('transaction_id', 'LIKE', $idTransaction)->get();

		return $order;
	}
	
	function getOrderArray($transaction_id){
		$order = Order::where('transaction_id', 'LIKE', $transaction_id)->get();
		$orderList = json_decode($order);
		
		foreach($orderList as $list){
			$dataArray[] = array(
				'id' => $list->id,
				'quantity' => $list->quantity,
				'transaction_id' => $list->transaction_id,
				'price' => $list->price,
				'product_detail_id' => $list->product_detail_id
			);
		}
		
		return $dataArray;
	}
	
	function getAllTransaction(){
		$transactionController = new TransactionsController();
		$allData = $transactionController->getAll();
		$allDataJson = json_decode($allData->getContent());
		
		if($allDataJson->{'status'}!='Not Found'){
			$dataAll = $allDataJson->{'messages'};
			foreach($dataAll as $data){
				$data->order = $this->getOrderArray($data->id);
			}
			
			$response = array('code'=>'200','status' => 'OK','messages'=>$dataAll);
		}else{
			$response = array('code'=>'404','status' => 'Not Found');
		}
		
		return Response::json($response);
	}

}