<?php

class historyRestockController extends \HomeController{

	public function viewHistoryRestock()
	{
		$sortBy = Input::get('sortBy','none');
		$order = Input::get('order','none');
		$filtered = Input::get('filtered', '0');
		$controller = new RestockDetailsController();
		
		if($filtered == '0')
		{
			if($sortBy === "none")
			{
				$allResultJson = $controller->getAlls();
				$allResult = json_decode($allResultJson->getContent());
			}
			else
			{
				$allResultJson = $controller->getSortedAll($sortBy, $order);
				$allResult = json_decode($allResultJson->getContent());
			}
			
			$datas = null;
			if($allResult->{'status'} != 'Not Found'){
				$datas = $allResult->{'messages'};
			}
			return View::make('pages.restock.history_restock', compact('datas','sortBy','order','filtered'));
		}
		else
		{
			$code = Input::get('code','-');
			$prod_name = Input::get('name', '-');
			$color = Input::get('color', '-');
			$shop = Input::get('shop', '-');
			$storage = Input::get('storage', '-');
			$created_at = Input::get('time', '-');
			
			if($sortBy == "none")
			{
				$allResultJson = $controller->getFilteredAccount($code, $prod_name, $color, $shop, $storage, $created_at);
			}
			else
			{
				$allResultJson = $controller->getSortedFilteredAccount($$code, $prod_name, $color, $shop, $storage, $created_at, $sortBy, $order);
			}
			
			$allResult = json_decode($allResultJson->getContent());
			
			$datas = null;
			if($allResult->{'status'} != 'Not Found'){
				$datas = $allResult->{'messages'};	
			}
			
			return View::make('pages.restock.history_restock', compact('datas','sortBy','order','filtered','code','prod_name','color','shop','storage','created_at'));
		}
	}
	
	
	
}