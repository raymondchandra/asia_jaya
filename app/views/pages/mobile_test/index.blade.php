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

		<section class="s_middle_display">
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
								<li class="active"><a href="#0" role="tab" data-toggle="tab">Order 0</a></li>
							</ul>
						</div>
						<!-- Tab panes -->
						<div class="tab-content sf_panel_orderan">
							<div class="tab-pane fade in active" id="0">				
								<div style="padding: 10px 0px; overflow: hidden;">
									<span class="pull-left">
										Tabel Pesanan
									</span>
									<!-- Button trigger modal -->
									<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#pop_up_cari_barang">
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
													Warna 
												</th>
												<th rowspan="2">
													Qty. 
												</th>
												<th colspan="2">
													Stok
												</th>
												<th rowspan="2">
													Price
												</th>
											</tr>
											<tr>
												<th>
													Toko
												</th>
												<th>
													Gdg
												</th>
											</tr>

										</thead>
										<tbody class="f_table_pesanan">
											<?php
											for($i=0; $i<15; $i++){
												?>
												<tr id="baris_ke_<?php echo($i); ?>" data-toggle="modal" data-target=".pop_up_edit_barang">
													<td style="line-height: 30px;">
														123123123
													</td>
													<td style="line-height: 30px;">
														Merah
													</td>
													<td style="line-height: 30px;">
														1
													</td>
													<td style="line-height: 30px;">
														10
													</td>
													<td style="line-height: 30px;">
														200
													</td>
													<td style="line-height: 30px;">
														1.000.000
													</td>
												</tr>
												<?php
											}
											?>
											<script>
										//	$('body').on('click', '.f_table_pesanan > tr', function(){
										//		alert($(this).attr('id'));
										//	});
</script>
<style>
.f_table_pesanan > tr:active > td {
	background-color: #E8CD02 !important;
}
</style>
</tbody>
</table>

<div class="form-group">
	
	<div class="g-sm-12">
		<label for="inputEmail3" class="control-label pull-left">Email</label>
		<input type="email" class="form-control pull-left" id="inputEmail3" placeholder="Email" style="width: 80%;">
	</div>
</div>

</form>




<!-- Modal Search Barang-->
@include('pages.mobile_test.pop_up_cari_barang')
<!-- Modal Edit Barang-->
@include('pages.mobile_test.pop_up_edit_barang')





</div>
</div>
<script>
$(function () {
	$('#myTab a:last').tab('show')
})
</script>
</div>
</div>
</div>
</section>
</section>


<script type="text/javascript">
var height = $(window).height();
var width = $(window).width();
var inc = 0;
var tab_width = $('.sf_tab_orderan > ul').children('li').width();
var tab_container_width = $('.sf_tab_orderan > ul').width();
			//alert(tab_container_width);

			function updateSize(){
				// Get the dimensions of the viewport
				//var width = $(window).width();
				
				//var navHeight = $('#nav_sec').height();
				
				//$('#landing_sec').height(height);
				//$('.landing_spc').height(height - navHeight);
				$('.s_super_container').height(height);
				$('.s_super_container').width(width);
				$('.s_left_display').height(height);
				$('.s_left_display').width(width);
				//$('.s_middle_display').height(height);
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

			//var epic = $('.sf_tab_orderan > ul').children('li').length;
		//	alert(epic);

		$('body').on('click', '#f_add_new_order', function() {
			$('.sf_tab_orderan > ul').width(tab_container_width+=tab_width);

			inc++;
			var tab ='<li><a href="#'+inc+'" role="tab" data-toggle="tab">Order '+inc+'</a></li>';
			$('.sf_tab_orderan > ul').append(tab);

			var tab_panel ='<div class="tab-pane fade in" id="'+inc+'">';
			tab_panel+='		Pesanan ke '+inc+'gan!';
			tab_panel+='	</div>';
			$('.sf_panel_orderan').append(tab_panel);

			
		});

		</script>
		<script>
		function pop_up_edit_barang(n){
				//alert(n);
			};

			$('body').on('click','.f_table_pesanan > tr',function(){
				var n = $(this).attr('id');
				pop_up_edit_barang(n);
			});


			</script>

		</body>
		</html>