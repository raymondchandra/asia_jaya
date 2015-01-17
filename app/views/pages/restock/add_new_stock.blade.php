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


						<!--<h3>Non-seri atau Seri?</h3>
						<label class="radio-inline">
							<input type="radio" name="seri_or_not" id="rad_non_seri" value="0" checked> Non-seri
						</label>
						<label class="radio-inline">
							<input type="radio" name="seri_or_not" id="rad_seri" value="1"> Seri
						</label>-->

						<h3>Masukan Stock</h3>
						<div class="panel panel-default f_non_seri">
							<div class="panel-heading">Tambah Stock Produk</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="form_non_series">
									<!-- <div class="form-group">
										<label class="g-sm-2 control-label">Kode Barang</label>
										<div class="g-sm-4">
											<input type="text" class="form-control" id="kode_produk">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-2 control-label">Merek Barang <span style="font-weight: 300;">(opt)</span></label>
										<div class="g-sm-4">
											<input type="text" class="form-control" id="nama_produk">
										</div>
									</div>-->
									<div class="">
										<div class="form-group">
											<label class="g-sm-2 control-label"></label>
											<div class="g-sm-10">
												<span class="clearfix"></span>
												<!--<div class="pad" data-jsfiddle="example1"> -->

												<div id="example1" class="handsontable" style="float: left"> </div>
												<table class="table table-bordered" style="float: left; width: 200px;">
													<thead>
														<tr>
															<th style="padding: 0px; height: 26px; text-align: center">
																Gambar
															</th>
														</tr>
													</thead>
													<tbody class="f_tbody_product_img_container">

														@for($_n = 0; $_n < 15; $_n++)

														<tr style="height: 23px;">
															<td style="padding: 0px;">
																<input accept="image/*" type="file" id="product_foto_{{ $_n }}" class="product_foto_{{ $_n }}">
															</td>
														</tr>

														@endfor
													</tbody>
												</table>

												<!--</div>-->
												<script>
												<?php $sidebar_i = 0; ?>
												var data = [ 
												@for($sidebar_i = 1; $sidebar_i <= 15; $sidebar_i++)
												{
													kode_barang: "-",
													merek_barang: "-",
													warna: "-",
													harga_modal: "-",
													harga_min: "-",
													harga_jual: "-",
													stock_shop: "-",
													stock_storage: "-",
													command: '' 
															+ '<input accept="image/*" type="file" id="product_foto_'+count+'" class="product_foto">'
															+ ''
												},
 												@endfor


												];

 												var count = {{$sidebar_i-1 }}
												var save = document.getElementById('save'); 
												 $("#example1").handsontable({
													data: data,
				  									enterMoves: {row: 1, col: 0},
													//startRows: 10,
													columns: [
														       {data: "kode_barang", renderer: "html"},
														      {data: "merek_barang", renderer: "html"},
														      {data: "warna", renderer: "html"},
														      {data: "harga_modal", renderer: "html"},
														      {data: "harga_min", renderer: "html"},
														      {data: "harga_jual", renderer: "html"},
														      {data: "stock_shop", renderer: "html"},
														      {data: "stock_storage", renderer: "html"},
														      //{data: "command", renderer: "html"},
														      ],


				    								colWidths: [100, 100, 80,70, 70, 70, 70,70],
													//rowHeaders: true,
													colHeaders: ["Kode Barang","Merek Barang","Warna","H. Modal","H. Min.","H. Jual", "Stok Toko", "Stok Gdg"],
													minSpareRows: true,
													contextMenu: true,
													cells : function(row, col, prop) {
												      	var cellProperties = {};

												      	if (col == 3) {
												      		cellProperties.readOnly = true;
												      	}
												      	else
												      	{
												      		cellProperties.readOnly = false;
												      	}

												      	return cellProperties;
												      },
													afterChange: function (change, source) {
														
															
										      	var ht = $('#example1').handsontable('getInstance');
										      	var coordinate = ht.getSelected();

										      	if(typeof coordinate=='undefined'){
										      	}else{
										      		var rowArr 			= ht.getDataAtRow(coordinate[0]);
										      	}
 
														if(source == 'edit')
														{ 
															if(coordinate[0] == count+1){
																count++;
																trhtml = '<tr style="height: 23px;">'
																trhtml += '<td style="padding: 0px;">'
																trhtml += '<input accept="image/*" type="file" id="product_foto_'+count+'" class="product_foto_'+count+'">'
																trhtml += '</td>'
																trhtml += '</tr>'

																$('.f_tbody_product_img_container').append(trhtml);
															//$('#example1').handsontable('setDataAtCell', count, 3, '<input accept="image/*" type="file" id="" class="product_foto">',"alter");
															return ;
															}
															//alert(coordinate[0]);
														}
														//alert(count);
														//alert(coordinate[0]);
														//count++;
 
														//$('#example1').handsontable('setDataAtCell', 14, 3, "command","alter");


														//return ;

													} 
													});


												Handsontable.Dom.addEvent(save,'click', function (){
													/*$.ajax(
														"json/save.json",
														'POST',
														function (res) {

															var response = JSON.parse(res.response);
															if (response.result === 'ok') {
																exapmleConsole.innerText = 'Data saved';
															}
															else {
																exapmleConsole.innerText = 'Save error';
															}
														},
													    JSON.stringify({"data": hot1.getData()}) //returns all cells' data
													    );*/
												});

											
												</script>
												<!--<table class="table table-bordered" style="margin-top: 300px;">
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
															<th>
																Foto
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
																<input type="text" class="form-control ff_num_only" id="stok_toko_1">
															</td>
															<td>
																<input type="text" class="form-control ff_num_only" id="stok_gudang_1">
															</td>
															<td>
																<input accept="image/*" type="file" id="foto_produk_1" class="product_foto">
															</td>
														</tr>
													</tbody>
												</table>--> 

											</div>

											<!--<div class="g-sm-1">
												<button type="button" class="btn btn-danger btn-sm  f_delete_form_warna pull-right">
													<span class="glyphicon glyphicon-minus"></span>
												</button>
												<button type="button" class="btn btn-success btn-sm f_add_form_warna pull-right">
													<span class="glyphicon glyphicon-plus"></span>
												</button>
											</div>-->
										</div>
										
									</div>
									<!--<div class="form-group">
										<label class="g-sm-2 control-label ff_num_only">Harga Modal</label>
										<div class="g-sm-4"> 
											<div class="input-group">
												<input type="text" class="form-control" id="harga_modal" aria-describedby="basic-ribuan">
												<span class="input-group-addon" id="basic-ribuan">.000</span>

											</div> 
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-2 control-label ff_num_only">Harga Minimal</label>
										<div class="g-sm-4">
											<div class="input-group">
												<input type="text" class="form-control" id="harga_minimal" aria-describedby="basic-ribuan">
												<span class="input-group-addon" id="basic-ribuan">.000</span>

											</div> 
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-2 control-label ff_num_only">Harga Jual</label>
										<div class="g-sm-4">
											<div class="input-group">
												<input type="text" class="form-control" id="harga_jual" aria-describedby="basic-ribuan">
												<span class="input-group-addon" id="basic-ribuan">.000</span>

											</div> 
										</div>
									</div>-->
									<!--<div class="form-group">
										<label class="g-sm-2 control-label">Stok Toko</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="stok_toko">
										</div>
									</div>
									<div class="form-group">
										<label class="g-sm-2 control-label">Stok Gudang</label>
										<div class="g-sm-7">
											<input type="text" class="form-control" id="stok_gudang">
										</div>
									</div>-->
									<!--
									<div class="form-group">
										<label class="g-sm-2 control-label">Foto</label>
										<div class="g-sm-7">
											<input type="file" id="foto">
										</div>
									</div>
								-->
								<div class="form-group">
									<label class="g-sm-2 control-label"></label>
									<div class="g-sm-7">
										<button type="button" class="btn btn-success" name="save" id="button_non_series">Add</button> 
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI -->
					<!-- SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI -->
					<!-- SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI SERI -->

					
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
	row_warna += '		<input type="text" class="form-control ff_num_only" id="stok_toko_'+i_warna+'">';
	row_warna += '	</td>';
	row_warna += '	<td>';
	row_warna += '		<input type="text" class="form-control ff_num_only" id="stok_gudang_'+i_warna+'">';
	row_warna += '	</td>';
	row_warna += '	<td>';
	row_warna += '		<input accept="image/*" type="file" id="foto_produk_'+i_warna+'" class="product_foto">'; 
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
	$fotos = [];
	$detailName = [];
	$total_stok_toko = 0;
	$total_stok_gudang = 0;
	$fileName = "";
	var count = $("#example1").handsontable('countRows');
	alert(count);
	$i_warna = 0;
	//($('#example1').handsontable('getDataAtCell', 15, 0));
	for(var i=0 ; i<count-1 ; i++)
	{
		if($('#example1').handsontable('getDataAtCell', i, 0) != "-")
		{
			$warna_produk[i+1] = $('#example1').handsontable('getDataAtCell', i, 0);
			$stok_toko[i+1] = $('#example1').handsontable('getDataAtCell', i, 1);
			$stok_gudang[i+1] = $('#example1').handsontable('getDataAtCell', i, 2);
			$total_stok_toko += parseInt($stok_toko[i]);
			$total_stok_gudang += parseInt($stok_gudang[i]);

			$fotoPath = $('#product_foto_'+i).val();
			alert($fotoPath);
			var arr = $fotoPath.split('\\');
			var arr2 = arr[arr.length-1].split('.');
			$fileName += $nama_produk+"-"+$warna_produk[i] + ",";
			$detailName[i+1] = "assets/product_img/" + $nama_produk+"-"+$warna_produk[i] + "." + arr2[arr2.length - 1];
			
			$i_warna++;
		}
	}
	$harga_modal = $('#harga_modal').val() * 1000;
	$harga_minimal = $('#harga_minimal').val() * 1000;
	$harga_jual = $('#harga_jual').val() * 1000;
	
	$fd = new FormData();
	for($i=0; $i<$i_warna; $i++)
	{
		$fd.append('file_'+$i, $('#product_foto_'+$i)[0].files[0]);
	}
	$fd.append('fileName', $fileName);
	$fd.append('count', $i_warna);
	
	$.ajax({
		url: '{{URL::route('gentry.upload_image_v2')}}', 	// Url to which the request is send
		type: "POST",             									// Type of request to be send, called as method
		data: $fd,		// Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       									// The content type used when sending data to the server.
		cache: false,             										// To unable request pages to be cached
		processData:false,        									// To send DOMDocument or non processed data file it is set to false
		success: function(data)   								// A function to be called if request succeeds
		{
			if(true)
			{		
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
						'photo' : $detailName,
						'i_warna' : $i_warna
					},
					success: function(response){
						alert(response);
						$('#kode_produk').val("");
						$('#nama_produk').val("");
						for($i=1; $i<=$count; $i++){
							$warna_produk[$i] = $('#warna_produk_'+$i).val("");
							$stok_toko[$i] = $('#stok_toko_'+$i).val("");
							$stok_gudang[$i] = $('#stok_gudang_'+$i).val("");
						}
						$('#harga_modal').val("");
						$('#harga_minimal').val("");
						$('#harga_jual').val("");
						$('#foto').val("");

						//$('.f_form_warna').append(row_warna);
					},error: function(xhr, textStatus, errorThrown){
						alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
						alert("responseText: "+xhr.responseText);
					}
				},'json');

	}
	},error: function(xhr, textStatus, errorThrown){
	alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
	alert("responseText: "+xhr.responseText);
	}
	});
	
});
</script>
<script>
$('body').on('click','.f_search_row_suggest',function(){
	trigger = true;
	if($('#'+ $(this).find('.f_sug_product_id').val() + '-' + $(this).find('.f_sug_product_color').text()).length)
	{

	}
	else
	{
		var row_search = '<tr id="' + $(this).find('.f_sug_product_id').val() + '-' + $(this).find('.f_sug_product_color').text() + '">';
		row_search += '<td width="92">';
		row_search += '		<img src="' + $(this).find('.f_sug_product_img').attr('src') + '" width="75" height="75" class="pull-left" >';
		row_search += '</td>';
		row_search += '<input type="hidden" class="f_sug_product_id" value="' + $(this).find('.f_sug_product_id').val() + '"/>';
		row_search += '<input type="hidden" class="f_sug_parent_product_id" value="' + $(this).find('.f_sug_parent_product_id').val() + '"/>';
		row_search += '<td>';
		row_search += 		$(this).find('.f_sug_product_code').text();
		row_search += '</td>';
		row_search += '<td>';
		row_search += 		$(this).find('.f_sug_product_name').text();
		row_search += '</td>';
		row_search += '<td>';
		row_search += 		$(this).find('.f_sug_product_color').text();
		row_search += '</td>';
		row_search += '<td width="150">';
		row_search += '<input tpye="text" class="form-control f_sug_input_quan ff_num_only" placeholder="Kuantitas (e.g: 1)">';
		row_search += '</td>';
		row_search += '<td>';
		row_search += '	<button type="button" class="btn btn-danger">';
		row_search += '		<span class="glyphicon glyphicon-remove f_row_remove"></span>';
		row_search += '	</button>';
		row_search += '</td>';
		row_search += '</tr>';

		$('.f_tbody_barang_seri').append(row_search);
	} 
});
</script>
<script>
$('body').on('keyup','#seri_cari_barang_input',function(){
	var trigger = false;
	$keyword = $('#seri_cari_barang_input').val();

	$.ajax({
		type: 'GET',
		url: '{{URL::route('david.getProductLiveSearch')}}',
		data: {
			'keyword' : $keyword
		},
		success: function(response){
			if(response['code'] == '404')
			{
					//gagal
					$data = "<tr><td> No Result Found </td></tr>";
					$('#searchContent').html($data);
				}
				else
				{
					//berhasil...foreach setiap barang
					$data = "";
					$.each(response['messages'], function( i, resp ) {

						$data = $data + "<tr style='cursor: pointer;' class='f_search_row_suggest'> <td width='92'>";
						$data = $data + "<img src='{{asset('"+resp.photo+"')}}' width='75' height='75' class='pull-left f_sug_product_img' > </td> <td class='f_sug_product_code'>";
						$data = $data + resp.product_code + "</td> <input type='hidden' class='f_sug_product_id' value='" + resp.id + "'/> <input type='hidden' class='f_sug_parent_product_id' value='" + resp.product_id + "'/><td class='f_sug_product_name'>";
						$data = $data + resp.name + "</td> <td class='f_sug_product_color'>";
						$data = $data + resp.color + "</td> <td>";
						$data = $data + resp.stock_shop + "</td> <td>";
						$data = $data + resp.stock_storage + "</td> </tr>";
						
					});
					if(trigger == false)
					{
						$('#cari_barang_seri_content').html($data);
					}
				}
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');

});

$('body').on('click','#add_seri_button',function(){
	$datas = "";
	$colorData = "";
	$product_id = "";
	$nama_produk = "";
	$(".f_tbody_barang_seri tr").each(function(i, v){
		$id = $(this).find('.f_sug_product_id').val();
		$quantity = $(this).children('td').find('.f_sug_input_quan').val();
		$product_ids = $(this).find('.f_sug_parent_product_id').val();
		$color = $(this).children('td')[3].innerText;
		$nama_produk = $(this).children('td')[2].innerText;
			/*
			$(this).children('td').each(function(ii, vv){
				if(ii == 1)
				{
					$name = vv.innerText;
				}
				
				if(ii == 2)
				{
					$color = vv.innerText;
				}
				
				if(ii == 3)
				{
					$quantity = vv.innerText;
				}
			});
	*/
	$datas += $id+"-"+$quantity+";";
	$colorData += $color+"-"; 
	$product_id = $product_ids;
});

	$colorData = $colorData.substr(0, $colorData.length-1);
		//$kode_produk = $('#kode_seri_input').val();
		//$nama_produk = $('#nama_seri_input').val();
		$warna_produk = [];
		$warna_produk[1] = $colorData;
		$stok_toko = [];
		$stok_toko[1] = 0;
		$stok_gudang = [];
		$stok_gudang[1] = 0;
		$total_stok_toko = 0;
		$total_stok_gudang = 0;
		
		//$harga_modal = $('#modal_seri_input').val();
		//$harga_minimal = $('#minimal_seri_input').val();
		//$harga_jual = $('#jual_seri_input').val();
		$fotoPath = $('#foto_seri_input').val();
		var arr = $fotoPath.split('\\');
		var arr2 = arr[arr.length-1].split('.');
		$foto = [];
		$foto[1] = "assets/product_img/"+$nama_produk+"-"+$warna_produk[1]+"."+arr2[arr2.length - 1];
		$fd = new FormData();
		$fd.append('file', $('#foto_seri_input')[0].files[0]);
		$fd.append('fileName', $nama_produk+"-"+$warna_produk[1]);
		
		$.ajax({
			url: '{{URL::route('gentry.upload_image')}}', 	// Url to which the request is send
			type: "POST",             									// Type of request to be send, called as method
			data: $fd,		// Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       									// The content type used when sending data to the server.
			cache: false,             										// To unable request pages to be cached
			processData:false,        									// To send DOMDocument or non processed data file it is set to false
			success: function(data)   								// A function to be called if request succeeds
			{
				alert(data);
				if(data == "Upload Success"){
					$.ajax({
						type: 'PUT',
						url: '{{URL::route('gentry.add_new_seri')}}',
						data: {
							'product_id' : $product_id,
							'color' : $warna_produk,
							'detail_stock_shop' : $stok_toko,
							'detail_stock_storage' : $stok_gudang,
							'photo' : $foto,
							'i_warna' : 1,
							'reference' : $datas,
							'seri' : 1
						},
						success: function(response){
							alert(response);
							$('#kode_produk').val("");
							$('#nama_produk').val("");
							for($i=1; $i<=$count; $i++){
								$warna_produk[$i] = $('#warna_produk_'+$i).val("");
								$stok_toko[$i] = $('#stok_toko_'+$i).val("");
								$stok_gudang[$i] = $('#stok_gudang_'+$i).val("");
							}
							$('#harga_modal').val("");
							$('#harga_minimal').val("");
							$('#harga_jual').val("");
							$('#foto').val("");

							//$('.f_form_warna').append(row_warna);
						},error: function(xhr, textStatus, errorThrown){
							alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
							alert("responseText: "+xhr.responseText);
						}
					},'json');
				}
				},error: function(xhr, textStatus, errorThrown){
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
					alert("responseText: "+xhr.responseText);
				}
				});
				});
				</script>
				<script>
				$('body').on('click','.f_row_remove',function(){
					$(this).closest('tr').remove();
				});


					/* -- button disabled error prevention -- */
					$('#kode_produk').keyup(function(){
						if( $(this).val() != '' ){
							$('#button_non_series').removeAttr('disabled');
						}
					});
					$('#kode_produk').keydown(function(){
						if( $(this).val() == '' ){
							$('#button_non_series').attr('disabled','disabled'); 
						}
					});



				</script>
@stop