<?php
use Carbon\Carbon;

	//Route::get('/qwertyuiop', 'CashesController@getTodayInpuCash');

	Route::get('/tes', function()
	{
		$ids = Order::select(DB::raw('orders.id as id'))->join('transactions','orders.transaction_id','=','transactions.id')->where('transactions.status','=','Paid')->where(DB::raw('DAY(orders.created_at)'),'=',$i)->whereRaw('YEAR(orders.created_at) = YEAR(curdate())')->where(DB::raw('MONTH(orders.created_at)'),'=',3)->get();
		foreach($ids as $id)
		{
			echo $id->id;
		}
	});
	Route::get('/tes2', function()
	{
		$tempColor = explode('-',"10*abc-10*deg");
		$counter = count($tempColor);
		$realColor = "";
		for($x = 0 ; $x<$counter ; $x++)
		{
			$iterColor = explode('*',$tempColor[$x]);
			$realColor .= $iterColor[1]."-";
			echo $iterColor[1];
		}
		echo strlen($realColor);
		echo $realColor = substr($realColor,0,strlen($realColor)-1);
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
	//Route::post('returnProduct', 'returnController@returnProduct');
	
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

if ((Agent::isMobile() == true) || (Agent::isTablet() == true)) { 

	Route::get('/login_mobile', ['as' => 'login.mobile', 'uses' => 'AccountsController@viewMobileLogin','before'=>'' ]);
	Route::get('/', ['as' => 'login.mobile', 'uses' => 'AccountsController@viewMobileLogin','before'=>'' ]);

} else if((Agent::isMobile() == false) && (Agent::isTablet() == false)) {
	
	Route::get('/login_mobile', ['as' => 'login.mobile', 'uses' => 'AccountsController@viewMobileLogin','before'=>'' ]);
	Route::get('/login', ['as' => 'login.desktop', 'uses' => 'AccountsController@viewDesktopLogin','before'=>'checkLogin']);
	Route::get('/', ['as' => 'login.desktop', 'uses' => 'AccountsController@viewDesktopLogin','before'=>'checkLogin']);
} 

//home + login 

Route::post('/logout', ['as' => 'logout', 'uses' => 'AccountController@']);

//sales    
Route::group(['prefix' => 'sales','before' => 'authSales'], function()
{
//mobile
	Route::get('/mobile',['as'=>'mobile_site','uses' => 'mobile_view@viewMobileSite']);
//pesanan
	Route::get('/view_transaction', ['as'=>'david.view_transaction','uses' => 'transController@view_transaction']);
	
	//Route::get('/view_all_transaction', ['as'=>'david.view_all_transaction','uses' => 'transController@view_all_transaction']);
	
	Route::get('/view_all_transaction', ['as'=>'david.view_all_transaction','uses' => 'transController@view_all_transaction2']);
	/*
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
	Route::delete('/transaction/{id}', ['as' => 'delete.transaction' , 'uses' => 'TransactionsController@delete']);*/
});

//manager
Route::group(['prefix' => 'mgr','before' => 'authMgr'], function()
{
//return
	Route::get('/view_return', ['as'=>'gentry.view_return','uses' => 'returnController@view_return']);
//stock
	Route::get('/view_stock', ['as'=>'gentry.view_stock','uses' => 'stockController@viewStock2']);
//obral
	ROute::get('/view_obral', ['as'=>'david.view_obral','uses' => 'obralViewController@viewObral']);
/*
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
*/
});

//owner
Route::group(['prefix' => 'owner','before' => 'authOwner'], function()
{
//dashboard
	Route::get('/view_dashboard', ['as'=>'david.view_dashboard','uses' => 'dashboardController@viewDashboard']);
//cashflow
	Route::get('/view_cashflow', ['as'=>'david.view_cashflow','uses' => 'cashController@view_laporan_cash']);
//customer
	Route::get('/view_customer', ['as'=>'gentry.view_customer','uses' => 'custController@view_customer']);
//account
	Route::get('/view_account', ['as'=>'david.viewAccount','uses' => 'accountController@viewAccount']);
//log
	Route::get('/manage_log', ['as'=>'gentry.manage_log','uses' => 'accountController@manageLog']);
//tax
	Route::get('/view_tax', ['as'=>'gentry.view_tax','uses' => 'taxController@viewTax']);
//restock
	Route::get('/view_restock_history', ['as'=>'david.view_restock_history','uses' => 'historyRestockController@viewHistoryRestock']);
//add new stock
	Route::get('/view_add_new_stock', ['as'=>'david.view_add_new_stock','uses' => 'stockController@viewAddStock']);
//keuntungan
	Route::get('/view_keuntungan', ['as'=>'david.view_keuntungan','uses' => 'keuntunganController@viewDashboard']);
	Route::get('/view_keuntungan_harian', ['as'=>'david.view_keuntungan_harian','uses' => 'keuntunganController@viewKeuntunganHarian']);
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
	Route::delete('/account/{id}', ['as' => '.account' , 'uses' => 'AccountsController@delete']);
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

Route::group(array('prefix' => 'warning'), function()
{
	//forbidden

	Route::get('/forbid', function()
	{
		return View::make('pages.forbid');
	});

	//logged in

	Route::get('/already_login', function()
	{
		return View::make('pages.already_login');
	});
});

/* routing sementara Domi coba interaction + css + jquery byaxugan */
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
	//Tax
	Route::get('/tax', function()
	{
		return View::make('pages.tax.manage_tax');
	});
	//Return
	Route::get('/return', function()
	{
		return View::make('pages.return.manage_return');
	});
	//Search Return
	Route::get('/search_return', function()
	{
		return View::make('pages.return.search_return');
	});

	//Dashboard
	Route::get('/dashboard', function()
	{
		return View::make('pages.dashboard.manage_dashboard');
	});

	//Pelanggan
	Route::get('/customer', function()
	{
		return View::make('pages.customer.manage_customer');
	});
	//Pelanggan
	Route::get('/customer/transaction_history', function()
	{
		return View::make('pages.customer.customer_history');
	});
	//Restock
	Route::get('/restock', function()
	{
		return View::make('pages.restock.manage_restock');
	});
	//Restock
	Route::get('/add_new_stock', function()
	{
		return View::make('pages.restock.add_new_stock');
	});

	//Restock
	Route::get('/jual_login', function()
	{
		return View::make('pages.mobile_test.login');
	});
	//manage_laporan_cash
	Route::get('/manage_laporan_cash', function()
	{
		return View::make('pages.laporan_cash.manage_laporan_cash');
	});

	Route::get('/manage_laporan_transaksi', function()
	{
		return View::make('pages.laporan_transaction.manage_laporan_transaction');
	});

	Route::get('/manage_log', function()
	{
		return View::make('pages.account.manage_log');
	});
	Route::get('/print_toko', function()
	{
		return View::make('pages.print_struk.print_toko');
	});
	Route::get('/print_konsumen', function()
	{
		return View::make('pages.print_struk.print_konsumen');
	});


	//obral
	Route::get('/obral', function()
	{
		return View::make('pages.obral.manage_obral');
	});


	//laporan_cash
	Route::get('/laporan_cashflow', function()
	{
		return View::make('pages.laporan_cash.manage_laporan_cash');
	});


	//login mobile
	Route::get('/login_jualan', function()
	{
		return View::make('pages.mobile_test.login');
	});

	//forbidden

	Route::get('/forbid', function()
	{
		return View::make('pages.forbid');
	});

	//forbidden

	Route::get('/already_login', function()
	{
		return View::make('pages.already_login');
	});
	//restock_histoy

	Route::get('/history_restock', function()
	{
		return View::make('pages.restock.history_restock');
	});

	Route::get('/view_keuntungan_bulanan', function()
	{
		return View::make('pages.laporan_keuntungan.manage_keuntungan_bulanan');
	});

	Route::get('/view_keuntungan_harian', function()
	{
		return View::make('pages.laporan_keuntungan.manage_keuntungan_harian');
	});

});

Route::group(array('prefix' => 'fungsi'), function()
{
	Route::get('/get_product_live_search', ['as'=>'david.getProductLiveSearch','uses' => 'ProductDetailsController@search']);
	
	Route::get('/get_product_by_reference', ['as'=>'david.getProductByReference','uses' => 'ProductDetailsController@getProductByReference']);
	
	Route::get('/get_customer_live_search', ['as'=>'david.getCustomerLiveSearch','uses' => 'CustomersController@search']);
	
	Route::post('/post_finalize_transaction', ['as'=>'david.postFinalizeTransaction','uses' => 'mobile_view@finalize']);
	
	Route::get('/view_account', ['as'=>'david.viewAccount','uses' => 'accountController@viewAccount']);
	
	Route::put('/edit_account_active', ['as'=>'david.edit_account_active','uses' => 'accountController@changeActive']);
	
	Route::put('/edit_account', ['as'=>'david.edit_account','uses' => 'AccountsController@editAccount']);
	
	Route::put('/add_account', ['as'=>'david.add_account','uses' => 'AccountsController@addAccount']);
	
	//Route::get('/view_transaction', ['as'=>'david.view_transaction','uses' => 'transController@view_transaction']);
	
	//Route::get('/view_all_transaction', ['as'=>'david.view_all_transaction','uses' => 'transController@view_all_transaction']);
	
	//Route::get('/view_all_transaction', ['as'=>'david.view_all_transaction','uses' => 'transController@view_all_transaction2']);
	
	Route::get('/get_order_by_trans_id', ['as'=>'david.get_order_by_trans_id','uses' => 'transController@getOrderByTransactionId']);
	
	Route::get('/get_tax', ['as'=>'david.get_tax','uses' => 'taxController@getTransTax']);
	
	//Route::get('/view_tax', ['as'=>'gentry.view_tax','uses' => 'taxController@viewTax']);
	
	Route::put('/edit_tax', ['as'=>'gentry.edit_tax','uses' => 'taxController@setTax']);
	
	//Route::get('/view_stock', ['as'=>'gentry.view_stock','uses' => 'stockController@viewStock2']);
	
	Route::put('/edit_stock', ['as'=>'gentry.edit_stock','uses' => 'stockController@editStock']);
	
	//Route::get('/view_customer', ['as'=>'gentry.view_customer','uses' => 'custController@view_customer']);
	
	Route::get('/view_cust_trans', ['as'=>'gentry.view_cust_trans','uses' => 'custController@view_history']);
	
	//Route::get('/view_return', ['as'=>'gentry.view_return','uses' => 'returnController@view_return']);
	
	Route::get('/search_return', ['as'=>'gentry.search_return','uses' => 'returnController@search_product_return']);
	
	Route::get('/search_return2', ['as'=>'gentry.search_return2','uses' => 'returnController@search_product_return2']);
	
	Route::put('/insert_return', ['as'=>'gentry.insert_return','uses' => 'returnController@returnProduct']);
	
	//Route::put('/put_search_return', ['as'=>'gentry.put_search_return','uses' => 'returnController@search_product_return']);
	
	Route::put('/add_new_stock1', ['as'=>'gentry.add_new_stock1','uses' => 'restockController@addNewProductView2']);
	
	Route::put('/add_new_seri', ['as'=>'gentry.add_new_seri','uses' => 'restockController@addNewSeri']);
	
	Route::post('/upload_image', ['as'=>'gentry.upload_image','uses' => 'restockController@uploadImage']);
	
	Route::post('/upload_image_v2', ['as'=>'gentry.upload_image_v2','uses' => 'restockController@uploadArrayImage']);
	
	Route::post('/upload_image_v3', ['as'=>'gentry.upload_image_v3','uses' => 'restockController@uploadImageV3']);
	
	//Route::get('/manage_log', ['as'=>'gentry.manage_log','uses' => 'accountController@manageLog']);
	
	Route::put('/delete_product_detail', ['as'=>'david.delete_prod_det','uses' => 'stockController@deleteProduct']);
	
	Route::put('/undelete_product_detail', ['as'=>'david.undelete_prod_det','uses' => 'stockController@unDeleteProduct']);
	
	Route::get('/view_print_toko', ['as'=>'david.view_print_toko','uses' => 'printController@view_print_toko']);
	
	Route::get('/view_print_konsumen', ['as'=>'david.view_print_konsumen','uses' => 'printController@view_print_konsumen']);
	
	Route::get('/view_print_return', ['as'=>'gentry.view_print_konsumen','uses' => 'printController@view_print_return']);
	
	//Route::get('/view_dashboard', ['as'=>'david.view_dashboard','uses' => 'dashboardController@viewDashboard']);
	
	Route::put('/save_transaction', ['as'=>'david.save_transaction','uses' => 'transController@updateTransaction']);
	
	Route::put('/update_order', ['as'=>'david.update_order','uses' => 'transController@updateOrder']);
	
	Route::put('/update_stock', ['as'=>'david.update_stock','uses' => 'transController@updateStock']);
	
	Route::put('/update_solution_return', ['as'=>'david.update_solution_return','uses' => 'returnController@updateSolution']);
	
	//Route::get('/view_cashflow', ['as'=>'david.view_cashflow','uses' => 'cashController@view_laporan_cash']);
	
	Route::put('/make_void', ['as'=>'david.make_void','uses' => 'transController@makeVoid']);
	
	Route::put('/add_obral', ['as'=>'david.add_obral','uses' => 'stockController@makeObral']);
	
	Route::get('/add_opening_cash', ['as'=>'david.add_opening_cash','uses' => 'dashboardController@addOpeningCash']);
	
	Route::get('/range_date', ['as'=>'gentry.range_date','uses' => 'transController@filterByDateRange']);
	
	Route::post('/post_sign_in', ['as'=>'david.post_sign_in','uses' => 'AccountsController@postSignIn']);
	
	Route::post('/post_sign_out', ['as'=>'david.post_sign_out','uses' => 'AccountsController@postLogOut']);
	
	Route::get('/get_order_by_order_id', ['as'=>'gentry.get_order_by_order_id','uses' => 'returnController@getOrderByOrderId']);
	
});




