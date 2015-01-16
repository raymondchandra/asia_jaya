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
				<div class="g-lg-2">

					<h3 style="">
						Kelola Retur 
					</h3>
				</div>
				<div class="g-lg-8" style="margin-top: 14px;">
					<div class="g-md-3" style="text-align: right; line-height: 34px;">
						Range tanggal
					</div>
					<div class="input-daterange g-md-6">
						<div class="g-md-4">
							<input value="{{$start_date}}" class="f_date_0 form-control" id="start_date"/>
						</div>
						<div class="g-md-1" style="text-align:center; line-height: 34px;">
							<span>to</span>
						</div>
						<div class="g-md-4">
							<input value="{{$end_date}}" class="f_date_1 form-control" id="end_date"/>
						</div>
						<div class="g-md-3">
							<button type="button" class="btn btn-success" id="show_range_button">
								Show
							</button>
						</div>
					</div>

					<script>
					$('.f_date_0').datepicker();

					$('.f_date_1').datepicker();
					</script>
				</div>
				<div class="g-lg-2" style="margin-top: 14px;">
 
						<a class="btn btn-success pull-right" href="{{URL::to('fungsi/search_return')}}">
							<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Retur
						</a> 
				</div>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->

			<table class="table table-bordered">
				<thead class="table-bordered">
					<tr>
						<th class="table-bordered">
							<a href="javascript:void(0)">No. Nota</a>
								@if($filtered == 0)
									@if($sortBy == 'no_nota')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'no_nota', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'no_nota', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'no_nota', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'no_nota')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'no_nota', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'no_nota', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'no_nota', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th>
							<a href="javascript:void(0)">Kode Barang</a>
								@if($filtered == 0)
									@if($sortBy == 'kode_barang')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'kode_barang', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'kode_barang', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'kode_barang', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'kode_barang')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'kode_barang', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'kode_barang', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'kode_barang', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th>
							<a href="javascript:void(0)">Nama Pelanggan</a>
								@if($filtered == 0)
									@if($sortBy == 'nama_pelanggan')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'nama_pelanggan', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'nama_pelanggan', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'nama_pelanggan', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'nama_pelanggan')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'nama_pelanggan', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'nama_pelanggan', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'nama_pelanggan', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">Tipe</a>
								@if($filtered == 0)
									@if($sortBy == 'type')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'type')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Status</a>
								@if($filtered == 0)
									@if($sortBy == 'status')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'status')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Solusi</a>
								@if($filtered == 0)
									@if($sortBy == 'solution')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'solution')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Tukar dengan Kode Produk</a>
								@if($filtered == 0)
									@if($sortBy == 'trade_product_id')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'trade_product_id')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Selisih</a>
								@if($filtered == 0)
									@if($sortBy == 'difference')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'difference')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">created_at</a>
								@if($filtered == 0)
									@if($sortBy == 'created_at')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'created_at')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','no_nota'=>$no_nota,'kode_barang'=>$kode_barang,'nama_pelanggan'=>$nama_pelanggan,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at,'start_date'=>$start_date,'end_date'=>$end_date))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="100">Command</th>
					</tr>
				</thead>
				<thead>
					<tr>
						
						<td><input type="text" class="form-control input-sm" id="filter_no_nota"></td>
						<td><input type="text" class="form-control input-sm" id="filter_kode_barang"></td>
						<td><input type="text" class="form-control input-sm" id="filter_nama_pelanggan"></td>
						<td>
							<select class="form-control input-sm" id="filter_type" style="padding-right: 0px;">
									<option value="">Pilih Tipe</option>
									<option value="tukar_barang_sama">tukar barang sama</option>
									<option value="tukar_barang_beda">tukar barang beda</option>
									<option value="tukar_uang">tukar uang</option>
									<option value="semua_tipe">semua tipe</option>
							</select>
						</td>
						<td>
							<select class="form-control input-sm" id="filter_status" style="padding-right: 0px;">
									<option value="">Pilih Status</option>
									<option value="pending">pending</option>
									<option value="fixed">fixed</option>
									<option value="semua_status">semua status</option>
							</select>
						</td>
						<td>
							<select class="form-control input-sm" id="filter_solution" style="padding-right: 0px;">
									<option value="">Pilih Solution</option>
									<option value="kembalikan_ke_toko">kembalikan ke toko</option>
									<option value="masukkan_ke_daftar_obral">masukan ke daftar obral</option>
									<option value="semua_solusi">semua solusi</option>
							</select>
						</td>
						<td><input type="text" class="form-control input-sm" id="filter_trade_product_id"></td>
						<td><input type="text" class="form-control input-sm" id="filter_difference"></td>
						<td><input type="text" class="form-control input-sm" id="filter_created_at"></td>
						<td width=""><a class="btn btn-primary btn-xs" id="filter_button">Filter</a></td>
						<!--<td></td>-->
						
					</tr>
				</thead>
				<tbody>
					
						@if($datas!=null)
							@foreach($datas as $data)
							<tr> 
								<td>
									{{ $data->no_nota }}
								</td>
								<td>
									{{ $data->kode_barang }}
								</td>
								<td> 
									{{ $data->nama_pelanggan }}
								</td> 
								<td>
									{{-- $data->type --}}
									@if( ($data->type) == '1')
										tukar barang sama
									@elseif( ($data->type) == '2')
										tukar barang beda
									@elseif( ($data->type) == '3')
										tukar uang
									@endif
								</td>
								<td>
									{{ $data->status }}
								</td>
								<td>
									{{ $data->solution }}
								</td>
								<td>
									{{ $data->trade_product_id }}
								</td>
								<td>
									{{ toMoney($data->difference) }}
								</td>
								<td>
									{{ $data->created_at}}
								</td>
								<td>
									<input type="hidden" value="{{$data->id}}"/>
									<button id="" class="btn btn-info btn-xs solution-btn"  data-toggle="modal" data-target=".pop_up_solusi">Solusi</button>
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

						$('.f_excel_xinput').keypress(function(e) {
							if(e.which == 13) {
								$(this).siblings('.f_excel_xlabel').text($(this).val());
								$(this).siblings('.f_excel_xlabel').removeClass('hidden');
								$(this).addClass('hidden');
							}
						});
						
						$( 'body' ).on( "click",'.solution-btn', function() {
							$id = $(this).prev().val();
							$('#return_id_hidden').val($id);
							$('#return_id_hidden_print').val($id);
							/*
							$.ajax({
								type: 'PUT',
								url: '{{URL::route('david.update_solution_return')}}',
								data: {
									'data' : $id;
									'qty' : $orderQtys,
									'ctr' : $counter
								},
								success: function(response){
									//ajax lagi baru window.open.. ITS SOMMMEEETTTHIIINNGG
									if(response['code'] == 200)
									{
										window.open("{{URL::route('david.view_print_konsumen')}}"+"?dataT="+$id);
										location.reload();
									}
									else
									{
										alert("Something Going Wrong.. Check your form or contact developer..");
									}
								},error: function(xhr, textStatus, errorThrown){
									alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
									alert("responseText: "+xhr.responseText);
								}
							},'json');
							*/
						});
						</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	@include('pages.return.pop_up_add_return')
	@include('pages.return.pop_up_solusi')

	<script>
	
		$('body').on('click','#show_range_button',function(){
			$start_date = $('#start_date').val();
			$end_date = $('#end_date').val();
			
			/*
			$month = "";
			$dates = "";
			$year = "";
			$i = 0;
			
			while($end_date.charAt($i) != '/'){
				$month += $end_date.charAt($i);
				$i++;
			}
			$i++;
			while($end_date.charAt($i) != '/'){
				$dates += $end_date.charAt($i);
				$i++;
			}
			$i++;
			while($i < $end_date.length){
				$year += $end_date.charAt($i);
				$i++;
			}
			
			$dates = parseInt($dates)+1;
			
			$end_date = $month + '/' + $dates + '/' +$year; 
			*/
			
			$no_nota = '-';
			$kode_barang = '-';
			$nama_pelanggan = '-';
			$type = '-';
			$status = '-';
			$solution = '-';
			$trade_product_id = '-';
			$difference = '-';
			$created_at = '-';
			
			window.location = "{{URL::route('gentry.view_return')}}" + "?filtered=1&no_nota="+$no_nota+"&kode_barang="+$kode_barang+"&nama_pelanggan="+$nama_pelanggan+"&type="+$type+"&status="+$status+"&solution="+$solution+"&trade_product_id="+$trade_product_id+"&difference="+$difference+"&created_at="+$created_at+"&start_date="+$start_date+"&end_date="+$end_date;
		
		});
		
		$('body').on('click','#filter_button',function(){
			$start_date = $('#start_date').val();
			$end_date = $('#end_date').val();
		
			$no_nota = $('#filter_no_nota').val();
			if($no_nota == ''){
				$no_nota = '-';
			}
			
			$kode_barang = $('#filter_kode_barang').val();
			if($kode_barang == ''){
				$kode_barang = '-';
			}
			
			$nama_pelanggan = $('#filter_nama_pelanggan').val();
			if($nama_pelanggan == ''){
				$nama_pelanggan = '-';
			}
			
			var a=document.getElementById("filter_type");
			for (var i = 0; i < a.options.length; i++) 
			{
				if(a.options[i].selected ==true)
				{
					$typeRaw = a.options[i].value;
				}
			}
			
			if($typeRaw == 'tukar_barang_sama'){
				$type = 1;
			}else if($typeRaw == 'tukar_barang_beda'){
				$type = 2;
			}else if($typeRaw == 'tukar_uang'){
				$type = 3;
			}else{
				$type = '-';
			}
			
			var b=document.getElementById("filter_status");
			for (var i = 0; i < b.options.length; i++) 
			{
				if(b.options[i].selected ==true)
				{
					$statusRaw = b.options[i].value;
				}
			}
			
			if($statusRaw == 'pending'){
				$status = 'pending';
			}else if($statusRaw == 'fixed'){
				$status = 'fixed';
			}else{
				$status = '-';
			}
			
			var c=document.getElementById("filter_solution");
			for (var i = 0; i < c.options.length; i++) 
			{
				if(c.options[i].selected ==true)
				{
					$solutionRaw = c.options[i].value;
				}
			}
			
			if($solutionRaw == 'kembalikan_ke_toko'){
				$solution = 'kembalikan ke toko';
			}else if($solutionRaw == 'masukkan_ke_daftar_obral'){
				$solution = 'masukkan ke daftar obral';
			}else{
				$solution = '-';
			}
			
			//$solution = '-';
			
			$trade_product_id = $('#filter_trade_product_id').val();
			if($trade_product_id == ''){
				$trade_product_id = '-';
			}
			
			$difference = $('#filter_difference').val();
			if($difference == ''){
				$difference = '-';
			}
			
			$created_at = $('#filter_created_at').val();
			if($created_at == ''){
				$created_at = '-';
			}
			
			window.location = "{{URL::route('gentry.view_return')}}" + "?filtered=1&no_nota="+$no_nota+"&kode_barang="+$kode_barang+"&nama_pelanggan="+$nama_pelanggan+"&type="+$type+"&status="+$status+"&solution="+$solution+"&trade_product_id="+$trade_product_id+"&difference="+$difference+"&created_at="+$created_at+"&start_date="+$start_date+"&end_date="+$end_date;
		});
	</script>
	@stop
