@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Cashflow Hari Ini
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
		
			<div>
				<table class="table table-bordered table-hover ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" >
								<a href="javascript:void(0)">Tipe Jual Beli</a>
									@if($filtered == 0)
										@if($sortBy == 'type')
											@if($order == 'asc')
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'type', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif										
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">No. Nota</a>
									@if($filtered == 0)
										@if($sortBy == 'transaction_id')
											@if($order == 'asc')
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'transaction_id', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'transaction_id', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'transaction_id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif										
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<!--
							<th class="table-bordered">
								<a href="javascript:void(0)">Customer Name</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							-->
							<th class="table-bordered">
								<a href="javascript:void(0)">In</a>
									@if($filtered == 0)
										@if($sortBy == 'in_amount')
											@if($order == 'asc')
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'in_amount', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'in_amount', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'in_amount', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif										
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Out</a>
									@if($filtered == 0)
										@if($sortBy == 'out_amount')
											@if($order == 'asc')
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'out_amount', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'out_amount', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'out_amount', 'order' => 'asc', 'filtered'=>'0'))}}">
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
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif										
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<!--<th class="table-bordered">
								<a href="javascript:void(0)">Discount</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Tax</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Kar. ID</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Username</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Void</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="120">
								<a href="javascript:void(0)">Status</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							-->

							<th class="table-bordered" width="200">
								<a href="javascript:void(0)">Waktu</a>
									@if($filtered == 0)
										@if($sortBy == 'created_at')
											@if($order == 'asc')
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('cashController@view_laporan_cash', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif										
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
						<!--<th class="table-bordered" width="100"></th>
							<th class="table-bordered" width="100">Print</th>-->
						</thead>
						
						<tbody>
							<?php
			
								function toMoney($val,$symbol='Rp ',$r=0)
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
										<td>
											{{$data->type}}
										</td>
										<td>
											@if($data->transaction_id == null)
												-
											@else
												{{$data->transaction_id}}
											@endif
										</td>
										<td>
											{{toMoney($data->in_amount)}}
										</td>
										<td>
											{{toMoney($data->out_amount)}}
										</td>
										<td>
											{{toMoney($data->total)}}
										</td>
										<td>
											{{$data->created_at}}
										</td>
									</tr>
								@endforeach								
							@else
							
							@endif
							<!--
							<tr>
								<td>
									Transaksi
								</td>
								<td>
									23896452893
								</td>
								<td>
									Mr Jaya
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									Rp 2.000.000
								</td>
								<td>
									2015-7-30 09:34:01
								</td>
							</tr>

							<tr>
								<td>
									Retur
								</td>
								<td>
									23896452893
								</td>
								<td>
									Mr Jaya
								</td>
								<td>
									- Rp 700.000
								</td>
								<td>
									Rp 1.100.000
								</td>
								<td>
									2015-7-30 09:34:01
								</td>
							</tr>

							<tr>
								<td>
									Transaksi
								</td>
								<td>
									23896452893
								</td>
								<td>
									Mr Jaya
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									Rp 1.800.000
								</td>
								<td>
									2015-7-30 09:34:01
								</td>
							</tr>

							<tr>
								<td>
									Morning Bank
								</td>
								<td>
									-
								</td>
								<td>
									Owner
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									2015-7-30 07:34:01
								</td>
							</tr>
							-->
									<!--<tr> 
										
										<td> 
											<button id="" class="btn btn-success btn-xs view_detail_button" data-toggle="modal" data-target=".pop_up_detail_transaction">
												<span class="glyphicon glyphicon-usd" style="margin-right: 5px;"></span>View Detail
											</button>
											<input type="hidden" value=""> 
										</td>
										<td>
											<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="" style="display: block; margin-bottom: 5px;">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Toko
											</button>
											<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Customer
											</button> 
										</td>
									</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@stop
