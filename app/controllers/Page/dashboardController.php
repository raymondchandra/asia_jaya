<?php

class dashboardController extends \HomeController{

	public function viewDashboard()
	{
		$customerController = new CustomersController();
		$ordersController = new OrdersController();
		$returnController = new ReturnsController();
		$productDetailController = new ProductDetailsController();
		$cashController = new CashesController();
		
		$topBuyer = $customerController->getTop10Buyer();
		$topProduct = $ordersController->getTop10ProductBought();
		$topReturn = $returnController->getTop10ReturnedProduct();
		$topRepeat = $productDetailController->getTop10RepeatedProduct();
		$todayCash = json_decode($cashController->getTodayTotalCash()->getContent());
		$todayCash = $todayCash->{'message'};
		$monthCash = json_decode($cashController->getMonthlyCashFlow()->getContent());
		$monthCash = $monthCash->{'message'};
		$yearCash = json_decode($cashController->getYearlyCashFlow()->getContent());
		$yearCash = $yearCash->{'message'};
		return View::make('pages.dashboard.manage_dashboard', compact('topBuyer','topProduct','topReturn','topRepeat','todayCash','monthCash','yearCash'));
	}
	
	public function addOpeningCash()
	{
		$amount = Input::get('amount');
		$controller = new CashesController();
		$controller->insertWithParam('-',$amount,'0','opening cash');
		
		return $controller->getTodayTotalCash();
	}
}