@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<ol class="breadcrumb">
					<li class="active">Retur</li>
				</ol>
				<h3 style="">
					Kelola Retur
					<a class="btn btn-success pull-right" href="{{URL::to('test/search_return')}}">
						<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Retur
					</a>
				</h3>
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
						<th class="table-bordered" width="110">
							<a href="javascript:void(0)">Order ID</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" style="width: 180px;">
							<a href="javascript:void(0)">Type</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Solution</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">trade_product_id</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">difference</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">created_at</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="100">Command</th>
					</tr>
				</thead>
				<thead>
					<tr>
						
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
						<!--<td></td>-->
						
					</tr>
				</thead>
				<tbody>
					
					<?php for($i=0; $i<30; $i++){
						?>
						<tr> 
							<td>
								824739
							</td>
							<td>
								tuker barang sama/balikin uang/tuker barang beda 
							</td>
							<td>
								masukin gudang / masukin ke daftar obral
							</td>
							<td>
								4353453464573576
							</td>
							<td>
								-90000
							</td>
							<td>
								tanggal
							</td>
							<td>
								<button id="" class="btn btn-info btn-xs view_detail_button"  data-toggle="modal" data-target="">Solusi</button>
							</td>
						</tr> 
						<?php }
						?>
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
						</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	@include('pages.return.pop_up_add_return')

	<script>

	</script>
	@stop
