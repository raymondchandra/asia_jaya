@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
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
						<div class="form-group">
							<label class="g-sm-3 control-label">
								Jumlah Uang 
							</label>
							<div class="g-sm-7">
								<input type="text" class="form-control">
							</div>
						</div>
					</form>
					<form class="form-horizontal">
						<div class="form-group">
							<label class="g-sm-3 control-label">

							</label>
							<div class="g-sm-7">
								<button class="btn btn-success">
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Cash Flow Hari Ini</div>
				<div class="panel-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label class="g-sm-3 control-label">
								Jumlah Uang 
							</label>
							<div class="g-sm-7">
								<p type="text" class="form-control-static">Rp 2.200.000</p>
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
							<?php for($fi=0; $fi<10; $fi++){?>
							<tr>
								<td>
									<?php echo($fi + 1);?>
								</td>
								<td>
									ねこちゃん
								</td>
								<td>
									<?php echo(9000000 - $fi);?>
								</td>
							</tr>
							<?php } ?>
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
							<?php for($fi=0; $fi<10; $fi++){?>
							<tr>
								<td>
									<?php echo($fi + 1);?>
								</td>
								<td>
									ねこちゃん
								</td>
							</tr>
							<?php } ?>
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
						<?php for($fi=0; $fi<10; $fi++){?>
						<tr>
							<td>
								<?php echo($fi + 1);?>
							</td>
							<td>
								ねこちゃん
							</td>
						</tr>
						<?php } ?>
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
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
        	title: {
        		text: 'Rupiah'
        	},
        	labels: {
        		formatter: function () {
        			//return this.value / 1000 + 'k';
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
        	data: [0, 30100200,20100200, 24100200, 36100200, 
        	10100200,30100200,20100200, 38100200, 9100200,
        	15100200, 38100200, 9100200, 23100200, 22100200, 
        	10100200, 30100200,20100200, 24100200, 36100200, 
        	10100200,30100200,20100200, 38100200, 9100200,
        	15100200, 38100200, 9100200, 23100200, 22100200,
        	0 
        	]
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
                    return this.value; // clean, unformatted number for year
                }
            }
        },
        yAxis: {
        	title: {
        		text: 'Rupiah'
        	},
        	labels: {
        		formatter: function () {
        			//return this.value / 1000 + 'k';
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
        	data: [0, 30100200,20100200,
        	24100200, 36100200, 10100200,
        	15100200, 38100200, 9100200,
        	23100200, 22100200, 39100200]
        }]
    });
});
</script>
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
				<?php for($fi=0; $fi<10; $fi++){?>
				<tr>
					<td>
						<?php echo($fi + 1);?>
					</td>
					<td>
						ねこちゃん
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
</div>

<script>

</script>
@stop
