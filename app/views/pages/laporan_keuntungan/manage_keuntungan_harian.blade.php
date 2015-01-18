@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<div class="g-lg-3">

					<ol class="breadcrumb">
						<li><a href="{{URL::route('david.view_keuntungan')}}">Lap. Keuntungan Bulanan</a></li> 
						<li class="active">Lap. Keuntungan Harian</li> 
					</ol>
					<h3 style="float: left;">
						Lap. Keuntungan Harian
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
					$('#container').highcharts({
						chart: {
							type: 'area'
						},
						title: {
							text: 'Income Toko Asia Jaya Bulan Ini'
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
							pointFormat: 'Income Rp <b>{point.y:,.0f}</b><br/>Pada hari ke-{point.x}'
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
							name: 'Uang Masuk',
							data: [{{$incomes}}]
						},
						{
							name: 'Uang Untung',
							data: [{{$profits}}]
						}
						]
					});
});
</script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

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
							</thead> 
							<tbody id="body_content">
								<?php

								function toMoney($val,$symbol='Rp ',$r=0)
								{
									$n = $val;
									$sign = ($n < 0) ? '-' : '';
									$i = number_format(abs($n),$r,",",".");

									return  $symbol.$sign.$i;
								}
								?> 
								<?php $counter = 1?>
								@foreach($monthlyDetail as $detail)
									<tr> 
									<td style="text-align: right;">{{ $counter }}</td>  
									<td>{{toMoney($detail[1])}}</td>
									<td>{{toMoney($detail[0])}}</td> 
								</tr>  
									<?php $counter++?>
								@endforeach
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
