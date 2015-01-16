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
	<div class="row">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Dashboard 
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->
		</div>
		<div class="g-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Awal Uang Kas Harian</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group" style="margin-bottom: 0px;">
							<label class="g-sm-4 control-label">
								Jumlah Uang 
							</label>
							<div class="g-sm-5">

								<div class="input-group">
									<input type="text" class="form-control" id="opening-cash-input" aria-describedby="basic-ribuan">
									<span class="input-group-addon" id="basic-ribuan">.000</span>
									
								</div>
							</div>
							<div class="g-sm-2">
								<input type="button" value="Save" class="btn btn-success opening-cash-btn">
								<script>
									$('body').on('click','.opening-cash-btn',function(){
										$amount = $('#opening-cash-input').val();
										$.ajax({
											type: 'GET',
											url: '{{URL::route('david.add_opening_cash')}}',
											data: {
												'amount' : $amount
											},
											success: function(response){
												if(response['code'] == 200)
												{
													alert('success add opeing cash');
													$('.today-cash').text("Rp " + toRp(response['message']));
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
									
								</script>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Cash Flow Hari Ini</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group" style="margin-bottom: 0px;">
							<label class="g-sm-6 control-label">
								Jumlah Uang Kas Awal
							</label>
							<div class="g-sm-6">
								<p type="text" class="form-control-static today-cash">{{ toMoney($kasHariIni) }}</p>
							</div>
						</div>
						<div class="form-group" style="margin-bottom: 0px;">
							<label class="g-sm-6 control-label">
								Jumlah Uang Di Kasir
							</label>
							<div class="g-sm-6">
								<p type="text" class="form-control-static today-cash">{{ toMoney($todayCash) }}</p>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Total Modal Keseluruhan</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group" style="margin-bottom: 0px;">
							<label class="g-sm-6 control-label">
								Total Modal Toko 
							</label>
							<div class="g-sm-6">
								<p type="text" class="form-control-static ff_to_rp">{{ toMoney($totaltoko) }}</p>
							</div>
						</div>
						<div class="form-group" style="margin-bottom: 0px;">
							<label class="g-sm-6 control-label">
								Total Modal Gudang 
							</label>
							<div class="g-sm-6">
								<p type="text" class="form-control-static ff_to_rp">{{ toMoney($totalgudang) }}</p>
							</div>
						</div>
						<div class="form-group" style="margin-bottom: 0px;">
							<label class="g-sm-6 control-label">
								Total Modal Keseluruhan 
							</label>
							<div class="g-sm-6">
								<p type="text" class="form-control-static ff_to_rp">{{ toMoney($totaltokogudang) }}</p>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Top 10 Buyers Bulan Ini</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td width="50">
									Rank
								</td>
								<td>
									Nama
								</td>
								<td>
									Rupiah
								</td>
							</tr>
						</thead>
						<tbody>
							<?php $counter = 1?>
							@foreach($topBuyer as $buyer)
								<tr>
								<td>
									{{$counter}}
									<?php $counter++ ?>
								</td>
								<td>
									{{$buyer->name}}
								</td>
								<td>
									{{toMoney($buyer->total)}}
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Top 10 Barang Paling Sering Dibeli</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td width="50">
									Rank
								</td>
								<td>
									Nama Barang
								</td>
							</tr>
						</thead>
						<tbody>
							<?php $counter = 1?>
							@foreach($topProduct as $product)
								<tr>
								<td>
									{{$counter}}
									<?php $counter++ ?>
								</td>
								<td>
									{{$product->name}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Top 10 Barang Paling Sering Direturn</div>
				<div class="panel-body"><table class="table table-bordered">
					<thead>
						<tr>
							<td width="50">
								Rank
							</td>
							<td>
								Nama Barang
							</td>
						</tr>
					</thead>
					<tbody>
						<?php $counter = 1?>
						@foreach($topReturn as $return)
							<tr>
							<td>
								{{$counter}}
								<?php $counter++ ?>
							</td>
							<td>
								{{$return->name}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="g-md-7">
		<div class="panel panel-default">
			<div class="panel-heading">Statistik Transaksi Bulan Ini</div>
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
						series: [{
							name: 'Hari',
							data: [{{$monthCash}}]
						}]
					});
});
</script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</div>
</div>
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
				series: [{
					name: 'Bulan',
					data: [{{$yearCash}}]
				}
					,{
						name: 'Bulan Uang Untung',
						data: [8, 17, 7, 12, 8, 17, 7, 12, 8, 17, 7, 12 ]
				 }] 
			});
		});
		</script> 
		<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</div>
</div>


<div class="panel panel-default">
	<div class="panel-heading">Top 10 Barang Paling Sering Direpeat</div>
	<div class="panel-body"><table class="table table-bordered">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td width="50">
						Rank
					</td>
					<td>
						Nama Barang
					</td>
				</tr>
			</thead>
			<tbody>
				<?php $counter = 1?>
				@foreach($topRepeat as $repeat)
					<tr>
					<td>
						{{$counter}}
						<?php $counter++ ?>
					</td>
					<td>
						{{$repeat->name}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>
</div>


</div>
</div>

<script> 
</script>
@stop
