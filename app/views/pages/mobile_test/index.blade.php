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
									<button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">
										<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Barang
									</button>
								</div>

								<table class="table table-bordered table-striped" style="font-size: 0.8em">
									<thead>
										<tr>
											<th rowspan="2">
												Kode 
											</th>
											<th rowspan="2">
												Warna 
											</th>
											<!-- <th rowspan="2">
												Warna 
											</th> -->
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
									<tbody>
										<?php
										for($i=0; $i<15; $i++){
											?>
											<tr>
												<td style="line-height: 22px;">
													123123123
												</td>
												<td style="line-height: 22px;">
													Merah
												</td>
												<td style="line-height: 22px;">
													10
												</td>
												<td style="line-height: 22px;">
													200
												</td>
												<td style="line-height: 22px;">
													1.000.000
												</td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>





								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<h4 class="modal-title" id="myModalLabel">Modal title</h4>
											</div>
											<div class="modal-body">
												Arise features a brand new voice cast, compared with the casts of the original film and Stand Alone Complex television anime series. Maaya Sakamoto replaces Atsuko Tanaka as the voice of Major Motoko Kusanagi, Sakamoto having only previously voiced the Major as a child.[2] Other changes to the cast include Kenichirou Matsuda as Batou, Tarusuke Shingaki as Togusa, Ikyuu Jyuku as Chief Daisuke Aramaki, Tomoyuki Dan as Ishikawa, Takuro Nakakuni as Saito, Yōji Ueda as Paz, and Kazuya Nakai as Borma.[4] Miyuki Sawashiro will provide the voice of the series' think tanks the Logicoma (ロジコマ Rojikoma?), short for Logistics Conveyer Machine (ロジスティックス・コンベイヤー・マシン Rojisutikkusu Konbeiyā Mashin?). The Logicoma will also feature in anime shorts included on the Blu-ray releases titled Logicoma Beat (ロジコマ・ビート Rojikoma Bīto?).

												New characters in the first of the episodes include Kurtz (クルツ Kurutsu?), voiced by Mayumi Asano in Japanese and by Mary Elizabeth McGlynn (the previous voice of the Major) in English, the head of the Army 501 Organization (陸軍５０１機関 Rikugun Go Maru Ichi Kikan?), the firm who converted Motoko Kusanagi into a full cyborg and who Kusanagi would replace in the organization had she not joined Section 9; Raizo (ライゾー Raizō?), voiced by Takanori Hoshino, a combat cyborg for the 501 Organization that uses electricity as weapons; Ibachi (イバチ?), voiced by Masahiro Mamiya, a combat cyborg for the 501 Organization skilled in bōjutsu and armed with hidden machine guns; Tsumugi (ツムギ?), voiced by Kenji Nojima, a tactical cyborg for the 501 Organization that has a set of twins' cyberbrains in its head who always talk to each other; and Lieutenant colonel Mamuro (マムロ?), voiced by Atsushi Miyauchi, the leader of the 501 Organization who raised Kusanagi but has disappeared, having had something to do with arms dealing.
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary">Save changes</button>
											</div>
										</div>
									</div>
								</div>
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

	</body>
	</html>