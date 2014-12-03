<?php
	Route::get('/tes', function()
	{
		try
		{
			$keyword = "doloremque";
			$products = DB::table('products AS prod')->join('product_details AS prds', 'prod.id', '=', 'prds.product_id')->where('prod.product_code', 'LIKE', $keyword)->orWhere('prod.name', 'LIKE', $keyword)->get();
			if(count($products) == 0)
			{
				//not found
				$response = array('code'=>'404','status' => 'Not Found');
			}
			else
			{
				//found				
				$response = array('code'=>'200','status' => 'OK','messages'=>$products);
			}
			
			return Response::json($response);
		}
		catch(Exception $e)
		{
			//forbidden
			$response = array('code'=>'403','status' => 'FORBIDDEN');
			return Response::json($response);
		}
	});
	Route::get('/tes2', function()
	{
		$productDetailController = new ProductDetailsController();
		$productJson = $productDetailController->getAll();
		$json = json_decode($productJson->getContent());
		
		if($json->{'status'}!="Not Found"){
			$products = $json->{'messages'};
			foreach($products as $product)
			{
				$product->product_name = ProductDetail::find($product->product_id)->product->name;
				$product->product_code = ProductDetail::find($product->product_id)->product->product_code;
				$product->sales_price = ProductDetail::find($product->product_id)->product->sales_price;
			}
			
			$response = array('code'=>'200','status' => 'OK','messages'=>$products);
		}else{
			$response = array('code'=>'404','status' => 'Not Found');
		}
		
		return Response::json($response);
	});
	
//get list without filter
	Route::get('/searchView', 'searchViewController@getList');
	
//get list filter by product code
	Route::get('/searchViewByCode', 'searchViewController@getListByCode');
	
//get list filter by product code
	Route::get('/searchViewByName', 'searchViewController@getListByName');
	
//Finalize Sell get View
	Route::get('/finalizeSell', function(){
		return View::make('submitTest');
	});
	
//Finlize Sell
	Route::post('finalize', 'finalizeSellController@finalize');
	
//Return Product
	Route::post('returnProduct', 'returnController@returnProduct');
	
//Tax Route
	Route::post('insertUpdateTax', 'taxController@setTax');
	
//Finalize Return
	Route::post('finalizeReturn', 'returnController@finalizeReturn');
	
//restock
	Route::post('restock', 'restockController@doRestockProduct');
	
//get account
	Route::get('/getAccount', 'accountController@getEmployee');
	
//change active status account
	Route::post('changeActive', 'accountController@changeActive');
	
//change void
	Route::post('changevoid', 'transController@updateVoid');
	
//change print customer
	Route::post('changeprint', 'transController@updatePrintCustomer');
	
//get order
	Route::post('getorder', 'transController@getOrderByTransactionId');
	
//get All Transaction
	Route::post('getAllTransaction', 'transController@getAllTransaction');

//home + login
Route::get('/', ['as' => 'home', 'uses' => '']);
Route::post('/login', ['as' => 'login', 'uses' => 'AccountController@']);
Route::post('/logout', ['as' => 'logout', 'uses' => 'AccountController@']);

//sales
Route::group(['before' => 'auth'], function()
{
//product
	//get barang jualan
	Route::get('/product', ['as' => 'get.product.list' , 'uses' => 'ProductsController@getAll']);
	//cari barang
	Route::get('/product/search/{value}', ['as' => 'search.product' , 'uses' => 'ProductsController@']);
//mobile
	//hitung banyak seri
	Route::get('/series/{product_id}', ['as' => 'count.series' , 'uses' => 'ProductDetailsController@']);
	//get tax
	Route::get('/tax', ['as' => 'get.tax' , 'uses' => 'TaxesController@']);
	//check harga minimum
	Route::get('/product/{id}', ['as' => 'get.product.detail' , 'uses' => 'ProductsController@getById']);
	//suggest pembeli
	Route::get('/customer/search/{name}', ['as' => 'search.customer' , 'uses' => 'CustomersController@']);
	//finalize
	Route::post('/transaction',['as' => 'finalize.transaction' , 'uses' => 'TransactionController@']);
//desktop
	//list pesanan sendiri yg status pending
	Route::get('/transaction/{account_id}', ['as' => 'get.transaction.own.list' , 'uses' => 'TransactionsController@']);
	//detail pesanan
	Route::get('/transaction/{id}', ['as' => 'get.transaction.detail' , 'uses' => 'TransactionsController@']);
	//bayar+print
	Route::put('/transaction/{id}', ['as' => 'pay.transaction' , 'uses' => 'TransactionsController@']);
	//hapus pesanan
	Route::delete('/transaction/{id}', ['as' => 'delete.transaction' , 'uses' => 'TransactionsController@delete']);
});

//manager
Route::group(['before' => 'auth_manager'], function()
{
//pesanan
	//list semua pesanan yg status pending
	Route::get('/transaction/pending', ['as' => 'get.transaction.pending.list' , 'uses' => 'TransactionsController@']);
	//print toko
	Route::put('/transaction/print/{id}', ['as' => 'print.transaction.shop' , 'uses' => 'TransactionsController@']);
	//void
	Route::put('/transaction/void/{id}', ['as' => 'void.transaction' , 'uses' => 'TransactionsController@']);
//simpen barang ke gudang
	Route::get('/restock/store', ['as' => 'get.restock.store' , 'uses' => 'RestocksController@']);
	Route::post('/restock/store', ['as' => 'add.restock.store' , 'uses' => 'RestocksController@']);
//return
	//cari belanja
	Route::get('/transaction/search/{product_code}/{customer_name}', ['as' => 'get.transaction.search' , 'uses' => 'TransactionsController@']);
	//get smua return
	Route::get('/return', ['as' => 'get.return.list' , 'uses' => 'ReturnsController@']);
	//get detail return 
	Route::get('/return/{id}', ['as' => 'get.return.detail' , 'uses' => 'ReturnsController@']);
	//add return
	Route::post('/return', ['as' => 'add.return' , 'uses' => 'ReturnsController@']);
	//proses return
	Route::put('/return', ['as' => 'edit.return' , 'uses' => 'ReturnsController@']);
//product + obral
	//get smua
	Route::get('/product', ['as' => 'get.product.list' , 'uses' => 'ProductsController@']);
	//lihat barang obral
	Route::get('/product/obral', ['as' => 'get.product.obral' , 'uses' => 'ProductsController@']);
	//obralkan barang
	Route::put('/product/obral', ['as' => 'add.product.obral' , 'uses' => 'ProductsController@']);
	
});

//owner
Route::group(['prefix' => 'admin', 'before' => 'auth_owner'], function()
{
//product
	//(get pake route yang manager dan sales)
	//edit barang
	Route::put('/product/{id}', ['as' => 'edit.product' , 'uses' => 'ProductsController@updateFull']);
	//hapus barang
	Route::delete('/product/{id}', ['as' => 'delete.product' , 'uses' => 'ProductsController@delete']);
//account
	//list account
	Route::get('/account', ['as' => 'get.account.list' , 'uses' => 'AccountsController@']);
	//detail 
	Route::get('/account/{id}', ['as' => 'get.account.detail' , 'uses' => 'AccountsController@getById']);
	//tambah
	Route::post('/account', ['as' => 'add.account' , 'uses' => 'AccountsController@insert']);
	//hapus
	Route::delete('/account/{id}', ['as' => 'delete.account' , 'uses' => 'AccountsController@delete']);
	//edit
	Route::put('/account/{id}', ['as' => 'edit.account' , 'uses' => 'AccountsController@']);
	//getlog
	Route::delete('/account/log/{id}', ['as' => 'get.account.log' , 'uses' => 'AccountsController@']);
//cashflow
	//input harian
	Route::post('/cash', ['as' => 'add.cash' , 'uses' => 'CashesController@']);
	//all cashflow
	Route::get('/cash', ['as' => 'get.cash.list' , 'uses' => 'CashesController@']);
	//cashflow harian
	Route::get('/cash/day', ['as' => 'get.cash.day' , 'uses' => 'CashesController@']);
	//check ganti hari
	Route::get('/cash/check', ['as' => 'check.cash' , 'uses' => 'CashesController@']);
//dashboard
	//top 10 barang
	Route::get('/product/top', ['as' => 'get.product.top' , 'uses' => 'ProductsController@']);
	//repeat
	Route::get('/product/repeat', ['as' => 'get.product.repeat' , 'uses' => 'ProductsController@']);
	//top pembeli
	Route::get('/customer/top', ['as' => 'get.customer.top' , 'uses' => 'CustomersController@']);
	//top return
	Route::get('/return/top', ['as' => 'get.return.top' , 'uses' => 'ReturnsController@']);
//restock
	//list restock
	Route::get('/restock', ['as' => 'get.restock.list' , 'uses' => 'RestocksController@']);
	//restock detail
	Route::get('/restock/{id}', ['as' => 'get.restock.detail' , 'uses' => 'RestocksController@']);
	//tambah restock
	Route::post('/restock/out', ['as' => 'add.restock.out' , 'uses' => 'RestocksController@']);
	Route::post('/restock/in', ['as' => 'add.restock.in' , 'uses' => 'RestocksController@']);
	//new barang
	Route::post('/restock/new', ['as' => 'add.restock.new' , 'uses' => 'RestocksController@']);	
//reporting
	//all transaction
	Route::get('/transaction/all', ['as' => 'get.transaction.all.list' , 'uses' => 'TransactionsController@']);
	//jualan 30 hari
	Route::get('/transaction/30', ['as' => 'get.transaction.30.list' , 'uses' => 'TransactionsController@']);
	//jualan range
	Route::get('/transaction/range/{start}/{end}', ['as' => 'get.transaction.range.list' , 'uses' => 'TransactionsController@']);
	//grafik bulanan
	Route::get('/transaction/month', ['as' => 'get.transaction.month.list' , 'uses' => 'TransactionsController@']);
	//grafik tahunan
	Route::get('/transaction/year', ['as' => 'get.transaction.year.list' , 'uses' => 'TransactionsController@']);
//pembeli
	//history belanja
	Route::get('/customer/history/{customer_id}', ['as' => 'get.customer.history' , 'uses' => 'CustomersController@']);
//tax
	//edit tax
	Route::put('/tax', ['as' => 'edit.tax' , 'uses' => 'TaxesController@']);
});


/* routing sementara Domi coba interaction + css + jquery */
Route::group(array('prefix' => 'test'), function()
{

    //Login via Desktop
	Route::get('/mobile', function()
	{
		return View::make('pages.mobile_test.index');
	});

    //Login via Desktop
	Route::get('/login_desktop', function()
	{
		return View::make('pages.login_desktop');
	});

    //Karyawan
	Route::get('/account', function()
	{
		return View::make('pages.account.manage_account');
	});

	//Pesanan
	Route::get('/transaction', function()
	{
		return View::make('pages.transaction.manage_transaction');
	});

	//Stock
	Route::get('/stock', function()
	{
		return View::make('pages.stock.manage_stock');
	});



});

Route::group(array('prefix' => 'fungsi'), function()
{
	Route::get('/get_product_live_search', ['as'=>'david.getProductLiveSearch','uses' => 'ProductDetailsController@search']);
	
	Route::get('/get_customer_live_search', ['as'=>'david.getCustomerLiveSearch','uses' => 'CustomersController@search']);
	
	Route::post('/post_finalize_transaction', ['as'=>'david.postFinalizeTransaction','uses' => 'mobile_view@finalize']);
});




