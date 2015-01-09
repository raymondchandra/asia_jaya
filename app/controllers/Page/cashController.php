<?php

class cashController extends \HomeController{

	public function view_laporan_cash(){
		$controller = new CashesController();
		$allData = $controller->getTodayData();
		$allDataJson = json_decode($allData->getContent());
		$datas = $allDataJson->{'message'};
		
		
		return View::make('pages.laporan_cash.manage_laporan_cash', compact('datas'));
	}
}