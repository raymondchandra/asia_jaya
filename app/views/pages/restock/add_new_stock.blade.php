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



				

				<div class="container">
					<div class="g-sm-12">


						<h3>Non-seri atau Seri?</h3>
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
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="form_non_series">
									<div class="form-group">
										<label class="g-sm-3 control-label">Kode Produk</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="kode_produk">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Nama Produk</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="nama_produk">
										</div>
									</div>
									<div class="">
										<div class="form-group">
											<label class="g-sm-3 control-label"></label>
											<div class="g-sm-6">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>
																No.
															</th>
															<th>
																Warna
															</th>
															<th>
																Stok Toko
															</th>
															<th>
																Stok Gudang
															</th>
														</tr>
													</thead>
													<tbody class="f_form_warna">
														<tr>
															<td>
																<span style="line-height:34px;">1</span>
															</td>
															<td>
																<input type="text" class="form-control" id="warna_produk_1">
															</td>
															<td>
																<input type="text" class="form-control" id="stok_toko_1">
															</td>
															<td>
																<input type="text" class="form-control" id="stok_gudang_1">
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="g-sm-1">
												<button type="button" class="btn btn-danger btn-sm  f_delete_form_warna pull-right">
													<span class="glyphicon glyphicon-minus"></span>
												</button>
												<button type="button" class="btn btn-success btn-sm f_add_form_warna pull-right">
													<span class="glyphicon glyphicon-plus"></span>
												</button>
											</div>
										</div>
										
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Modal</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="harga_modal">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Minimal</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="harga_minimal">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Jual</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="harga_jual">
										</div>
									</div>
									<!--<div class="form-group">
										<label class="g-sm-3 control-label">Stok Toko</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="stok_toko">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Stok Gudang</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="stok_gudang">
										</div>
									</div>-->
									<div class="form-group">
										<label class="g-sm-3 control-label">Foto</label>
										<div class="g-sm-7">
											<input type="file" id="foto">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label"></label>
										<div class="g-sm-7">
											<button type="button" class="btn btn-success" id="button_non_series">Add</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="panel panel-default f_seri hidden">
							<div class="panel-heading">Tambah Stock Produk Seri</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form">

									<div class="form-group">
										<label class="g-sm-2 control-label">Cari Barang</label>
										<div class="g-sm-8">
											<input type="text" class="form-control">
										</div>
										<div class="g-sm-2">
											<!--<button type="button" class="btn btn-success">
												Search
											</button>-->
										</div>
									</div>
									<table class="table table-bordered table-striped">
										<tbody>
											<?php for($_i=0; $_i < 5; $_i++){ ?>
											<tr style="cursor: pointer;" class="f_search_row_suggest">
												<td width="92">
													<img src='' width='75' height='75' class='pull-left' >
												</td>
												<td class="f_sug_product_code">
													product_code
												</td>
												<td class="f_sug_product_name">
													name
												</td>
												<td class="f_sug_product_color">
													color
												</td>
												<td>
													stock_shop
												</td>
												<td>
													stock_storage
												</td>
												<td class="f_sug_product_price">
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
										<tbody class="f_tbody_barang_seri">
											<?php for($_i=0; $_i < 3; $_i++){ ?>
											<tr>
												<td width="92">
													<img src='' width='75' height='75' class='pull-left' >
												</td>
												<td>
													product
												</td>
												<td>
													name
												</td>
												<td>
													color
												</td>
												<!--<td>
													stock_
												</td>
												<td>
													stock_stor
												</td>-->
												<td>
													price
												</td>
												<td>
													<button type="button" class="btn btn-danger">
														<span class="glyphicon glyphicon-remove f_row_remove"></span>
													</button>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
									<hr>
									<h4>
										Identitas Seri
									</h4>
									<!--<div class="form-group">
										<label class="g-sm-3 control-label">Kode Produk</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>-->
									<div class="form-group">
										<label class="g-sm-3 control-label">Nama Seri</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>
									<!--<div class="form-group">
										<label class="g-sm-3 control-label">Warna Produk</label>
										<div class="g-sm-7">
											<input type="text" class="form-control">
										</div>
									</div>-->
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Modal</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" placeholder="akumulasi harga modal tiap produk">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Minimal</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" placeholder="akumulasi harga minimal tiap produk">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label">Harga Jual</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" placeholder="akumulasi harga jual tiap produk">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-3 control-label"></label>
										<div class="g-sm-7">
											<button type="submit" class="btn btn-success">Add</button>
										</div>
									</div>
									<!--<div class="form-group">
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
									</div>-->
								</form>
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
				

			</div>
		</div>
	</div>
</div>
<script>
	var i_warna = 1;
	$count = 1;

$('body').on('click','.f_add_form_warna',function(){
	
	i_warna++;
	$count++;

	var row_warna = '<tr>';
	row_warna += '<td>';
	row_warna += '		<span style="line-height:34px;">'+ i_warna +'</span>';
	row_warna += '	</td>';
	row_warna += '	<td>';
	row_warna += '		<input type="text" class="form-control" id="warna_produk_'+i_warna+'">';
	row_warna += '	</td>';
	row_warna += '	<td>';
	row_warna += '		<input type="text" class="form-control" id="stok_toko_'+i_warna+'">';
	row_warna += '	</td>';
	row_warna += '	<td>';
	row_warna += '		<input type="text" class="form-control" id="stok_gudang_'+i_warna+'">';
	row_warna += '	</td>';
	row_warna += '</tr>';

	$('.f_form_warna').append(row_warna);
});

$('body').on('click','.f_delete_form_warna',function(){
	$('.f_form_warna').children('tr:last').remove();
	if(i_warna == 0){
		i_warna = 0;
		$count = 0;
	}else{
		i_warna--;
		$count--;
	}
});

	
	$('body').on('click', '#button_non_series', function(){
		$kode_produk = $('#kode_produk').val();
		$nama_produk = $('#nama_produk').val();
		$warna_produk = [];
		$stok_toko = [];
		$stok_gudang = [];
		$total_stok_toko = 0;
		$total_stok_gudang = 0;
		for($i=1; $i<=$count; $i++){
			$warna_produk[$i] = $('#warna_produk_'+$i).val();
			$stok_toko[$i] = $('#stok_toko_'+$i).val();
			$stok_gudang[$i] = $('#stok_gudang_'+$i).val();
			$total_stok_toko += parseInt($stok_toko[$i]);
			$total_stok_gudang += parseInt($stok_gudang[$i]);
		}
		$harga_modal = $('#harga_modal').val();
		$harga_minimal = $('#harga_minimal').val();
		$harga_jual = $('#harga_jual').val();
		$foto = "http://localhost/asia_jaya/public/assets/product_img/"+$('#foto').val();
		
		//alert($total_stok_toko);
		
		//based on :  http://www.formget.com/ajax-image-upload-php/#
		$.ajax({
			url: '{{URL::route('gentry.upload_image')}}', 	// Url to which the request is send
			type: "POST",             									// Type of request to be send, called as method
			data: new FormData($('#form_non_series')[0]),		// Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       									// The content type used when sending data to the server.
			cache: false,             										// To unable request pages to be cached
			processData:false,        									// To send DOMDocument or non processed data file it is set to false
			success: function(data)   								// A function to be called if request succeeds
			{
				alert(data);
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		});
		
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('gentry.add_new_stock1')}}',
			data: {
				'product_code' : $kode_produk,
				'name' : $nama_produk,
				'modal_price' : $harga_modal,
				'min_price' : $harga_minimal,
				'sales_price' : $harga_jual,
				'stock_shop' : $total_stok_toko,
				'stock_storage' : $total_stok_gudang,
				'color' : $warna_produk,
				'detail_stock_shop' : $stok_toko,
				'detail_stock_storage' : $stok_gudang,
				'photo' : $foto,
				'i_warna' : i_warna
			},
			success: function(response){
				alert(response);
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
	});
</script>
<script>
$('body').on('click','.f_search_row_suggest',function(){
	
	
	var row_search = '<tr>';
	row_search += '<td width="92">';
	row_search += '		<img src="" width="75" height="75" class="pull-left" >';
	row_search += '</td>';
	row_search += '<td>';
	row_search += 		$(this).find('.f_sug_product_code').text();
	row_search += '</td>';
	row_search += '<td>';
	row_search += 		$(this).find('.f_sug_product_name').text();
	row_search += '</td>';
	row_search += '<td>';
	row_search += 		$(this).find('.f_sug_product_color').text();
	row_search += '</td>';
	row_search += '<td>';
	row_search += 		$(this).find('.f_sug_product_price').text();
	row_search += '</td>';
	row_search += '<td>';
	row_search += '	<button type="button" class="btn btn-danger">';
	row_search += '		<span class="glyphicon glyphicon-remove f_row_remove"></span>';
	row_search += '	</button>';
	row_search += '</td>';
	row_search += '</tr>';

	$('.f_tbody_barang_seri').append(row_search);
});
</script>
<script>
$('body').on('click','.f_row_remove',function(){
	$(this).closest('tr').remove();
});
</script>
@stop