<?php

class dashboardController extends \HomeController{

	public function viewDashboard()
	{
		$customerController = new CustomersController();
		$ordersController = new OrdersController();
		$returnController = new ReturnsController();
		$cashController = new CashesController();
		$productDetailController = new ProductDetailsController();
		$productsController = new ProductsController(); 
		
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

		$totaltoko = 0;
		$stock = 0;
		$products = DB::table('products')->get();
		foreach($products as $product)
		{
			$detail_product = DB::table('product_details')->where('product_id', '=', $product->id)->get();
			foreach($detail_product as $row_detail_product)
			{
				$stock += $row_detail_product->stock_shop;
			}
			$totaltoko += ($stock * $product->modal_price);
		}

		$stock = 0;

		$totalgudang = 0;
		$products = DB::table('products')->get();		
		foreach($products as $product)
		{
			$detail_product = DB::table('product_details')->where('product_id', '=', $product->id)->get();
			foreach($detail_product as $row_detail_product)
			{
				$stock += $row_detail_product->stock_storage;
			}
			$totalgudang += ($stock * $product->modal_price);
		}

		$totaltokogudang = $totaltoko + $totalgudang;

		$kasHariIni = $cashController->getTodayInpuCash();



		return View::make('pages.dashboard.manage_dashboard', compact('topBuyer','topProduct','topReturn','topRepeat','todayCash','monthCash','yearCash','totaltoko', 'totalgudang','totaltokogudang','kasHariIni'));
	}
	
	public function addOpeningCash()
	{
		$amount = Input::get('amount');
		$controller = new CashesController();
		$controller->insertWithParam('-',$amount,'0','opening cash');
		
		return $controller->getTodayTotalCash();
	}
}