<?php

class returnController extends \HomeController{
	
	/*
		@author : Gentry Swanri
		@parameter :
		@return :
		-) Fungsi ini digunakan apabila ada pembeli ynag ingin menukarkan barang yang telah dibeli
		-) Type mempunyai 3 jenis, yaitu 1=>barang dengan uang, 2=>barang dengan baarang sama, dan 3=>barang dengan barang beda
	*/
	public function returnProduct(){
		//Dummy data
		$orderId = 1;
		$type = 1;
		$status = "pending";
		$solution = "pending";
		$tradeProductId = 1;
		$difference = 0;
		
		$returnController = new ReturnsController();
		$addReturns = $returnController->insertWithParam($orderId, $type, $status, $solution, $tradeProductId, $difference);
		return $addReturns;
	}
}
