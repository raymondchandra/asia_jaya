@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Kelola Retur
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->
			<div class="row">
				<div class="g-lg-12">

					<table class="table table-bordered">
						<thead class="table-bordered">
							<tr>
								<th class="table-bordered" width="110">
									<a href="javascript:void(0)">Order ID</a>
									<a href="javascript:void(0)">
										<span class="glyphicon glyphicon-sort" style="float: right;"></span>
									</a>
								</th>
								<th class="table-bordered" style="width: 137px;">
									<a href="javascript:void(0)">Tipe</a><!-- balik duit, tuker barang, tuker barang harga beda -->
									<a href="javascript:void(0)">
										<span class="glyphicon glyphicon-sort" style="float: right;"></span>
									</a>
								</th>
								<th class="table-bordered" style="width: 180px;">
									<a href="javascript:void(0)">Status</a>
									<a href="javascript:void(0)">
										<span class="glyphicon glyphicon-sort" style="float: right;"></span>
									</a>
								</th>
								<th class="table-bordered">
									<a href="javascript:void(0)">Warna</a>
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
									<a href="javascript:void(0)">Deleted</a>
									<a href="javascript:void(0)">
										<span class="glyphicon glyphicon-sort" style="float: right;"></span>
									</a>
								</th>
							</tr>
						</thead>
						<thead>
							<tr>
								
								<td><input type="text" class="form-control input-sm"></td>
								<td></td>
								<td><input type="text" class="form-control input-sm"></td>
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
										<img src="" width="120" height="120">
									</td>
									<td>
										<span class="f_excel_xlabel f_cell_nama_produk" style="line-height: 30px;">Tas Trendy</span>
										<input type="text" class="f_excel_xinput f_cell_nama_produk_input form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" style="line-height: 30px;">Cyan</span>
										<input type="text" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="f_cell_harga_modal" style="line-height: 30px;" data-modal="400000">400000</span>
										<input type="text" id="f_cell_harga_modal_input" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">500000</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">600000</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">30</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">79</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										Deleted
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
		</div>
	</div>

	<script>

	</script>
	@stop
