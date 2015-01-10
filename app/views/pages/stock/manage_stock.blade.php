@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 class="pull-left">
					Daftar Stok Produk
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
				<a href="{{URL::to('test/add_new_stock')}}" class="pull-right btn btn-success" >
					<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Add New Stock
				</a>
			</div>
			<span class="clearfix"></span>
			<hr></hr>

			<div>
				<style>

				td.selected {
					background-color: #fcf5dd;
				}

				thead {
					background-color: #f5f5f5 !important;
				}

				</style>
				<table class="table table-bordered">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" width="110">
								<a href="javascript:void(0)">Produk</a>
									@if($filtered == 0)
										@if($sortBy == 'product_code')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'product_code', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'product_code')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'product_code', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" style="width: 137px;">
								<a href="javascript:void(0)">Foto</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" style="width: 180px;">
								<a href="javascript:void(0)">Nama Produk</a>
									@if($filtered == 0)
										@if($sortBy == 'name')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'name')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Warna</a>
									@if($filtered == 0)
										@if($sortBy == 'color')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'color', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'color')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'color', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Modal</a>
									@if($filtered == 0)
										@if($sortBy == 'modal_price')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'modal_price', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'modal_price', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'modal_price', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'modal_price')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'modal_price', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'modal_price', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'modal_price', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Min.</a>
									@if($filtered == 0)
										@if($sortBy == 'min_price')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'min_price', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'min_price', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'min_price', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'min_price')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'min_price', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'min_price', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'min_price', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Jual</a>
									@if($filtered == 0)
										@if($sortBy == 'sales_price')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'sales_price', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'sales_price', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'sales_price', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'sales_price')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'sales_price', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'sales_price', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'sales_price', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="72">
								<a href="javascript:void(0)">Stok Toko</a>
									@if($filtered == 0)
										@if($sortBy == 'stock_shop')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_shop', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'stock_shop')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_shop', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Stok Gudang</a>
									@if($filtered == 0)
										@if($sortBy == 'stock_storage')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_storage', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'stock_storage')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_storage', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Deleted</a>
									@if($filtered == 0)
										@if($sortBy == 'deleted')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'deleted', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'deleted', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'deleted', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'deleted')
											@if($order == 'asc')
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'deleted', 'order' => 'desc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@else
												<a href="{{action('stockController@viewStock2', array('sortBy' => 'deleted', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
											@endif
										@else
											<a href="{{action('stockController@viewStock2', array('sortBy' => 'deleted', 'order' => 'asc', 'filtered'=>'1','product_code'=>$product_code,'name'=>$name,'color'=>$color,'modal_price'=>$modal_price,'min_price'=>$min_price,'sales_price'=>$sales_price,'stock_shop'=>$stock_shop,'stock_storage'=>$stock_storage,'deleted'=>$deleted))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								Obral
							</th>
						</tr>
						<!--<th class="table-bordered">Print</th>-->
					</thead>
					<thead>
						<tr>
							
							<td><input type="text" class="form-control input-sm" id="filter_product_code"></td>
							<td></td>
							<td><input type="text" class="form-control input-sm" id="filter_name"></td>
							<td><input type="text" class="form-control input-sm" id="filter_color"></td>
							<td><input type="text" class="form-control input-sm" id="filter_modal_price"></td>
							<td><input type="text" class="form-control input-sm" id="filter_min_price"></td>
							<td><input type="text" class="form-control input-sm" id="filter_sales_price"></td>
							<td><input type="text" class="form-control input-sm" id="filter_stock_shop"></td>
							<td><input type="text" class="form-control input-sm" id="filter_stock_storage"></td>
							<td><input type="text" class="form-control input-sm" id="filter_deleted"></td>
							<td width=""><a class="btn btn-primary btn-xs" id="filter_button">Filter</a></td>
							<!--<td></td>-->
							
						</tr>
					</thead>
					<tbody>
						
						@if($datas != null)
							@foreach($datas as $prodList)
							<tr> 
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="f_excel_xlabel f_excel_xlabel_0_{{$prodList->id}}" id="kode_{{$prodList->id}}" style="line-height: 30px;">{{$prodList->product_code}}</span>
									<input type="text" class="f_excel_xinput form-control input-sm hidden f_excel_xinput_0_{{$prodList->id}}" style="" value="{{$prodList->product_code}}"/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<input type="hidden" id="fotoChanged_{{$prodList->id}}" value="0" />
									<img src="{{URL::asset($prodList->photo)}}" id="gambar_{{$prodList->id}}" width="120" height="120">
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="f_excel_xlabel f_cell_nama_produk f_excel_xlabel_1_{{$prodList->id}}" id="name_{{$prodList->id}}" style="line-height: 30px;">{{$prodList->name}}</span>
									<input type="text" class="f_excel_xinput f_cell_nama_produk_input form-control input-sm hidden f_excel_xinput_1_{{$prodList->id}}" style="" value="{{$prodList->name}}"/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									@if($prodList->isSeri == 0)
										<span class="f_excel_xlabel f_excel_xlabel_2_{{$prodList->id}}" id="color_{{$prodList->id}}" style="line-height: 30px;">{{$prodList->color}}</span>
										<input type="text" class="f_excel_xinput form-control input-sm hidden f_excel_xinput_2_{{$prodList->id}}" style="" value="{{$prodList->color}}"/>
									@else
										<span class="" id="color_{{$prodList->id}}" style="line-height: 30px;">{{$prodList->color}}</span>
									@endif
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									@if($prodList->isSeri == 0)
										<span class="f_excel_xlabel f_excel_xlabel_3_{{$prodList->id}}" id="modal_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->modal_price}}">{{$prodList->modal_price}}</span>
										<input type="text" id="f_cell_harga_modal_input" class="ff_num_only f_excel_xinput form-control input-sm hidden f_excel_xinput_3_{{$prodList->id}}" style="" value="{{$prodList->modal_price}}"/>
									@else
										<span class="" id="modal_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->modal_price}}">{{$prodList->modal_price}}</span>
									@endif
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									@if($prodList->isSeri == 0)
										<span class="f_excel_xlabel f_excel_xlabel_3_{{$prodList->id}}" id="modal_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->modal_price}}">{{$prodList->min_price}}</span>
										<input type="text" id="f_cell_harga_modal_input" class="ff_num_only f_excel_xinput form-control input-sm hidden f_excel_xinput_3_{{$prodList->id}}" style="" value="{{$prodList->modal_price}}"/>
									@else
										<span class="" id="modal_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->modal_price}}">{{$prodList->min_price}}</span>
									@endif
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									@if($prodList->isSeri == 0)
										<span class="f_excel_xlabel f_excel_xlabel_3_{{$prodList->id}}" id="modal_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->modal_price}}">{{$prodList->sales_price}}</span>
										<input type="text" id="f_cell_harga_modal_input" class="ff_num_only f_excel_xinput form-control input-sm hidden f_excel_xinput_3_{{$prodList->id}}" style="" value="{{$prodList->modal_price}}"/>
									@else
										<span class="" id="modal_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->modal_price}}">{{$prodList->sales_price}}</span>
									@endif
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									
									@if($prodList->isSeri == 0)
										<span class="f_excel_xlabel f_excel_xlabel_6_{{$prodList->id}}" id="shop_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->stock_shop}}">{{$prodList->stock_shop}}</span>
										<input type="text" id="" class="ff_num_only f_excel_xinput form-control input-sm hidden f_excel_xinput_6_{{$prodList->id}}" style="" value="{{$prodList->stock_shop}}"/>
									@else
										<span class="" id="shop_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->stock_shop}}">{{$prodList->stock_shop}}</span>
									@endif
									
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									@if($prodList->isSeri == 0)
										<span class="f_excel_xlabel f_excel_xlabel_7_{{$prodList->id}}" id="storage_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->stock_storage}}">{{$prodList->stock_storage}}</span>
										<input type="text" id="" class="ff_num_only f_excel_xinput form-control input-sm hidden f_excel_xinput_7_{{$prodList->id}}" style="" value="{{$prodList->stock_storage}}"/>
									@else
										<span class="" id="storage_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->stock_storage}}">{{$prodList->stock_storage}}</span>
									@endif
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									@if($prodList->deleted == 0)
										no
									@else
										yes
									@endif
								</td>
								<td>
									<input type="hidden" value="{{$prodList->idDetail}}" />
									<input type="hidden" value="{{$prodList->id}}" />
									<button class="btn btn-success btn-xs update_row_button" id="update_row_button" data-toggle="" data-target="" style="display: block;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Update Row
									</button>
									<button class="btn btn-danger btn-xs obral-btn" data-toggle="modal" data-target=".pop_up_obral" style="display: block; margin-top: 5px;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Obral
									</button>
									<input type="hidden" value="{{$prodList->idDetail}}" />
									<input type="hidden" value="{{$prodList->id}}" />
									<button class="btn btn-danger btn-xs  hapus_button" data-toggle="" data-target="" style="display: block; margin-top: 5px;margin-bottom: 5px;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Delete
									</button>
									<button class="btn btn-success btn-xs  undelete_button" data-toggle="" data-target="" style="display: block; margin-top: 5px;margin-bottom: 5px;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Undelete
									</button>
									<input type="hidden" value="{{$prodList->id}}" />
									<input accept="image/*" type="file" class="filestyle edit_gambar_button" data-input="false" id="edit_gambar_button_{{$prodList->id}}" style="width: 100px;">
								</td>
							</tr>
							@endforeach
						@endif
								
								<script>
								$( 'body' ).on( "click",'.f_excel_xlabel', function() {
									$(this).siblings('.f_excel_xinput').removeClass('hidden');
									$(this).siblings('.f_excel_xinput').val($(this).text());
									$(this).addClass('hidden');
								});
								
								$( 'body' ).on( "click",'.obral-btn', function() {
									$id= $(this).next().val();
									$('#tableRep').val($id);
								});
								
								$( 'body' ).on( "click",'.hapus_button', function() {
									$id= $(this).prev().val();
									$idDetail = $(this).prev().prev().val();
									$.ajax({
										type: 'PUT',
										url: '{{URL::route('david.delete_prod_det')}}',
										data: {
											'data' : $idDetail,
										},
										success: function(response){
											alert('Delete Berhasil');
											location.reload();
										},error: function(xhr, textStatus, errorThrown){
											alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
											alert("responseText: "+xhr.responseText);
										}
									},'json');
								});
								
								$( 'body' ).on( "change",'.edit_gambar_button', function(evt) {
									var tgt = evt.target || window.event.srcElement,
									files = tgt.files;
									if (FileReader && files && files.length) 
									{
										$id= $(this).prev().val();
										$("#fotoChanged_"+$id).val('1');
										
										var fr = new FileReader();
										fr.onload = function () {
											$('#gambar_'+$id).attr('src',fr.result);
										}
										fr.readAsDataURL(files[0]);
									}
									// Not supported
									else {
										// fallback -- perhaps submit the input to an iframe and temporarily store
										// them on the server until the user's session ends.
									}
									
									
								});
								
								$( 'body' ).on( "click",'.update_row_button', function() {
									$id= $(this).prev().val();
									$idDetail = $(this).prev().prev().val();
									for ( var i = 0; i <= 7; i++ ) 
									{
										$('.f_excel_xinput_'+i+'_'+$id).addClass('hidden');
										$('.f_excel_xlabel_'+i+'_'+$id).removeClass('hidden');
										$('.f_excel_xlabel_'+i+'_'+$id).text($('.f_excel_xinput_'+i+'_'+$id).val());
									}
									$idProduct = $id;
									$idDetail = $idDetail;
									
									$editName = $("span#name_"+$idProduct).text();
									$editColor = $("span#color_"+$idProduct).text();
									$editModal = $("span#modal_"+$idProduct).text();
									$editMin = $("span#min_"+$idProduct).text();
									$editSales = $("span#sales_"+$idProduct).text();
									$editShop = $("span#shop_"+$idProduct).text();
									$editStorage = $("span#storage_"+$idProduct).text();
									$editKode = $("span#kode_"+$idProduct).text();
									$isEditFoto = $("#fotoChanged_"+$idProduct).val();
									$editFoto = '-';
									if($isEditFoto == '1')
									{
										$editFotoPath = $('#edit_gambar_button_'+$idProduct).val();
										var arr = $editFotoPath.split('\\');
										$editFoto = arr[arr.length - 1];
									}
									
									$.ajax({
										type: 'PUT',
										url: '{{URL::route('gentry.edit_stock')}}',
										data: {
											'idProduct' : $idProduct,
											'idDetail' : $idDetail,
											'editName' : $editName,
											'editColor' : $editName,
											'editModal' : $editModal,
											'editMin' : $editMin,
											'editSales' : $editSales,
											'editShop' : $editShop,
											'editStorage' : $editStorage,
											'editKode' : $editKode,
											'editFoto' : $editFoto
										},
										success: function(response){
											alert('Perubahan Berhasil');
											if($isEditFoto == '1')
											{
												$fd = new FormData();
												$fd.append('file', $('#edit_gambar_button_'+$idProduct)[0].files[0]);
												$fd.append('fileName', $editName+"-"+$warna_produk);
												$.ajax({
													url: '{{URL::route('gentry.upload_image')}}',
													type: "POST",             									
													data: $fd,
													contentType: false,       									
													cache: false,             										
													processData:false,        									
													success: function(data)   								
													{
														alert(data);
														
													},error: function(xhr, textStatus, errorThrown){
														alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
														alert("responseText: "+xhr.responseText);
													}
												});
												
											}
											location.reload();
										},error: function(xhr, textStatus, errorThrown){
											alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
											alert("responseText: "+xhr.responseText);
										}
									},'json');
								});

								$('.f_excel_xinput').keypress(function(e) {
									if(e.which == 13) {
										$(this).siblings('.f_excel_xlabel').text($(this).val());
										$(this).siblings('.f_excel_xlabel').removeClass('hidden');
										$(this).addClass('hidden');
										/*
										$idProduct = $(this).prev().prev().prev().val();
										$idDetail = $(this).prev().prev().val();
										
										$editName = $("span#name_"+$idProduct).text();
										$editColor = $("span#color_"+$idProduct).text();
										$editModal = $("span#modal_"+$idProduct).text();
										$editMin = $("span#min_"+$idProduct).text();
										$editSales = $("span#sales_"+$idProduct).text();
										$editShop = $("span#shop_"+$idProduct).text();
										$editStorage = $("span#storage_"+$idProduct).text();
										
										$.ajax({
											type: 'PUT',
											url: '{{URL::route('gentry.edit_stock')}}',
											data: {
												'idProduct' : $idProduct,
												'idDetail' : $idDetail,
												'editName' : $editName,
												'editColor' : $editColor,
												'editModal' : $editModal,
												'editMin' : $editMin,
												'editSales' : $editSales,
												'editShop' : $editShop,
												'editStorage' : $editStorage
											},
											success: function(response){
												alert('Perubahan Berhasil');
											},error: function(xhr, textStatus, errorThrown){
												alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
												alert("responseText: "+xhr.responseText);
											}
										},'json');
										*/
									}
								});

								/*$( 'body' ).on( "click",'#f_cell_harga_modal', function() {
									// 'Getting' data-attributes using getAttribute
									var plant = document.getElementById('f_cell_harga_modal');
									var fruitCount = plant.getAttribute('data-modal'); // fruitCount = '12'

									// 'Setting' data-attributes using setAttribute
									plant.setAttribute('data-modal','7'); // Pesky birds
									$(this).text(plant.getAttribute('data-modal'));
								});*/
							</script>
</tbody>
</table>
</div>
</div>
</div>
</div>

@include('pages.stock.pop_up_add_stock')
@include('pages.stock.pop_up_obral')

<script>
	$('body').on('click','#filter_button',function(){
		$product_code = $('#filter_product_code').val();
		if($product_code == ''){
			$product_code = '-';
		}
		
		$name = $('#filter_name').val();
		if($name == ''){
			$name = '-';
		}
		
		$color = $('#filter_color').val();
		if($color == ''){
			$color = '-';
		}
		
		$modal_price = $('#filter_modal_price').val();
		if($modal_price == ''){
			$modal_price = '-';
		}
		
		$min_price = $('#filter_min_price').val();
		if($min_price == ''){
			$min_price = '-';
		}
		
		$sales_price = $('#filter_sales_price').val();
		if($sales_price == ''){
			$sales_price = '-';
		}
		
		$stock_shop = $('#filter_stock_shop').val();
		if($stock_shop == ''){
			$stock_shop = '-';
		}
		
		$stock_storage = $('#filter_stock_storage').val();
		if($stock_storage == ''){
			$stock_storage = '-';
		}
		
		$deleted = $('#filter_deleted').val();
		if($deleted == 'yes'){
			$deleted = 1;
		}else if($deleted == 'no'){
			$deleted = 0;
		}else{
			$deleted = '-';
		}
		
		window.location = "{{URL::route('gentry.view_stock')}}" + "?filtered=1&product_code="+$product_code+"&name="+$name+"&color="+$color+"&modal_price="+$modal_price+"&min_price="+$min_price+"&sales_price="+$sales_price+"&stock_shop="+$stock_shop+"&stock_storage="+$stock_storage+"&deleted="+$deleted;
	});
</script>

<script>

	/*$('body').on('click','.flogin',function(){
		$data = {
			'status' : '202',
			'text' : "Hello World!"
		}
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			url: '../test_login',
			type: 'POST',
			data: {
				'json_data':json_data
			},
			success: function (res) {
				alert(res)
			},
			error: function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
			}
		},'json');	
});*/

var index = 0;
//38 up, 40down

var maxCellIndex = $('.table tr td').length;

$(document).keydown(function(e) {
	$('.table tr td:eq(' + index + ')').removeClass('selected');

	var rows = $('.table tr').length;
	var columns = $('.table tr:eq(1) td').length;

    if (e.keyCode === 39) { //move right or wrap
    	while( !$('.table tr td:eq(' + (++index) + ')') ) {
    		if (index >= maxCellIndex) {
                // wrap both ways:
                index = -1;
            }
        }
    }
    if (e.keyCode === 37) { // move left or wrap
    	--index;
    	if (index < 0) {
    		index = maxCellIndex;
    	}
    	while( !$('.table tr td:eq(' + (index) + ')') ) {
    		if (index < 0) {
                // wrap both ways:
                index = maxCellIndex;
            } else {
            	--index;
            }
        }
    }
    
    if (e.keyCode === 38) {  // move up
    	index -= columns;
    	if (index < 0) {
    		index += maxCellIndex;
    	}
    	while( !$('.table tr td:eq(' + (index) + ')') ) {
    		if (index < 0) {
                // wrap both ways:
                index += maxCellIndex;
            } else {
            	index -= columns;
            }
        }
    }
    if (e.keyCode === 40) { // move down
    	index += columns;
    	if (index >= maxCellIndex) {
    		index -= maxCellIndex;
    	}
    	while( !$('.table tr td:eq(' + (index) + ')') ) {
    		if (index >= maxCellIndex) {
                // wrap both ways:
                index -= maxCellIndex;
            } else {
            	index += columns;
            }


        }
    }
    $('.table tr td:eq(' + index + ')').addClass('selected');
    if($('.table tr td:eq(' + index + ')').children('.f_excel_xinput').hasClass('hidden') && e.which == 13) {
    	var f_excel_xlabel_text = $('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').text();
    	$('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').siblings('.f_excel_xinput').removeClass('hidden');
    	$('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').siblings('.f_excel_xinput').val(f_excel_xlabel_text);
    	$('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').addClass('hidden');
	}/*else if($('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').hasClass('hidden')){
		var f_excel_xinput_text = $('.table tr td:eq(' + index + ')').children('.f_excel_xinput').val();
		$('.table tr td:eq(' + index + ')').children('.f_excel_xinput').siblings('.f_excel_xlabel').text(f_excel_xinput_text);
		$('.table tr td:eq(' + index + ')').children('.f_excel_xinput').siblings('.f_excel_xlabel').removeClass('hidden');
		$('.table tr td:eq(' + index + ')').children('.f_excel_xinput').addClass('hidden');
	}*/
});


$(":file").filestyle(
	{input: false}
);


$(".bootstrap-filestyle").find('label').addClass('btn-xs').addClass('btn-info').text('');
$(".bootstrap-filestyle").find('label').append('<span class="glyphicon glyphicon-folder-open" style="margin-right: 5px;"></span>Ubar Gambar');


$(document).keydown(function(e) {
    var n = 128;  //Enter the amount of px you want to scroll here
    if (e.which == 38 && document.activeElement == document.body) {
        e.preventDefault();
        document.body.scrollTop -= n;
    }
    if (e.which == 40 && document.activeElement == document.body) {
        e.preventDefault();
        document.body.scrollTop += n;
    }
});

</script>
@stop
