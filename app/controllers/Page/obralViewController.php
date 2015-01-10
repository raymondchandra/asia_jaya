<?php

class obralViewController extends \HomeController{

	public function viewObral()
	{
		$productObral = Product::where('product_code','=','000000')->first();
		if($productObral == null)
		{
			$quantity = 0;
		}
		else
		{
			$productObralDetail = ProductDetail::where('product_id','=',$productObral->id);
			$quantity = $productObralDetail->stock_shop;
		}

		return View::make('pages.obral.manage_obral',compact('quantity'));
	}
	
}