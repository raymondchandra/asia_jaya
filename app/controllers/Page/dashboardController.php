<?php

class dashboardController extends \HomeController{

	public function viewDashboard()
	{
		$customerController = new CustomersController();
		$ordersController = new OrdersController();
		$returnController = new ReturnsController();
		$productDetailController = new ProductDetailsController();
		
		$topBuyer = $customerController->getTop10Buyer();
		$topProduct = $ordersController->getTop10ProductBought();
		$topReturn = $returnController->getTop10ReturnedProduct();
		$topRepeat = $productDetailController->getTop10RepeatedProduct();
		
		return View::make('pages.dashboard.manage_dashboard', compact('topBuyer','topProduct','topReturn','topRepeat'));
	}
}