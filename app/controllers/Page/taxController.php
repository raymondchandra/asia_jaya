<?php

class taxController extends \HomeController{
	
	public function setTax(){
		$id = 1;
		$amount = 10;
		
		$taxesController = new TaxesController();
		
		$tax = Tax::find($id);
		if($tax == null){
			$taxJson = $taxesController->insertWithParam($amount);
			return $taxJson;
		}else{
			$taxJson = $taxesController->updateAmount($id, $amount);
			return $taxJson;
		}
	}
	
	public function getTax($id){
		return Tax::find($id);
	}
	
}