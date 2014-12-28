@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3>
					Tambah Stock Baru

					<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_stock" style="">
						<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Add New Stock
					</button>-->
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>

			<div>



				<form class="form-horizontal" role="form">
					
					<div class="container">
						<div class="g-sm-12">


							<h3>Non-ser atau Seri?</h3>
							<label class="radio-inline">
								<input type="radio" name="seri_or_not" id="rad_non_seri" value="0" checked> Non-seri
							</label>
							<label class="radio-inline">
								<input type="radio" name="seri_or_not" id="rad_seri" value="1"> Seri
							</label>

							<h3>Masukan Stock</h3>
							<div class="panel panel-default f_non_seri">
								<div class="panel-heading">Tambah Stock Produk Non-seri</div>
								<div class="panel-body">

									<div class="form-group">
										<label class="g-sm-3 control-label">Kode Produk</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Nama Produk</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Warna Produk</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Modal</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Minimal</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Jual</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Stok Toko</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Stok Gudang</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Foto</label>
										<div class="g-sm-7">
											<input type="file" >
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default f_seri hidden">
								<div class="panel-heading">Tambah Stock Produk Seri</div>
								<div class="panel-body">

									<div class="form-group">
										<label class="g-sm-2 control-label">Cari Barang</label>
										<div class="g-sm-8">
											<input type="text" class="form-control">
										</div>
										<div class="g-sm-2">
											<button type="button" class="btn btn-success">
												<span class="glyphicon glyphicon-plus"></span>
											</button>
										</div>
									</div>
										<table class="table table-bordered">
											<tbody>
												<?php for($_i=0; $_i < 10; $_i++){ ?>
												<tr>
													<td>
														<img src='' width='75' height='75' class='pull-left' >
													</td>
													<td>
														product_code
													</td>
													<td>
														name
													</td>
													<td>
														color
													</td>
													<td>
														stock_shop
													</td>
													<td>
														stock_storage
													</td>
													<td>
														price
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>


									<hr>
									<h4>
										Daftar Barang Dalam Seri ini 
									</h4>
									<table class="table table-bordered">
										<tbody>
											<?php for($_i=0; $_i < 3; $_i++){ ?>
											<tr>
												<td>
													product_code
												</td>
												<td>
													name
												</td>
												<td>
													color
												</td>
												<td>
													stock_shop
												</td>
												<td>
													stock_storage
												</td>
												<td>
													price
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<script>
							$('body').on('click','[name="seri_or_not"]',function(){
								if($(this).val() == 0){
									$('.f_non_seri').removeClass('hidden');
									$('.f_seri').addClass('hidden');
								}else{
									$('.f_non_seri').addClass('hidden');
									$('.f_seri').removeClass('hidden');
								}
							})
							</script>
						</div>

					</div>
					<div class="container">
						<div class="g-sm-12">
							<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
@stop