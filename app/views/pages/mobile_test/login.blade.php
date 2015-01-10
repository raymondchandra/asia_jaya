<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Login Pemesanan</title>

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

		<section class="s_middle_display" style="height: auto;">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid" style="text-align: center;">
					<span style="line-height: 50px; text-transform: uppercase;">
						Welcome
					</span>
				</div>
			</nav>
			<div class="container-fluid" style="">
				<div class="row">
					<div class="g-lg-12">
						<form class="form" style="margin-top: 50px;">
							<div class="form-group">
								<h2 style="text-align: center; text-transform: uppercase;">	
									Toko Asia Jaya
								</h2>	
							</div>	
							<div class="form-group">
								<label class="control-label g-sm-12">Username</label>	
								<div class="g-sm-12">	
									<input class="form-control input-usrnm"  type="text">
								</div>		
							</div>	
							<div class="form-group" >
								<label class="control-label g-sm-12 " style="margin-top: 20px;">Password</label>	
								<div class="g-sm-12">	
									<input class="form-control input-passwd" type="password">
								</div>		
							</div>	
							<div class="form-group">
								
								<div class="g-sm-12" style="text-align: center; margin-top: 20px;">	
									<input type="button" class="btn btn-success flogin" value="Log In"/>
									<script>
										$('body').on('click','.flogin',function(){
											
											$pass = $('.input-passwd').val();
											$id = $('.input-usrnm').val();
											$.ajax({
												type: 'POST',
												url: '{{URL::route('david.post_sign_in')}}',
												data: {
													'data' : $id,
													'datas' : $pass
												},
												success: function(response){
													if(response == "fail")
													{
														
													}
													else
													{
														window.location.href="{{URL::route('mobile_site')}}";
													}
												},error: function(xhr, textStatus, errorThrown){
													alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
													alert("responseText: "+xhr.responseText);
												}
											},'json');
										});
									</script>
						</div>		
							</div>			
						</form>
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


		function updateSize(){
			$('.s_super_container').height(height);
			$('.s_super_container').width(width);
			$('.s_left_display').height(height);
			$('.s_left_display').width(width);

			$('.s_middle_display').width(width);
			$('.s_middle_display').height(height-50);
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


	</script>
</body>
</html> 