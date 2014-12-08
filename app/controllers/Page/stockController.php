<?php

class stockController extends \HomeController{
		
	public function viewStock()
	{
		$products = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->get();
		if(count($products) == 0)
		{
			//not found
			$products = null;
		}
		
		return View::make('pages.stock.manage_stock', compact('products'));
	}
}