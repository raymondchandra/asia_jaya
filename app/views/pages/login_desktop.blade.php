@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Login
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<div class="s_tbl s_set_height_window">
				<div class="s_cl">
					<div class="g-lg-6 g-lg-push-3">
						<p class="bg-danger hidden fail-msg" style="padding-top: 10px; padding-bottom: 10px; margin-bottom: 20px;">Maaf username/password anda salah!</p>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Login to Admin Panel</h3>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" role="form">
									<div class="form-group">
										<label for="inputEmail3" class="g-sm-4 control-label">Username/Email</label>
										<div class="g-sm-6">
											<input type="text" class="form-control input-usrnm" placeholder="Username">	
										</div>
									</div>

									<div class="form-group">
										<label for="inputPassword3" class="g-sm-4 control-label">Password</label>
										<div class="g-sm-6">
											<input type="password" class="form-control input-passwd" placeholder="Password">	
										</div>
									</div>

									<div class="form-group">
										<div class=" g-sm-12">
											<input type="button" class="btn btn-warning flogin" value="Login"/>
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
																$('.fail-msg').removeClass('hidden');
															}
															else if(response == "owner")
															{
																window.location.href="{{URL::route('david.view_dashboard')}}";
															}
															else if(response == "mgr")
															{
																window.location.href="{{URL::route('gentry.view_stock')}}";
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
				</div>
			</div>
		</div>
	</div>
</div>

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
