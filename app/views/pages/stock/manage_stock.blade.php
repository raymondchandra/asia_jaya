@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<?php

			
		function toMoney($val,$symbol='Rp ',$r=0)
		{
			$n = $val;
			$sign = ($n < 0) ? '-' : '';
			$i = number_format(abs($n),$r,",",".");

			return  $symbol.$sign.$i;
		}
	?>
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 class="pull-left">
					Daftar Stok Produk
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
				<a href="{{action('david.view_add_new_stock')}}" class="pull-right btn btn-success" >
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
				<table class="table table-bordered" style="margin-bottom: 0px;">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" width="34"> 
							</th>
							<th class="table-bordered" width="98">
								<a href="javascript:void(0)">Kode Produk</a>
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
							<th class="table-bordered" width="95">
								<a href="javascript:void(0)">Foto</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="121">
								<a href="javascript:void(0)">Merek Produk</a>
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
							<th class="table-bordered" width="118">
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
							@if(Auth::user()->role == 1)
							<th class="table-bordered" width="120" >
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
							@endif
							<th class="table-bordered" width="119" >
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
							<th class="table-bordered" width="132">
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
							<th class="table-bordered" width="140" >
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
							<th class="table-bordered" width="122">
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
							<th class="table-bordered" width="106">
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
							<th class="table-bordered" width="124">
								Command
							</th>
						</tr>
						<!--<th class="table-bordered">Print</th>-->
					</thead>
					<thead>
						<tr>
							
							<td></td>
							<td><input type="text" class="form-control input-sm" id="filter_product_code"></td>
							<td></td>
							<td><input type="text" class="form-control input-sm" id="filter_name"></td>
							<td><input type="text" class="form-control input-sm" id="filter_color"></td>
							@if(Auth::user()->role == 1)
							<td><input type="text" class="form-control input-sm" id="filter_modal_price"></td>
							@endif
							<td><input type="text" class="form-control input-sm" id="filter_min_price"></td>
							<td><input type="text" class="form-control input-sm" id="filter_sales_price"></td>
							<td><input type="text" class="form-control input-sm" id="filter_stock_shop"></td>
							<td><input type="text" class="form-control input-sm" id="filter_stock_storage"></td>
							<td> 
								<select class="form-control input-sm" id="filter_deleted" style="padding-right: 0px;">
									<option value="">Pilih</option>
									<option value="yes">Ya</option>
									<option value="no">Tidak</option>
								</select>
							</td>
							<td width=""><a class="btn btn-primary btn-xs" id="filter_button">Filter</a></td>
							<!--<td></td>-->
							
						</tr>
					</thead>
				</table>
				<div id="example1"> </div>
				<script>
				var data = [
				<?php $_i = 100; $sidebar_i = 1; ?>
				@if($datas != null)
				@foreach($datas as $prodList)
				{
					prod_id: "{{$prodList->id}}",
					prod_detail_id: "{{$prodList->idDetail}}",
					sidebar: "{{ $sidebar_i }}",
					kode_barang: "{{$prodList->product_code}}", 
					foto: "{{URL::asset($prodList->photo)}}",
					merek_barang: "{{$prodList->name}}",
					warna: "{{$prodList->color}}",
					@if(Auth::user()->role == 1)
					harga_modal: "{{ $prodList->modal_price }}",
					@endif
					harga_min: "{{ $prodList->min_price }}",
					harga_jual: "{{ $prodList->sales_price }}",
					stok_toko: "{{$prodList->stock_shop}}",
					stok_gudang: "{{$prodList->stock_storage}}",
					@if($prodList->deleted == 0)
						deleted: "Tidak",
					@else
						deleted: "Ya",
					@endif
					command: ''
							+ '<button class="btn btn-danger btn-xs obral-btn" data-toggle="modal" data-target=".pop_up_obral" style="display: inline-block; margin-top: 5px;">'
							+ '	<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Obral'
							+ '</button><input type="hidden" value="{{$prodList->idDetail}}" /><span class="clearfix"></span>'
							+ '<input type="hidden" value="{{$prodList->idDetail}}" />'
							+ '<input type="hidden" value="{{$prodList->id}}" />'
							+ '<button class="btn btn-danger btn-xs  hapus_button" data-toggle="" data-target="" style="display: inline-block; margin-top: 5px;margin-bottom: 5px;">'
							+ '	<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Delete'
							+ '</button>'
							+ '<input type="hidden" value="{{$prodList->idDetail}}" />'
							+ '<input type="hidden" value="{{$prodList->id}}" />'
							+ '<button class="btn btn-success btn-xs  undelete_button" data-toggle="" data-target="" style="display: inline-block; margin-top: 5px;margin-bottom: 5px;">'
							+ '	<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Undelete'
							+ '</button>'
							+ '<input type="hidden" value="{{$prodList->id}}" />'
							+ '<input accept="image/*" type="file" class="edit_gambar_button" data-input="false" id="edit_gambar_button_{{$prodList->id}}" style="width: 94px;">'
							+ ''
				},

				<?php $_i++; $sidebar_i++; ?>
				@endforeach
				@endif

				];

				function strip_tags(input, allowed) {
				  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
				  allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
				  var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
				  commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
				  return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
				  	return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
				  });
				};

				var safeHtmlRenderer = function (instance, td, row, col, prop, value, cellProperties) {
					var escaped = Handsontable.helper.stringify(value);
				  escaped = strip_tags(escaped, '<em><b><strong><a><big>'); //be sure you only allow certain HTML tags to avoid XSS threats (you should also remove unwanted HTML attributes)
				  td.innerHTML = escaped;
				  return td;
				};

				 var coverRenderer = function (instance, td, row, col, prop, value, cellProperties) {
				    var escaped = Handsontable.helper.stringify(value);
				    if (escaped.indexOf('http') === 0) {
				      var img = document.createElement('IMG');
				      img.src = value;
				      img.width = 80;
				      img.height = 80;

				      Handsontable.Dom.addEvent(img, 'mousedown', function (e){
				        e.preventDefault();//prevent selection quirk
				      });

				      Handsontable.Dom.empty(td);
				      td.appendChild(img);

				    }
				    else {
				      Handsontable.renderers.TextRenderer.apply(this, arguments); //render as text
				    }
				    return td;
				  };

				 // var container = document.getElementById("example1");

				 //  var hot1 = new Handsontable(container, {
				 	var first = true;

				  $("#example1").handsontable({				  	
				    data: data,
				    enterMoves: {row: 0, col: 0},
				    colWidths: [10, 10, 71, 113, 110, 112, 111, 123, 131, 114, 99,114, 92, 129],
				    //colHeaders: ["prod_id", "prod_det_id", "No.","Kode Barang", "Foto","Merek Barang", "Warna", 
				    @if(Auth::user()->role == 1) 
				    //"Harga Modal", 
				    @endif
				    //"Harga Min.","Harga Jual", "Stok Toko", "Stok Gudang", "Deleted",""],
				    columns: [
					    {data: "prod_id", renderer: "html"},
					    {data: "prod_detail_id", renderer: "html"},
					    {data: "sidebar", renderer: "html"},
					    {data: "kode_barang", renderer: "html"},
					    {data: "foto", renderer: coverRenderer},
					    {data: "merek_barang", renderer: "html"},
					    {data: "warna", renderer: "html"},
					    @if(Auth::user()->role == 1) 
					    {data: "harga_modal", renderer: "html"},
					    @endif
					    {data: "harga_min", renderer: "html"},
					    {data: "harga_jual", renderer: "html"},
					    {data: "stok_toko", renderer: "html"},
					    {data: "stok_gudang", renderer: "html"},
					    {data: "deleted", renderer: "html"},
					    {data: "command", renderer: "html"}
					    ],
					      cells : function(row, col, prop) {
					      	var cellProperties = {};

					      	if (col == 0 || col == 1 || col == 2 || col == 4 || col == 12 || col == 13) {
					      		cellProperties.readOnly = true;
					      	}
					      	else
					      	{
					      		cellProperties.readOnly = false;
					      	}

					      	return cellProperties;
					      },
					      afterChange: function(changes, source) { 							

							if(source == 'edit')
							{								
								var ht = $('#example1').handsontable('getInstance');
								var coordinate = ht.getSelected();
								var count = $("#example1").handsontable('countRows');
								var colAffected = coordinate[1];
								var datas = ht.getDataAtCell(1,1);
								
								
								//alert(colAffected);

								var rowArr 			= ht.getDataAtRow(coordinate[0]);								

								var prod_id 		= rowArr[0];
								var prod_detail_id 	= rowArr[1];
								var sidebar 		= rowArr[2];
								var kode_barang  	= rowArr[3];
								var foto  			= rowArr[4];
								var merek_barang  	= rowArr[5];
								var warna  			= rowArr[6];								
								@if(Auth::user()->role == 2)
									var harga_modal 	= "-";
									var harga_min  		= rowArr[7];
									var harga_jual  	= rowArr[8];
									var stok_toko  		= rowArr[9];
									var stok_gudang  	= rowArr[10];
									var deleted  		= rowArr[11];
									var command  		= rowArr[12];
								@else
									var harga_modal  	= rowArr[7];
									var harga_min  		= rowArr[8];
									var harga_jual  	= rowArr[9];
									var stok_toko  		= rowArr[10];
									var stok_gudang  	= rowArr[11];
									var deleted  		= rowArr[12];
									var command  		= rowArr[13];
								@endif
								
								
								@if(Auth::user()->role == 2)
									//alert(changes);
									if(changes[0][1] == 'stok_gudang')
									{
										if(changes[0][3] == changes[0][2])
										{
										
										}
										else if(changes[0][3] < changes[0][2])
										{
											var diff = parseInt(changes[0][2])-parseInt(changes[0][3]);
											//stok_toko += diff; //semua baris yang kaya ini bakal kenanya string!! bukan int !!
											stok_toko = parseInt(stok_toko) + parseInt(diff);
											$('#example1').handsontable('setDataAtCell', changes[0][0], 9, stok_toko,"alter");
										}
										else
										{
											var diff = parseInt(changes[0][3])-parseInt(changes[0][2]);											
											if( (parseInt(stok_toko)-parseInt(diff)) < 0)
											{
												$('#example1').handsontable('setDataAtCell', changes[0][0], 10, changes[0][2],"alter");
												return;
											}
											else
											{
												//stok_toko -= diff;
												stok_toko = parseInt(stok_toko) - parseInt(diff);
												$('#example1').handsontable('setDataAtCell', changes[0][0], 9, stok_toko,"alter");
												
											}
										}
									}
									else if(changes[0][1] == 'stok_toko')
									{
										if(changes[0][3] == changes[0][2])
										{
										
										}
										else if(changes[0][3] < changes[0][2])
										{
											//alert("changes 0 2 "+parseInt(changes[0][2])); //nilai awal
											//alert("changes 0 3"+parseInt(changes[0][3])); //nilai edit
											var diff = parseInt(changes[0][2])-parseInt(changes[0][3]);
											//alert(diff);
											//stok_gudang += parseInt(diff);
											stok_gudang = parseInt(stok_gudang) + parseInt(diff);
											$('#example1').handsontable('setDataAtCell', changes[0][0], 10, stok_gudang,"alter");
										}
										else
										{
											var diff = parseInt(changes[0][3])-parseInt(changes[0][2]);
											if( (parseInt(stok_gudang)-parseInt(diff)) < 0)
											{
												//alert("gudang minus");
												$('#example1').handsontable('setDataAtCell', changes[0][0], 9, changes[0][2],"alter");
												return;
											}
											else
											{
												//stok_gudang -= diff;
												stok_gudang = parseInt(stok_gudang) - parseInt(diff);
												$('#example1').handsontable('setDataAtCell', changes[0][0], 10, stok_gudang,"alter");												
											}
										}
									}
								@else

								@endif
								//ajax disini;
									
								//show loader
								$('.f_loader_container').removeClass('hidden');

								$.ajax({
									type: 'PUT',
									url: '{{URL::route('gentry.edit_stock')}}',
									data: {
										'idProduct' : prod_id,
										'idDetail' : prod_detail_id,
										'editName' : merek_barang,
										'editColor' : warna,
										'editModal' : harga_modal,
										'editMin' : harga_min,
										'editSales' : harga_jual,
										'editShop' : stok_toko,
										'editStorage' : stok_gudang,
										'editKode' : kode_barang,
										'editFoto' : "-"
									},
									success: function(response){										
										
									},error: function(xhr, textStatus, errorThrown){
										alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
										alert("responseText: "+xhr.responseText);
										//remove loader
										$('.f_loader_container').addClass('hidden');
									}
								},'json');
								

								// if(!first)
								// {
								// 	return ;
								// }
								var check = 0;
								var before = 0;
								for(var i=0 ; i<count ; i++)
								{
									before = check;
									if(ht.getDataAtCell(i,0) == prod_id)
									{		
										check = check + 1;								
										@if(Auth::user()->role == 2)
											$('#example1').handsontable('setDataAtCell', i, 3, kode_barang,"alter");
											$('#example1').handsontable('setDataAtCell', i, 5, merek_barang,"alter");
											$('#example1').handsontable('setDataAtCell', i, 7, harga_min,"alter");
											$('#example1').handsontable('setDataAtCell', i, 8, harga_jual,"alter");
										@else
											$('#example1').handsontable('setDataAtCell', i, 3, kode_barang,"alter");
											$('#example1').handsontable('setDataAtCell', i, 5, merek_barang,"alter");
											$('#example1').handsontable('setDataAtCell', i, 7, harga_modal,"alter");
											$('#example1').handsontable('setDataAtCell', i, 8, harga_min,"alter");
											$('#example1').handsontable('setDataAtCell', i, 9, harga_jual,"alter");
										@endif										
									}
									if(check != 0 && before == check)
									{
										//remove loader
										$('.f_loader_container').addClass('hidden');
										return;
									}

								}
								// first = false;
								// return ;
									
							}
							
							 
							//$('#example1').handsontable('setDataAtCell', 5, 5, "New Value");
							
							//alert("Col: " + colAffected +", Prod. ID: "+ prod_id + ", Prod. Detail ID: " + prod_detail_id + " " + count + " " + datas);


					      }
					  });
					   


				      	 

			//Return index of the currently selected cells as an array [startRow, startCol, endRow, endCol]
			

			//'alert' the index of the starting row of the selection 
							
				</script>
				<style>
				.handsontableInput {
					padding: 8px !important;
				}
				.handsontable {
					width: 100% !important;
				}

				.htCore {
					width: 100% !important;
					table-layout: auto !important;
				}

				.htCore tr th:nth-child(1), 
				.htCore tr th:nth-child(2),
				.htCore tr td:nth-child(1),
				.htCore tr td:nth-child(2)
				{
					display: none;
				}

				.htCore tr td:nth-child(3),.htCore tr th:nth-child(3) {
					border-left: 1px solid #CCC;
				}
				.htCore tr td:nth-child(4) {
					width: 98px !important;
					text-align: center;
				}

				.ht_clone_top { display: none !important; }
				</style>
			<span class="clearfix"></span>
				<table class="table table-bordered">
					
					<tbody>
						
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
								
								$( 'body' ).on( "click",'.undelete_button', function() {
									$id= $(this).prev().val();
									$idDetail = $(this).prev().prev().val();
									$.ajax({
										type: 'PUT',
										url: '{{URL::route('david.undelete_prod_det')}}',
										data: {
											'data' : $idDetail,
										},
										success: function(response){
											alert('Pembatalan Penghapusan Berhasil');
											location.reload();
										},error: function(xhr, textStatus, errorThrown){
											alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
											alert("responseText: "+xhr.responseText);
										}
									},'json');
								});
								
								$( 'body' ).on( "change",'.edit_gambar_button', function(evt) {
									
									$id= $(this).prev().val();

									$fd = new FormData();
									$fd.append('file', $('#edit_gambar_button_'+$id)[0].files[0]);
									$fd.append('id', $id);
									$.ajax({
										url: '{{URL::route('gentry.upload_image_v3')}}',
										type: "POST",             									
										data: $fd,
										contentType: false,       									
										cache: false,             										
										processData:false,        									
										success: function(data)   								
										{
											alert(data);
											location.reload();
											
										},error: function(xhr, textStatus, errorThrown){
											alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
											alert("responseText: "+xhr.responseText);
										}
									});
									
									
								});
								
								$( 'body' ).on( "click",'.update_row_button', function() {
									$id= $(this).prev().val();
									$idDetail = $(this).prev().prev().val();
									
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
											'editColor' : $editColor,
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
											if(response == 0)
											{
												alert("You dont have access to add stock from outside");
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
									@if(Auth::user()->role == 2)
										$modal_price = "-";
									@else
										$modal_price = $('#filter_modal_price').val();
										if($modal_price == ''){
											$modal_price = '-';
										}
									@endif
									
									
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
<style>



/*
.htCore tr td:nth-child(3){
	width: 34px!important;
}
.htCore tr td:nth-child(4){
	width: 98px!important;
}
.htCore tr td:nth-child(5){
	width: 95px!important;
}
.htCore tr td:nth-child(6){
	width: 121px!important;
}
.htCore tr td:nth-child(7){
	width: 118px!important;
}
.htCore tr td:nth-child(8){
	width: 120px!important;
}
.htCore tr td:nth-child(9){
	width: 119px!important;
}
.htCore tr td:nth-child(10){
	width: 132px
}
.htCore tr td:nth-child(11){
	width: 140px!important;
}
.htCore tr td:nth-child(12){
	width: 122px!important;
}
.htCore tr td:nth-child(13){
	width: 106px!important;
}
.htCore tr td:nth-child(14){
	width: 124px!important;
}*/
</style>
@stop
