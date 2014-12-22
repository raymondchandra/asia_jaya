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
				<div class="panel-heading">Top 10 Buyers Bulan Ini</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
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
		</div>
		<div class="g-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">Statistik Transaksi Bulan Ini</div>
				<div class="panel-body">
					<script type="text/javascript">
					$(function () {
					    $('#container').highcharts({
					        chart: {
					            zoomType: 'x'
					        },
					        title: {
					            text: 'Income Toko Asia Jaya Bulan Ini'
					        },
					        subtitle: {
					            text: document.ontouchstart === undefined ?
					                    'Click and drag in the plot area to zoom in' :
					                    'Pinch the chart to zoom in'
					        },
					        xAxis: {
					            type: 'datetime',
					            minRange: 30 * 24 * 3600000 // fourteen days
					        },
					        yAxis: {
					            title: {
					                text: 'Rupiah'
					            }
					        },
					        legend: {
					            enabled: false
					        },
					        plotOptions: {
					            area: {
					                fillColor: {
					                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
					                    stops: [
					                        [0, Highcharts.getOptions().colors[0]],
					                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
					                    ]
					                },
					                marker: {
					                    radius: 2
					                },
					                lineWidth: 1,
					                states: {
					                    hover: {
					                        lineWidth: 1
					                    }
					                },
					                threshold: null
					            }
					        },

					        series: [{
					            type: 'area',
					            name: 'Income',
					            pointInterval: 24 * 3600 * 1000, //perday
					            pointStart: Date.UTC(2014, 0, 1),
					            data: [
					                8446000, 8445000, 8444000, 8451000,    8418000, 8264000,    8258000, 8232000,    8233000, 8258000,
					                8283000, 8278000, 8256000, 8292000,    8239000, 8239000,    8245000, 8265000,    8261000, 8269000,
					                8273000, 8244000, 8244000, 8172000,    8139000, 8146000,    8164000, 8200000,    8269000, 8269000
					            ]
					        }]
					    });
					});
					</script>
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

				</div>
			</div>
		</div>

		
	</div>
</div>

<script>

</script>
@stop
