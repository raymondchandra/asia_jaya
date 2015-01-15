@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<div class="g-lg-3">
					<h3 style="float: left;">
						Lap. Keuntungan Bulanan
					</h3>
				</div>
				<div class="g-lg-6" style=""> 
					<!--<div class="panel panel-default" style="margin-bottom: 0px;">
						<div class="panel-body">
							<div class="g-xs-3" style="text-align: right; line-height: 34px;">
								Range bulan
							</div>
							<div class="input-daterange g-xs-9">
								<div class="g-xs-4">
									<input value=" " class="f_date_0 form-control" id="start_date"/>
								</div>
								<div class="g-xs-1" style="text-align:center; line-height: 34px;">
									<span>to</span>
								</div>
								<div class="g-xs-4">
									<input value="" class="f_date_1 form-control" id="end_date"/>
								</div>
								<div class="g-xs-3">
									<button type="button" class="btn btn-success" id="show_range_button">
										Show
									</button>
								</div>
							</div>
						</div>
					</div>-->
					

					<script>
					$('.f_date_0').datepicker({
						format: "mm-yyyy",
						viewMode: "months", 
						minViewMode: "months"
					});

					$('.f_date_1').datepicker({
						format: "mm-yyyy",
						viewMode: "months", 
						minViewMode: "months" 
					});
					</script>
				</div>
				

			</div>
			<span class="clearfix"></span>
			<hr></hr>

			<div class="container">
				<div class="g-xs-7" style="margin-left: auto; margin-right: auto; float: none;">

					<div class="panel panel-default">
						<div class="panel-heading">Statistik Transaksi Tahun Ini</div>
						<div class="panel-body">
							<script type="text/javascript">
							$(function () {
								$('#container1').highcharts({
									chart: {
										type: 'area'
									},
									title: {
										text: 'Income Toko Asia Jaya Tahun Ini'
									},
									subtitle: {
										text: ''
									},
									xAxis: {
										allowDecimals: false,
										labels: {
											formatter: function () {
												return this.value; 
											}
										}
									},
									yAxis: {
										title: {
											text: 'Rupiah'
										},
										labels: {
											formatter: function () {
												return this.value ;
											}
										}
									},
									tooltip: {
										pointFormat: 'Income Rp <b>{point.y:,.0f}</b><br/>Pada akhir bulan ke-{point.x}'
									},
									plotOptions: {
										area: {
											pointStart: 1,
											marker: {
												enabled: false,
												symbol: 'circle',
												radius: 1,
												states: {
													hover: {
														enabled: true
													}
												}
											}
										}
									},
									series: [
									{
										name: 'Bulan Uang Masuk',
										data: [10, 20, 10, 14, 10, 20, 10, 14, 10, 20, 10, 14 ]
									},{
										name: 'Bulan Uang Untung',
										data: [8, 17, 7, 12, 8, 17, 7, 12, 8, 17, 7, 12 ]
									}
									]
								});
							});
							</script> 
							<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

						</div>
					</div>
					<table class="table table-bordered table-hover">
						<thead class="table-bordered">
							<tr>
								<th class="table-bordered">
									<a href="javascript:void(0)">Bulan Ke</a>
									<a href=" ">
										<span class="glyphicon glyphicon-sort" style="float: right;"></span>
									</a>
								</th>  
								<th class="table-bordered">
									<a href="javascript:void(0)">Total Uang Masuk</a>
									<a href=" ">
										<span class="glyphicon glyphicon-sort" style="float: right;"></span>
									</a>
								</th>  
								<th class="table-bordered">
									<a href="javascript:void(0)">Total Uang Untung</a>
									<a href=" ">
										<span class="glyphicon glyphicon-sort" style="float: right;"></span>
									</a>
								</th>  
								<th class="table-bordered">
								 
								</th>  
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
								<?php for($m = 1; $m < 13; $m++){?>
								<tr> 
									<td style="text-align: right;">{{ $m }}</td>  
									<td>Rp 30.000.000</td>
									<td>Rp 20.000.000</td>
									<td>
										<a href="{{URL::to('test/view_keuntungan_harian')}}" class="btn btn-primary btn-xs" style="display: inline-block; margin-top: 5px;margin-bottom: 5px;">
											<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Lihat Detail Harian
										</a>
									</td>
								</tr>  
								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>


	<script>

	</script>
	@stop
