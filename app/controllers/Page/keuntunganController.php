<?php

class keuntunganController extends \HomeController{

	public function viewDashboard()
	{
		$customerController = new CustomersController();
		$ordersController = new OrdersController();
		$returnController = new ReturnsController();
		$cashController = new CashesController();
		$productDetailController = new ProductDetailsController();
		$productsController = new ProductsController(); 
		
		$profits = json_decode($ordersController->getYearlyProfit()->getContent());
		$profits = $profits->{'message'};
		$incomes = json_decode($ordersController->getYearlyIncome()->getContent());
		$incomes = $incomes->{'message'};
		$monthlyDetail = json_decode($ordersController->getMonthlyProfitDetail()->getContent());
		$monthlyDetail = $monthlyDetail->{'message'};

		return View::make('pages.laporan_keuntungan.manage_keuntungan_bulanan',compact('profits','incomes','monthlyDetail'));
	}
	
	public function viewKeuntunganHarian()
	{
		$month = Input::get('month');
		$ordersController = new OrdersController();
		$profits = json_decode($ordersController->getDailyProfit($month)->getContent());
		$profits = $profits->{'message'};
		$incomes = json_decode($ordersController->getDailyIncome($month)->getContent());
		$incomes = $incomes->{'message'};
		$monthlyDetail = json_decode($ordersController->getDailyProfitDetail($month)->getContent());
		$monthlyDetail = $monthlyDetail->{'message'};
		
		return View::make('pages.laporan_keuntungan.manage_keuntungan_harian',compact('profits','incomes','monthlyDetail'));
	}
}