<?php

class printController extends \HomeController{

	public function view_print_toko(){
		$idTransaksi = Input::get('dataT');
		
		$transaksi = Transaction::find($idTransaksi);
		
		
		$namaPelanggan = Customer::find($transaksi->customer_id)->name;
		$namaSales = Account::find($transaksi->sales_id)->username;
		$orders = Order::where('transaction_id' , '=', $transaksi->id)->get();
		$total = 0;
		foreach ($orders as $value)
		{
			$productDetail = ProductDetail::find($value->product_detail_id);
			$product = Product::find($productDetail->product_id);
			$value->productColor = $productDetail->color;
			$value->productName = $product->name;
			$total += $value->price;
		}

		return View::make('pages.print_struk.print_toko', compact('namaPelanggan','namaSales','transaksi','orders','total'));
	}
	
	public function view_print_konsumen(){
		$idTransaksi = Input::get('dataT');
		
		$transaksi = Transaction::find($idTransaksi);
		
		
		$namaPelanggan = Customer::find($transaksi->customer_id)->name;
		$namaSales = Account::find($transaksi->sales_id)->username;
		$orders = DB::table('orders')->select(DB::raw('name , SUM(quantity) as quantity, SUM(price) as price'))->join('product_details', 'product_details.id', '=', 'orders.product_detail_id')->join('products' , 'product_id' , '=' , 'products.id')->where('transaction_id', '=', $idTransaksi)->groupBy('name')->get();
		$total = 0;
		foreach ($orders as $value)
		{
			$total += $value->price;
		}

		return View::make('pages.print_struk.print_konsumen', compact('namaPelanggan','namaSales','transaksi','orders','total'));
	}
}