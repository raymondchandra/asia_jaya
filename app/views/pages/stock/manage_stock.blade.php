@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Daftar Stok Produk
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>

			<div>
				<table class="table table-bordered table-hover ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" width="110">
								<a href="javascript:void(0)">Produk</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Nama Produk</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Modal</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Min.</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Jual</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Stok Toko</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Stok Gudang</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Type</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Deleted</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="200">Print</th>
						</thead>
						<thead>
							<tr>
								
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
								<td></td>
								
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
										<span class="f_cell_nama_produk" style="line-height: 30px;">Tas Trendy</span>
										<input type="text" class="f_cell_nama_produk_input form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span id="f_cell_harga_modal" style="line-height: 30px;" data-modal="400000">IDR 400.000</span>
										<input type="text" id="f_cell_harga_modal_input" class=" form-control input-sm hidden" style=""/>
										
									</td>
									<td>
										IDR 500.000
									</td>
									<td>
										IDR 600.000
									</td>
									<td>
										30
									</td>
									<td>
										79
									</td>
									<td>
										Type
									</td>
									<td>
										Deleted
									</td>
									<td>
										<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="">Toko</button>
										<button class="btn btn-success btn-xs" data-toggle="modal" data-target="">Customer</button>
										<!-- Button trigger modal class ".alertYesNo" -->
									</td>
								</tr> 
								<?php }
								?>
								<script>
								$( 'body' ).on( "click",'.f_cell_nama_produk', function() {
									$(this).siblings('.f_cell_nama_produk_input').removeClass('hidden');
									$(this).siblings('.f_cell_nama_produk_input').val($(this).text());
									$(this).addClass('hidden');
								});

								$('.f_cell_nama_produk_input').keypress(function(e) {
									if(e.which == 13) {
										$(this).siblings('.f_cell_nama_produk').text($(this).val());
										$(this).siblings('.f_cell_nama_produk').removeClass('hidden');
										$(this).addClass('hidden');
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

		@include('pages.transaction.pop_up_detail_transaction')

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
</script>
@stop
