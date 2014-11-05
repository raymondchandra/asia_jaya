<?php

class taxController extends \HomeController{
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return :
		-) Fungsi ini digunakan untuk memasukkan record baru atau mengupdate kolom amount
	*/
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
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return :
		-) Fungsi ini digunakan untuk mengambil isi dari tabel taxes sesuai id
	*/
	public function getTax($id){
		return Tax::find($id);
	}
	
}