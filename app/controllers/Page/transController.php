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

}