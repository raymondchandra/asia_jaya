@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Kelola Account
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>
			<div>
				<table class="table table-hover ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered">
								<a href="javascript:void(0)">Username</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="120">
								<a href="javascript:void(0)">Role</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Last Login</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Status</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="200">
								Command
							</th>
							<th class="table-bordered" width="70">
								Delete
							</th>
						</thead>
						<thead>
							<tr>
								
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td>
									<select class="form-control input-sm">
										<option value="">Active</option>
										<option value="">Inactive</option>
									</select>
								</td>
								
								<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
							</tr>
						</thead>
						<tbody id="f_tbody_karyawan">
							<?php for($i=0; $i<2; $i++){
							?>
							<tr class="bg-success"> 
								<td>Username</td>
								<td>Role</td>
								<td>-</td>
								<td class="f_account_status_lbl">Active</td>

								<td>
									<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".pop_up_edit_account">Edit</button>
									<button type="button" class="f_activate_btn btn btn-success btn-xs hidden">Activate</button>
									<button type="button" class="f_deactivate_btn btn btn-danger btn-xs">Deactivate</button>
								</td>
								<td>
									<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".pop_up_delete_account">Delete</button>
								</td>
							</tr> 
							<?php }
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@include('pages.account.pop_up_add_account')
	@include('pages.account.pop_up_edit_account')
	@include('pages.account.pop_up_delete_account')

	<script>
	//**pop_up_add_account
	$('body').on('click','#f_add_new_karyawan_btn',function(){
		var f_tbody_karyawan_node = '<tr class="bg-success">';
		f_tbody_karyawan_node +=' <td>'+$('[name=add_account_username]').val()+'</td>';
		f_tbody_karyawan_node +=' <td>'+$('[name=add_account_role] option:selected').text()+'</td>';
		f_tbody_karyawan_node +=' <td>-</td>';
		f_tbody_karyawan_node +=' <td>Aktif</td>';
		f_tbody_karyawan_node +=' <td>';
		f_tbody_karyawan_node +=' 	<button class="btn btn-info btn-xs" data-toggle="modal" data-target=".pop_up_edit_account">Edit</button>';
		f_tbody_karyawan_node +=' 	<button type="button" class="f_activate_btn btn btn-success btn-xs hidden">Activate</button>';
		f_tbody_karyawan_node +=' 	<button type="button" class="f_deactivate_btn btn btn-danger btn-xs">Deactivate</button>';
		f_tbody_karyawan_node +=' <td>';
		f_tbody_karyawan_node +=' 	<button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".pop_up_delete_account">Delete</button>';
		f_tbody_karyawan_node +=' </td>';
		f_tbody_karyawan_node +=' </tr>';

		$('#f_tbody_karyawan').append(f_tbody_karyawan_node);
	});

	//Active - Deactivate button
	$( 'body' ).on( "click",'.f_activate_btn', function() {
		$(this).addClass("hidden");
		$(this).siblings(".f_deactivate_btn").removeClass("hidden");
		$(this).parent().siblings(".f_account_status_lbl").text("Active");
		$(this).closest('tr').removeClass("bg-danger").addClass("bg-success");
		
	});

	$( 'body' ).on( "click",'.f_deactivate_btn', function() {
		$(this).addClass("hidden");
		$(this).siblings(".f_activate_btn").removeClass("hidden");
		$(this).parent().siblings(".f_account_status_lbl").text("Inactive");
		$(this).closest('tr').addClass("bg-danger").removeClass("bg-success");
	});



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
