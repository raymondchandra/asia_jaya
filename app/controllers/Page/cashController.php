<?php

class cashController extends \HomeController{

	/*
	public function view_laporan_cash(){
		$controller = new CashesController();
		$allData = $controller->getTodayData();
		$allDataJson = json_decode($allData->getContent());
		$datas = $allDataJson->{'message'};
		
		
		return View::make('pages.laporan_cash.manage_laporan_cash', compact('datas'));
	}
	*/
	
	public function view_laporan_cash(){
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$cashController = new CashesController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$allData = $cashController->getTodayData();
				$allDataJson = json_decode($allData->getContent());
				if($allDataJson->{'status'} != 'Not Found'){
					$dataAll = $allDataJson->{'message'};
				}else{
					$dataAll = null;
				}
			}
			else
			{
				$allCashJson = $cashController->getSortedAll($sortBy, $order);
				$allCash = json_decode($allCashJson->getContent());
				if($allCash->{'status'} != 'Not Found'){
					$dataAll = $allCash->{'messages'};
				}else{
					$dataAll = null;
				}
			}
			$datas = null;
			if($dataAll != null){				
				foreach($dataAll as $allData){
					$datas[] = (object)array('type'=>$allData->type, 'transaction_id'=>$allData->transaction_id, 'in_amount'=>$allData->in_amount, 'out_amount'=>$allData->out_amount, 'total'=>$allData->total, 'created_at'=>$allData->created_at, 'no_faktur'=>$allData->no_faktur);
				}
			}
		
			return View::make('pages.laporan_cash.manage_laporan_cash', compact('datas','sortBy','order','filtered'));
		}
	}
}