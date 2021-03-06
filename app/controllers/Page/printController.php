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
			$value->productCode = $product->product_code;
			$total += $value->price;
		}
		$strukController = new StrukController();
		$kodeFaktur = $transaksi->no_faktur;
		return View::make('pages.print_struk.print_toko', compact('namaPelanggan','namaSales','transaksi','orders','total','kodeFaktur'));
	}
	
	public function view_print_konsumen(){
		$idTransaksi = Input::get('dataT');
		
		$transaksi = Transaction::find($idTransaksi);
		
		
		$namaPelanggan = Customer::find($transaksi->customer_id)->name;
		$namaSales = Account::find($transaksi->sales_id)->username;
		$orders = DB::table('orders')->select(DB::raw('name , SUM(quantity) as quantity, SUM(price) as price'), 'product_detail_id as prd_id','product_code')->join('product_details', 'product_details.id', '=', 'orders.product_detail_id')->join('products' , 'product_id' , '=' , 'products.id')->where('transaction_id', '=', $idTransaksi)->groupBy('product_code')->get();
		$total = 0;
		foreach ($orders as $value)
		{
			$productDetail = ProductDetail::find($value->prd_id);
			$product = Product::find($productDetail->product_id);
			$value->productCode = $product->product_code;
			$total += $value->price;
		}
		$strukController = new StrukController();
		$kodeFaktur = $transaksi->no_faktur;
		return View::make('pages.print_struk.print_konsumen', compact('namaPelanggan','namaSales','transaksi','orders','total','kodeFaktur'));
	}
	
	public function view_print_return(){
		$idReturn = Input::get('dataT');
		
		$return_data = ReturnDB::find($idReturn);
		$order_data = Order::find($return_data->order_id);
		$transaction_data = Transaction::find($order_data->transaction_id);
		$customer_data = Customer::find($transaction_data->customer_id);
		$account_data = Account::find($transaction_data->sales_id);
		$product_detail_data = ProductDetail::find($order_data->product_detail_id);
		$product_data = Product::find($product_detail_data->product_id);
		
		$created = $return_data->created_at;
		$pelanggan = $customer_data->name;
		$sales = $account_data->username;
		$type = $return_data->type;
		$solution = $return_data->solution;
		$barangReturn = $product_data->product_code;
		if($type==2){
			$barangTukar = Product::find(ProductDetail::find($return_data->trade_product_id)->product_id)->product_code;
		}else{
			$barangTukar = '-';
		}
		$difference = $return_data->difference;
		$strukController = new StrukController();
		
		$kodeFaktur = $return_data->no_faktur;
		
		return View::make('pages.print_struk.print_return', compact('created','pelanggan','sales','type','solution','barangReturn','barangTukar','difference','kodeFaktur'));
	}
}