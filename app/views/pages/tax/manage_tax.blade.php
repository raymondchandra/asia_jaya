@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Kelola Tax/Pajak
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->
			<div class="row">
				<div class="g-lg-6 g-lg-push-3">
					<div class="panel panel-default">
						<!--<div class="panel-heading">Panel heading without title</div>-->
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="control-label g-lg-3">Nilai Tax (%)</label>
									<div class="g-lg-7">
										<input type="text" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label g-lg-3"> </label>
									<div class="g-lg-7">
										<button type="button" class="btn btn-success">Save</button>
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

<script>

</script>
@stop
