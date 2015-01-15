@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<div class="g-lg-3">
					<h3 style="float: left;">
						Laporan Seluruh Transaksi
					</h3>
				</div>
				<div class="g-lg-6" style="">
					<div class="panel panel-default" style="margin-bottom: 0px;">
						<div class="panel-body">
							<div class="g-xs-2" style="text-align: right; line-height: 34px;">
								Range
							</div>
							<div class="input-daterange g-xs-10">
								<div class="g-xs-4">
									<input value="{{$start_date}}" class="f_date_0 form-control" id="start_date"/>
								</div>
								<div class="g-xs-1" style="text-align:center; line-height: 34px;">
									<span>to</span>
								</div>
								<div class="g-xs-4">
									<input value="{{$end_date}}" class="f_date_1 form-control" id="end_date"/>
								</div>
								<div class="g-xs-3">
									<button type="button" class="btn btn-success" id="show_range_button">
										Show
									</button>
								</div>
							</div>
						</div>
					</div>

					<script>
					$('.f_date_0').datepicker();

					$('.f_date_1').datepicker();
					</script>
				</div>
				

			</div>
			<span class="clearfix"></span>
			<hr></hr>
		
			<div>
				<table class="table table-bordered table-hover ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" width="110">
								<a href="javascript:void(0)">No. Nota</a>
								@if($filtered == 0)
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Nama Pelanggan</a>
								@if($filtered == 0)
										@if($sortBy == 'name')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'name')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Total</a>
								@if($filtered == 0)
										@if($sortBy == 'total')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'total')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)"><img src="{{asset('assets/img/pigblk.png')}}" height="14"></a>
								@if($filtered == 0)
										@if($sortBy == 'discount')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'discount')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="50">
								<a href="javascript:void(0)">Pajak</a>
								@if($filtered == 0)
										@if($sortBy == 'tax')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'tax')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<!--<span class="glyphicon glyphicon-sort" style="float: right;"></span>-->
								</a>
							</th> 
							<th class="table-bordered">
								<a href="javascript:void(0)">Nama Karyawan</a>
								@if($filtered == 0)
										@if($sortBy == 'username')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'username')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="90">
								<a href="javascript:void(0)">Void</a>
								@if($filtered == 0)
										@if($sortBy == 'is_void')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'is_void')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="90">
								<a href="javascript:void(0)">Status</a>
								@if($filtered == 0)
										@if($sortBy == 'status')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'status')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'is_void'=>$is_void,'status'=>$status,'start_date'=>$start_date,'end_date'=>$end_date))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">Tanggal</th>
							<th class="table-bordered" width="100">View Detail</th>
							<th class="table-bordered" width="100">Print</th>
						</thead>
						<thead>
							<tr>
								
								<td><input type="text" class="form-control input-sm" id="filter_id"></td>
								<td><input type="text" class="form-control input-sm" id="filter_name"></td>
								<td><input type="text" class="form-control input-sm" id="filter_total"></td>
								<td><input type="text" class="form-control input-sm" id="filter_discount"></td>
								<td><input type="text" class="form-control input-sm" id="filter_tax"></td> 
								<td><input type="text" class="form-control input-sm" id="filter_username"></td>
								<td>
									<select class="form-control input-sm" id="filter_void">
										<option value="true">true</option>
										<option value="false">false</option>
										<option value="semua_void">semua void</option>
									</select>
								</td>
								<td>
									<select class="form-control input-sm" id="filter_status">
										<option value="true">paid</option>
										<option value="false">unpaid</option>
										<option value="semua_status">semua status</option>
									</select>
								</td>
								<td></td>
								<td width="" colspan="2">
								<a class="btn btn-primary btn-xs" id="filter_button" style="float: left;">Filter</a>
								
								<a class="btn btn-primary btn-xs" id="unfilter_button"  style="float: left; margin-left: 5px;"><span class="glyphicon glyphicon-refresh" style="margin-right: 5px;"></span>Reset</a>
								</td>
								
							</tr>
						</thead>
						<tbody id="body_content">
							<?php
			
								function toMoney($val,$symbol='IDR ',$r=0)
								{
									$n = $val;
									$sign = ($n < 0) ? '-' : '';
									$i = number_format(abs($n),$r,",",".");

									return  $symbol.$sign.$i;
								}
							?>
							@if($datas != null)
								@foreach($datas as $data)
									<tr> 
										<td>{{$data->id}}</td>
										@if($data->name == "")
											<td id="hidden_trans_customer_name_{{$data->id}}">Tidak Ada Nama</td>
										@else
											<td id="hidden_trans_customer_name_{{$data->id}}">{{$data->name}}</td>
										@endif
										<td id="hidden_trans_total_{{$data->id}}">{{toMoney($data->total)}}</td>
										<td id="hidden_trans_discount_{{$data->id}}">{{toMoney($data->discount)}}</td>
										<td id="hidden_trans_tax_{{$data->id}}">{{$data->tax}}%</td> 
										<td>{{$data->username}}</td>
										@if($data->is_void == 0)
											<td>False</td>
										@else
											<td>True</td>
										@endif
										<td>{{$data->status}}</td>
										<td>{{$data->created_at}}</td>
										<td>
											<input type='hidden' value='{{$data->status}}' id="hidden_status"/>
											<input type='hidden' value='{{$data->total_paid}}' id="hidden_paid"/>
											<button id="detail_{{$data->id}}" class="btn btn-info btn-xs view_detail_button" data-toggle="modal" data-target=".pop_up_detail_transaction">View Detail</button>
											<input type="hidden" value="{{$data->id}}">
											@if(Auth::user()->role != 3)
												@if($data->is_void == 0 && $data->status == "Paid")
												<button id="void_{{$data->id}}" class="btn btn-danger btn-xs view_void_button" data-toggle="modal" data-target=".pop_up_void_transaction" style="margin-top: 5px;">
													<span class="glyphicon glyphicon-usd" style="margin-right: 5px;"></span>Void
												</button>
												
												@endif
											@endif
											<!-- Button trigger modal class ".alertYesNo" -->
										</td>
										<td>
											<button class="btn btn-warning btn-xs print-toko-btn" id="{{$data->id}}" data-toggle="modal" data-target="" style="display: block; margin-bottom: 5px;">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Toko
											</button>
											<button class="btn btn-success btn-xs print-konsumen-btn" id="{{$data->id}}" data-toggle="modal" data-target="">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Customer
											</button>
											<!-- Button trigger modal class ".alertYesNo" -->
										</td>
									</tr> 
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
<!-- modal void -->	
<div class="modal fade pop_up_void_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<!--<div style="font-size: 1.2em;">
					<b>ID Transaksi :</b>  <span id="pop_up_trans_id"></span>
					<span class="clearfix"></span>
					<b>Nama Customer :</b> <span id="pop_up_trans_name"></span>
				</div>-->
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="g-sm-12"><!-- g-sm-5 -->
							
								
							<div class="form-group" style="text-align: center;">
								<h4>
								Apakah Anda yakin ingin mem-void transaksi ini?
								</h4>
								<input type="hidden" id="tableRep"/>
								<button type="button" class="btn btn-danger yes-btn" data-dismiss="modal">Ya</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
							</div>
							
							
							
							<!--
							<button type="button" class="btn btn-success pull-right">
								<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Customer
							</button>
							<button type="button" class="btn btn-warning pull-right" style="margin-right: 20px;">
								<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Toko
							</button>
							-->
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

	@include('pages.transaction.pop_up_detail_transaction') 

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
		
		$id = '-';
		$name = '-';
		$total = '-';
		$discount = '-';
		$tax = '-';
		$sales_id = '-';
		$username = '-';
		$is_void = '-';
		$status = '-';
		
		window.location = "{{URL::route('david.view_all_transaction')}}" + "?filtered=1&id="+$id+"&name="+$name+"&total="+$total+"&discount="+$discount+"&tax="+$tax+"&sales_id="+$sales_id+"&username="+$username+"&is_void="+$is_void+"&status="+$status+"&start_date="+$start_date+"&end_date="+$end_date;
		
		//alert($start_date);
		//alert($end_date);
		/*
		$.ajax({
			type: 'GET',
			url: '{{URL::route('gentry.range_date')}}',
			data: {
				'start_date' : $start_date,
				'end_date' : $end_date
			},
			success: function(response){
				$('#body_content').html('');
				$row = "";
				$.each(response, function(i,data){
					$row += "<tr><td>";
					$row += data.id;
					$row += "</td><td id='hidden_trans_customer_name_"+data.id+"'>";
					if(data.name != ''){
						$row += data.name;
					}else{
						$row += "Tidak Ada Nama";
					}
					$row += "</td><td id='hidden_trans_total_"+data.id+"'>";
					$row += "IDR " + data.total;
					$row += "</td><td d='hidden_trans_discount_"+data.id+"'>";
					$row += "IDR " + data.discount;
					$row += "</td><td id='hidden_trans_tax_"+data.id+"'>";
					$row += data.tax + "%";
					$row += "</td><td>";
					$row += data.sales_id;
					$row += "</td><td>";
					$row += data.username;
					$row += "</td><td>";
					if(data.is_void == 0){
						$row += "False";
					}else{
						$row += "True";
					}
					$row += "</td><td>";
					$row += data.status;
					$row += "</td><td>";
					$row += data.created_at;
					$row += "</td><td>";
					$row += "<input type='hidden' value='"+data.status+"' id='hidden_status'/>";
					$row += "<input type='hidden' value='"+data.total_paid+"' id='hidden_paid'/>";
					$row += "<button id='detail_"+data.id+"' class='btn btn-info btn-xs view_detail_button' data-toggle='modal' data-target='.pop_up_detail_transaction'>View Detail</button>";
					$row += "<input type='hidden' value='"+data.id+"'>";
					$row += "</td><td>";
					$row += "<button class='btn btn-warning btn-xs print-toko-btn' id='"+data.id+"' data-toggle='modal' data-target='' style='display: block; margin-bottom: 5px;'>";
					$row += "<span class='glyphicon glyphicon-print' style='margin-right: 5px;'></span>Toko";
					$row += "</button>";
					$row += "<button class='btn btn-success btn-xs print-konsumen-btn' id='"+data.id+"' data-toggle='modal' data-target=''>";
					$row += "<span class='glyphicon glyphicon-print' style='margin-right: 5px;'></span>Customer";
					$row += "</button>";
					$row += "</td></tr>";
				});
				$("#body_content").html($row);			
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');*/
	});
	
	$('body').on('click','#filter_button',function(){
		$start_date = $('#start_date').val();
		$end_date = $('#end_date').val();
	
		$id = $('#filter_id').val();
		if($id == ''){
			$id = '-';
		}
		
		$name = $('#filter_name').val();
		if($name == ''){
			$name = '-';
		}
		
		$total = $('#filter_total').val();
		if($total == ''){
			$total = '-';
		}
		
		$discount = $('#filter_discount').val();
		if($discount == ''){
			$discount = '-';
		}
		
		$tax = $('#filter_tax').val();
		if($tax == ''){
			$tax = '-';
		}
		
		$sales_id = $('#filter_sales_id').val();
		if($sales_id == ''){
			$sales_id = '-';
		}
		
		$username = $('#filter_username').val();
		if($username == ''){
			$username = '-';
		}
		
		var x = document.getElementById('filter_void');
		for(var i=0; i<x.options.length; i++){
			if(x.options[i].selected == true){
				$tempVal = x.options[i].value;
			}
		}
		if($tempVal == 'true'){
			$is_void = 1;
		}else if($tempVal == 'false'){
			$is_void = 0;
		}else{
			$is_void = '-';
		}
		
		var y = document.getElementById('filter_status');
		for(var i=0; i<y.options.length; i++){
			if(y.options[i].selected == true){
				$tempVal2 = y.options[i].value;
			}
		}
		if($tempVal2 == 'true'){
			$status = 'Paid';
		}else if($tempVal2 == 'false'){
			$status = 'UnPaid';
		}else{
			$status = '-';
		}
		
		window.location = "{{URL::route('david.view_all_transaction')}}" + "?filtered=1&id="+$id+"&name="+$name+"&total="+$total+"&discount="+$discount+"&tax="+$tax+"&sales_id="+$sales_id+"&username="+$username+"&is_void="+$is_void+"&status="+$status+"&start_date="+$start_date+"&end_date="+$end_date;
	});

	$('body').on('click','.view_detail_button',function(){
		$id = $(this).next().val();
		$status = $(this).prev().prev().val();
		$paid = $(this).prev().val()
		$('#transaction_detail_content').html("");
		$('#transaction_subtotal_detail').text("");
		$('#transaction_diskon_detail').text("");				
		$('#transaction_tax_detail').text("");			
		$('#transaction_total_detail').text("");
		$name = $('#hidden_trans_customer_name_'+$id).text();
		$discount = $('#hidden_trans_discount_'+$id).text();
		$total = $('#hidden_total_discount_'+$id).text();
		$tax = $('#hidden_trans_tax_'+$id).text();
		//alert($name);
		$('#pop_up_trans_name').text($name);
		$('#pop_up_trans_id').text($id);
		
		$.ajax({
			type: 'GET',
			url: '{{URL::route('david.get_order_by_trans_id')}}',
			data: {
				'data' : $id
			},
			success: function(response){
				$data = "";
				$total = 0;
				
				$.each(response['messages'], function( i, resp ) {
					$shop = resp.stock_shop;
					$storage = resp.stock_storage;
					$avaliability = 0;
					if(resp.quantity > $shop)
					{
						if(resp.quantity > $storage)
						{
							$avaliability = 2;
						}
						else
						{
							$avaliability = 1;
						}
					}
					else
					{
						
					}
					if($avaliability == 1)
					{
						$data += "<tr class='s_danger_1'>";
					}
					else if($avaliability == 2)
					{
						$data += "<tr class='s_danger_2'>";
					}
					else
					{
						$data += "<tr>";
					}
					$data += "<input id='hidden_id' type=hidden value='"+resp.id+"'/>";
					$data += "<input id='hidden_shop' type=hidden value='"+$shop+"'/>";
					$data += "<input id='hidden_storage' type=hidden value='"+$storage+"'/>";
					$data += "<td>"
					$data += resp.namaProduk;
					$data += "</td><td>";
					$data += "<img src='{{asset('"+resp.foto+"')}}' width='100' height='100'>";
					$data += "</td><td>";
					$data += resp.warna;
					$data += "</td><td class='f_td_excel_xlabel'>";
					$data += "<span class='f_excel_xlabel' id=' style=''line-height: 30px;' >"+ resp.quantity +"</span>";
					$data += "<input type='text' id='' class='f_excel_xinput form-control input-sm hidden f_qty_transaction' style=''/>";
					$data += "</td><td class='f_price_transaction'>IDR ";
					$data += toRp(resp.hargaSatuan);
					$data += "</td><td class='f_subtotal_price_transaction'>IDR ";
					$data += toRp(parseInt(resp.hargaSatuan) * parseInt(resp.quantity));
					$data += "</td>";
					$data += "<td>";
					$data += "<input id='hidden_id_delete' type=hidden value='"+resp.id+"'/>";
					$data += "<button type='button'class='btn btn-danger f_delete_row_pesanan_vtrans btn-xs'><span class='glyphicon glyphicon-remove'></span></button>";
					$data += "</td>";
					$data += "</tr>"
					$('#transaction_detail_content').html($data);
					$total += parseInt(resp.hargaSatuan) * parseInt(resp.quantity);
				});
				//$('#transaction_subtotal_detail').text("IDR " + toRp($total));
				$('#transaction_diskon_detail').val(toAngka($discount));			
				$('#transaction_tax_detail').text($tax);			
				$('#transaction_total_detail').text("IDR " + toRp($total));
				if($status == "Paid")
				{
					$('#f_uang_bayaran').val("IDR " + toRp($paid));
					$('#f_uang_bayaran').attr('disabled','disabled');
					$('#transaction_diskon_detail').attr('disabled','disabled');
					$kembalian = parseInt($paid) - parseInt($total);
					$('#f_uang_kembalian').text("IDR " + toRp($kembalian));
					$('#save-btn').addClass('hidden');
					$('#save-btn').addClass('paid');
				}
				else
				{
					$('#f_uang_bayaran').removeAttr('disabled');
					$('#transaction_diskon_detail').removeAttr('disabled');
					$('#f_uang_kembalian').text("");
					$('#save-btn').removeClass('hidden');
				}		
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
	});
	
	//menghapus tr detail pesanan
	$('body').on('click','.f_delete_row_pesanan_vtrans',function(){
		$id = $(this).prev().val();
		//delete the row
		$(this).closest('tr').remove();
		//siapkan variable temp subtotal
		var f_new_subtotal = 0; 

		//foreach subtotal per row
		$('#transaction_detail_content tr').each(function(){
		 	f_new_subtotal += toAngka( $(this).find('.f_subtotal_price_transaction').text() );
		});

		var f_cur_transaction_diskon_detail = toAngka( $('#transaction_diskon_detail').val() );
		var f_cur_transaction_tax_detail = toAngka( $('#transaction_tax_detail').text() ) / 100;

		var f_cur_discounted = f_new_subtotal - f_cur_transaction_diskon_detail;
		var f_cur_transaction_total_detail = f_cur_discounted + (f_cur_discounted*f_cur_transaction_tax_detail);

		$('#transaction_total_detail').text("IDR " + toRp(f_cur_transaction_total_detail));
		var current = $('#deleted_order').val();
		if(current == "-")
		{
			current = "";
		}
		$('#deleted_order').val(current+$id+",");
		//alert(f_cur_transaction_total_detail);

		//alert(this_f_subtotal_price_transaction);
		//alert(this_transaction_total_detail);
		//
	});
	
	function toAngka(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}
	function toRp(angka){
		var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
		var rev2    = '';
		for(var i = 0; i < rev.length; i++){
			rev2  += rev[i];
			if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
				rev2 += '.';
			}
		}
		return rev2.split('').reverse().join('');
	}
	
	$( 'body' ).on( "click",'.view_void_button', function() {
		$('#tableRep').val($(this).prev().val());
		//alert($(this).prev().val());
	});
	
	$( 'body' ).on( "click",'.yes-btn', function() {
		//ajax void
		$id = $('#tableRep').val();
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('david.make_void')}}',
			data: {
				'data' : $id
			},
			success: function(response){
				if(response['code'] == 200)
				{
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
	});
	
	$( 'body' ).on( "click",'.print-toko-btn', function() {
		window.open("{{URL::route('david.view_print_toko')}}"+"?dataT="+$(this).attr('id'));
	});
	$( 'body' ).on( "click",'.print-konsumen-btn', function() {
		window.open("{{URL::route('david.view_print_konsumen')}}"+"?dataT="+$(this).attr('id'));
	});
	
	$( 'body' ).on( "click",'.f_td_excel_xlabel', function() {
		$(this).children('.f_excel_xlabel').siblings('.f_excel_xinput').removeClass('hidden');
		$(this).children('.f_excel_xlabel').siblings('.f_excel_xinput').val($(this).text());
		$(this).children('.f_excel_xlabel').addClass('hidden');
	});
	$( 'body' ).on( "keypress",'.f_excel_xinput', function(e) {
		var key = e.which;
		if(key == 13)  
		{
			$(this).siblings('.f_excel_xlabel').text($(this).val());
			$(this).siblings('.f_excel_xlabel').removeClass('hidden');
			$(this).addClass('hidden');
		}
	});
	
	$( 'body' ).on( "keypress",'.f_qty_transaction', function(e) {
		var key = e.which;
		if(key == 13)  
		{
			//alert($(this).val());
			var sub_tot_text = toAngka($(this).closest('tr').find('.f_price_transaction').text());
			var perkalian_subtotal = sub_tot_text*($(this).val());
			//alert(perkalian_subtotal);
			$(this).closest('tr').find('.f_subtotal_price_transaction').text('IDR ' + toRp(perkalian_subtotal));
			$total = 0;
			$("#transaction_detail_content tr").each(function(i, v)
			{
				$totalPrice = $(this).children('td')[5].innerText;
				$total += toAngka($totalPrice);
			});
			$total -= toAngka($('#transaction_diskon_detail').val())
			$tax = $total * toAngka($('#transaction_tax_detail').text()) / 100;
			$total += $tax;
			$('#transaction_total_detail').text("IDR " + toRp($total));
			
			//cek stock
			$shop = $(this).closest('tr').find('#hidden_shop').val();
			$storage = $(this).closest('tr').find('#hidden_storage').val();
			$avaliability = 0;
			if(parseInt($(this).val()) > parseInt($shop))
			{
				if(parseInt($(this).val()) > parseInt(parseInt($storage) + parseInt($shop)))
				{
					$avaliability = 2;
				}
				else
				{
					$avaliability = 1;
				}
			}
			else
			{
				
			}
			
			if($avaliability == 1)
			{
				$(this).closest('tr').removeClass('s_danger_2');
				$(this).closest('tr').addClass('s_danger_1');
				$(this).closest('tr').removeClass('error');
			}
			else if($avaliability == 2)
			{
				$(this).closest('tr').removeClass('s_danger_1');
				$(this).closest('tr').addClass('s_danger_2');
				$(this).closest('tr').addClass('error');
			}
			else
			{
				$(this).closest('tr').removeClass('s_danger_2');
				$(this).closest('tr').removeClass('s_danger_1');
				$(this).closest('tr').removeClass('error');
			}
			$canContinue = 1;
			$("#transaction_detail_content tr").each(function(i, v)
			{
				if($(this).hasClass('error'))
				{
					$canContinue = 0;
				}
			});
			
			if($canContinue == 0)
			{
				$('#save-btn').addClass('hidden');
			}
			else
			{
				if($('#save-btn').hasClass('paid'))
				{
				
				}
				else
				{
					$('#save-btn').removeClass('hidden');
				}
			}
		}
		
		
	});
	
	$('body').on('click','#unfilter_button',function(){
		window.location = "{{URL::route('david.view_all_transaction')}}";
	});
	</script>
@stop
