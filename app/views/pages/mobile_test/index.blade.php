<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Admin</title>

	<!--Identity-->
	
	
	<!-- Style -->
	<link href="{{ asset('assets/css/all_mobile.css') }}" rel="stylesheet"><!-- {{ asset('assets/css/all.css') }} -->
	<link href="{{ asset('assets/js/datepicker/css/datepicker.css') }}" rel="stylesheet">
	<!--<link rel="icon" type="image/png" href="assets/img/favicon.png">--> <!-- {{ asset('assets/img/favicon.png') }} -->
	<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/mbf.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/datepicker/js/bootstrap-datepicker.js') }}"></script> -->
	<!-- <script src="{{ asset('assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script> -->

</head>
<body>
	<section class="s_super_container">
		<span  style="display: block; height: 50px; width: 100%; ">
		</span>
		<section class="s_left_display">
			<div class="container-fluid"> 
				<div class="row">
					<div class="s_sidebar_area" style="">	
						Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						"Lorem ipsum dolo				
					</div>					
					<div class="s_sidebar_close_area"  style="background-color: rgba(17,34,51,0.75);">	
						&nbsp;				
					</div>		
				</div>
			</div>
		</section>

		<section class="s_middle_display" style="height: auto;">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid" style="text-align: center;">
					<a href="javascript:void()" class="f_side_bar_tutup hidden pull-left" style="line-height:50px; font-size: 1.4em;">	
						<span class="glyphicon glyphicon-arrow-left"></span>	
					</a>						
					<a href="javascript:void()" class="f_side_bar_buka pull-left" style="line-height:50px; font-size: 1.4em;">	
						<span class="glyphicon glyphicon-tasks"></span>						
					</a>	
					<span style="line-height: 50px; text-transform: uppercase;">
						Jual
					</span>
					<a href="javascript:void()" id="f_add_new_order" class="pull-right" style="line-height:50px; font-size: 1.4em;">	
						<span class="glyphicon glyphicon-plus-sign"></span>						
					</a>	
				</div>
			</nav>
			<div class="container-fluid" style="">
				<div class="row">
					<div class="g-lg-12">
						<!-- Nav tabs -->
						<div class="sf_tab_orderan" style="overflow: auto;">
							<ul class="nav nav-tabs" role="tablist" style=""><!-- penting untuk urusan tabbing -->

								<!--START-->
								<li class="active"><a href="#table0" role="tab" data-toggle="tab">Order 0</a></li>
								<!--END-->

							</ul>
						</div>
						<!-- Tab panes -->
						<div class="tab-content sf_panel_orderan">


							<!--START-->
							<div class="tab-pane fade in active" id="table0">			 	
								<div style="padding: 10px 0px; overflow: hidden;">
									<span class="pull-left">

										<button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target=".pop_up_delete_table0">
											<span class="glyphicon glyphicon-remove"></span>
										</button>

											Tabel Pesanan ke-0
									</span>
									<!-- Button trigger modal -->
									<input type="hidden" value="0">
									<button class="btn btn-primary btn-sm pull-right tambah_barang_btn" data-toggle="modal" data-target="#pop_up_cari_barang">
										<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Barang
									</button>
								</div>
								<form class="form-horizontal" >
									<table class="table table-bordered table-striped" style="font-size: 0.8em">
										<thead>
											<tr>
												<th rowspan="2">
													Kode 
												</th>
												<th rowspan="2">
													Nama
												</th>
												<th rowspan="2">
													Warna 
												</th>
												<th rowspan="2">
													Qty. 
												</th>
												<th rowspan="2">
													Price
												</th>
											</tr>

										</thead>
										<tbody class="f_table_pesanan" id="pesanan_content_0">
											
										</tbody>
									</table>

									<div class="form-group">
										<label for="" class="control-label g-sm-6">Subtotal</label>
										<div class="g-sm-6">
											<p class="form-control-static" id="subtotal_text_0" placeholder="" >IDR 0</p>
										</div>
									</div>


									<div class="form-group">
										<div class="g-sm-12">
											<input type="hidden" value="0">
											<button type="button" class="btn btn-success btn-lg g-sm-12 finalisasi_btn" id="finalisasi_btn_0" data-toggle="modal" data-target="#pop_up_finalisasi_belanja">
												Finalisasi Belanja
											</button>
										</div>
									</div>
								</form>
							</div>
							<!-- Modal "alert"-->
							<div class="modal fade pop_up_delete_table0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Alert!</h4>
								  </div>
								  <div class="modal-body"  style="text-align: center;">
										Apakah Anda yakin ingin menghapus Tabel Orderan ke-0?
								  </div>
								  <div class="modal-footer" style="text-align: center;">
									<button type="button" class="btn btn-danger f_closer" data-dismiss="modal" id="table0">Ya</button>
									<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>

								  </div>
								</div>
							  </div>
							</div>
							<!--END-->



						</div>

						<script>
						$(function () {
							$('#myTab a:last').tab('show')
						})
						</script>
						<script>
							$('body').on('click','.f_closer',function(){
								var ids = $(this).attr('id');
								//alert(ids);	
								$('#'+ids+'').remove();
								$('[href="#'+ids+'"]').parent().remove();
								$('[href="#'+ids+'"]').remove();
								$('#'+ids+'').removeClass('active');

							});
						</script>
						<style>
						.f_table_pesanan > tr:active > td {
							background-color: #E8CD02 !important;
						}
						</style>
					</div>
				</div>
			</div>
		</section>
	</section>



	<!-- Modal Search Barang-->
	@include('pages.mobile_test.pop_up_cari_barang')
	<!-- Modal Edit Barang-->
	@include('pages.mobile_test.pop_up_edit_barang')
	<!-- Modal Finalisasi Belanja-->
	@include('pages.mobile_test.pop_up_finalisasi_belanja')


	<script type="text/javascript">
		var height = $(window).height();
		var width = $(window).width();
		var inc = 0;
		var tab_width = $('.sf_tab_orderan > ul').children('li').width();
		var tab_container_width = $('.sf_tab_orderan > ul').width();


		function updateSize(){
			$('.s_super_container').height(height);
			$('.s_super_container').width(width);
			$('.s_left_display').height(height);
			$('.s_left_display').width(width);

			$('.s_middle_display').width(width);
			$('.sf_tab_orderan').width(width);
			$('.sf_tab_orderan > ul').width(tab_container_width);

			$('.s_left_display').css('left',-width);

			$('.s_sidebar_area').height(height);
			$('.s_sidebar_close_area').height(height);
			
			
		};
		$(document).ready(updateSize);
		$(window).resize(updateSize);

		$('body').on('click', '.f_side_bar_buka', function(){
			$('.s_left_display').animate({"left": '0px'},330, 'easeInOutExpo');
			$('.f_side_bar_tutup').removeClass('hidden').addClass('show');
			$('.f_side_bar_buka').addClass('hidden').removeClass('show');

		});

		$('body').on('click', '.f_side_bar_tutup', function(){
			$('.s_left_display').animate({"left": -width},330, 'easeInOutExpo');
			$('.f_side_bar_tutup').addClass('hidden').removeClass('show');
			$('.f_side_bar_buka').removeClass('hidden').addClass('show');
		});

		$('body').on('click', '.s_sidebar_close_area', function(){
			$('.s_left_display').animate({"left": -width},330, 'easeInOutExpo');
			$('.f_side_bar_tutup').addClass('hidden').removeClass('show');
			$('.f_side_bar_buka').removeClass('hidden').addClass('show');
		});

		$('body').on('click', '#f_add_new_order', function() {
			$('.sf_tab_orderan > ul').width(tab_container_width+=tab_width);

			inc++;
			var tab ='<li><a href="#table'+inc+'" role="tab" data-toggle="tab">Order '+inc+'</a></li>';
			$('.sf_tab_orderan > ul').append(tab);

			var tab_panel ='<div class="tab-pane fade in" id="table'+ inc +'">			 	                                                                                           ';
			tab_panel+='	<div style="padding: 10px 0px; overflow: hidden;">                                                                                                             ';
			tab_panel+='		<span class="pull-left">                                                                                                                                   ';
			tab_panel+='                                                                                                                                                                  ';
			tab_panel+='			<button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target=".pop_up_delete_table'+ inc +'">                                  ';
			tab_panel+='				<span class="glyphicon glyphicon-remove"></span>                                                                                                   ';
			tab_panel+='			</button>                                                                                                                                              ';
			tab_panel+='                                                                                                                                                                  ';
			tab_panel+='			Tabel Pesanan ke-'+ inc +'                                                                                                                                          ';
			tab_panel+='		</span>                                                                                                                                                    ';
			tab_panel+='		<input type="hidden" value='+ inc +'>                                                                                                                              ';
			tab_panel+='		<button class="btn btn-primary btn-sm pull-right tambah_barang_btn" data-toggle="modal" data-target="#pop_up_cari_barang">                                                   ';
			tab_panel+='			<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Barang                                                                        ';
			tab_panel+='		</button>                                                                                                                                                  ';
			tab_panel+='	</div>                                                                                                                                                         ';
			tab_panel+='	<form class="form-horizontal" >                                                                                                                                ';
			tab_panel+='		<table class="table table-bordered table-striped" style="font-size: 0.8em">                                                                                ';
			tab_panel+='			<thead>                                                                                                                                                ';
			tab_panel+='				<tr>                                                                                                                                               ';
			tab_panel+='					<th rowspan="2">                                                                                                                               ';
			tab_panel+='						Kode                                                                                                                                       ';
			tab_panel+='					</th>                                                                                                                                          ';
			tab_panel+='					<th rowspan="2">                                                                                                                               ';
			tab_panel+='						Nama                                                                                                                                       ';
			tab_panel+='					</th>                                                                                                                                          ';
			tab_panel+='					<th rowspan="2">                                                                                                                               ';
			tab_panel+='						Warna                                                                                                                                      ';
			tab_panel+='					</th>                                                                                                                                          ';
			tab_panel+='					<th rowspan="2">                                                                                                                               ';
			tab_panel+='						Qty.                                                                                                                                       ';
			tab_panel+='					</th>                                                                                                                                          ';
			tab_panel+='					<th rowspan="2">                                                                                                                               ';
			tab_panel+='						Price                                                                                                                                      ';
			tab_panel+='					</th>                                                                                                                                          ';
			tab_panel+='				</tr>                                                                                                                                              ';
			tab_panel+='                                                                                                                                                                  ';
			tab_panel+='			</thead>                                                                                                                                               ';
			tab_panel+='			<tbody class="f_table_pesanan" id="pesanan_content_' + inc + '">                                                                                                                        ';
			tab_panel+='                                                                                                                                                                  ';
			tab_panel+='			</tbody>                                                                                                                                               ';
			tab_panel+='		</table>                                                                                                                                                   ';
			tab_panel+='                                                                                                                                                                  ';
			tab_panel+='		<div class="form-group">                                                                                                                                   ';
			tab_panel+='			<label for="" class="control-label g-sm-6">Subtotal</label>                                                                                            ';
			tab_panel+='			<div class="g-sm-6">                                                                                                                                   ';
			tab_panel+='				<p class="form-control-static" placeholder="" id= "subtotal_text_' + inc + '" >IDR 0</p>                                                                                      ';
			tab_panel+='			</div>                                                                                                                                                 ';
			tab_panel+='		</div>                                                                                                                                                     ';
			tab_panel+='		<div class="form-group">                                                                                                                                   ';
			tab_panel+='			<div class="g-sm-12">                                                                                                                                  ';
			tab_panel+='				<input type="hidden" value="' + inc + '">                                                                                                                                      ';
			tab_panel+='				<button type="button" class="btn btn-success btn-lg g-sm-12 finalisasi_btn" id="finalisasi_btn_' + inc + '" data-toggle="modal" data-target="#pop_up_finalisasi_belanja">                         ';
			tab_panel+='					Finalisasi Belanja                                                                                                                              ';
			tab_panel+='				</button>                                                                                                                                        ';
			tab_panel+='			</div>                                                                                                                                                 ';
			tab_panel+='		</div>                                                                                                                                                     ';
			tab_panel+='	</form>                                                                                                                                                        ';
			tab_panel+='</div>                                                                                                                                                            ';
			tab_panel+='<!-- Modal -->                                                                                                                                             ';
			tab_panel+='<div class="modal fade pop_up_delete_table'+ inc +'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">                               ';
			tab_panel+='	<div class="modal-dialog">                                                                                                                                     ';
			tab_panel+='		<div class="modal-content">                                                                                                                                ';
			tab_panel+='			<div class="modal-header">                                                                                                                             ';
			tab_panel+='				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>        ';
			tab_panel+='				<h4 class="modal-title" id="myModalLabel">Alert!</h4>                                                                                              ';
			tab_panel+='			</div>                                                                                                                                                 ';
			tab_panel+='			<div class="modal-body"  style="text-align: center;">                                                                                                  ';
			tab_panel+='				Apakah Anda yakin ingin menghapus Tabel Orderan ke-'+ inc +'?                                                                                               ';
			tab_panel+='			</div>                                                                                                                                                 ';
			tab_panel+='			<div class="modal-footer" style="text-align: center;">                                                                                                 ';
			tab_panel+='				<button type="button" class="btn btn-danger f_closer" data-dismiss="modal" id="table'+ inc +'">Ya</button>                                         ';
			tab_panel+='				<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>                                                                  ';
			tab_panel+='                                                                                                                                                                  ';
			tab_panel+='			</div>                                                                                                                                                 ';
			tab_panel+='		</div>                                                                                                                                                     ';
			tab_panel+='	</div>                                                                                                                                                         ';
			tab_panel+='</div>                                                                                                                                                            ';

			$('.sf_panel_orderan').append(tab_panel);

			
		});

	</script>
	<script>
		function pop_up_edit_barang(n){
			//alert(n);
		};

		$('body').on('click','.f_table_pesanan > tr',function(){
			$row_id = $(this).attr('id');
			$tab_id = $row_id.split('_')[2];
			$min_price = $('#hidden_'+$row_id).val();
			$code = $('#code_'+$row_id).text();
			$nama = $('#name_'+$row_id).text();
			$warna = $('#color_'+$row_id).text();
			$quantity = $('#quantity_'+$row_id).text();
			$harga = $('#price_'+$row_id).text();
			
			$a = parseInt(toAngka($harga));
			$b = parseInt($quantity);
			$total = $a*$b;
			
			$('#edit_code').text($code);
			$('#edit_nama').text($nama);
			$('#edit_warna').text($warna);
			$('#f_hsatuan_qty').val(toAngka($harga));
			$('#f_edit_qty').val($quantity);
			$('#f_subtotal_edit').text("IDR " + $total);
			$('#rowRep').val($row_id);
			$('#tabRep').val($tab_id);
			$('#minPrice').val($min_price);
			$('#currentTotal').val($total);
			
			$('.f_slider_alert').addClass('hidden');
			
			//pop_up_edit_barang(n);
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
	<!--engine-->
	
	<script>
		$('body').on('click','.tambah_barang_btn',function(){
			$('#tableRep').val($(this).prev().val());
			//$('#searchContent').html("");
			$('#barang_text_box').val("");
		});
		
		$('body').on('click','.finalisasi_btn',function(){
			$repId = $(this).prev().val();
			
			$.ajax({
				type: 'GET',
				url: '{{URL::route('david.get_tax')}}',
				data: {
					
				},
				success: function(response){
					//alert(response.messages.amount);
					$('#tableReps').val($repId);
					$('#total_text').text($('#subtotal_text_'+$repId).text());
					$('#total_biaya_text').text($('#subtotal_text_'+$repId).text());
					$('#f_nama_pelanggan').val("");
					$('#transaction_tax').val(response.messages.amount)
				},error: function(xhr, textStatus, errorThrown){
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
					alert("responseText: "+xhr.responseText);
				}
			},'json');
		});
		
		$('body').on('click','.table_row',function(){
			$currentPrice = ($(".table_row td")[4].innerText);
			
		});
	</script>
</body>
</html> 