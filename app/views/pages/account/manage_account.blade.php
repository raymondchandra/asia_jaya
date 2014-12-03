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
				<table class="table ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered">
								<a href="javascript:void(0)">Username</a>
								@if($filtered == 0)
									@if($sortBy == 'username')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'username')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="120">
								<a href="javascript:void(0)">Role</a>
								@if($filtered == 0)
									@if($sortBy == 'role')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'role', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'role')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'role', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Last Login</a>
								@if($filtered == 0)
									@if($sortBy == 'last_login')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'last_login', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'last_login')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'last_login', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Status</a>
								@if($filtered == 0)
									@if($sortBy == 'active')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'active', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'active', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'active', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'active')
										@if($order == 'asc')
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'active', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@else
											<a href="{{action('accountController@viewAccount', array('sortBy' => 'active', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
										@endif
									@else
										<a href="{{action('accountController@viewAccount', array('sortBy' => 'active', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'active'=>$active))}}">
									@endif
								@endif
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
								
							<td><input type="text" class="form-control input-sm" id="filter_username"></td>
								<td>
									<select class="form-control input-sm" id="filter_role">
										<option value="no-filter">no-filter</option>
										<option value="sales">sales</option>
										<option value="manager">manager</option>
									</select>
								</td>
								<td><input type="text" class="form-control input-sm" id="filter_last_login" placeholder="yyyy-mm-dd hh:mm:ss"></td>
								<td>
									<select class="form-control input-sm" id="filter_active">
										<option value="no-filter">no-filter</option>
										<option value="active">active</option>
										<option value="inactive">inactive</option>
									</select>
								</td>
								
								<td width="">
									<a class="btn btn-primary btn-xs" id="filter_button"><span class="glyphicon glyphicon-filter" style="margin-right: 5px;"></span>Filter</a>
									<a class="btn btn-primary btn-xs" id="unfilter_button"><span class="glyphicon glyphicon-refresh" style="margin-right: 5px;"></span>Reset</a>
								</td>
							</tr>
						</thead>
						<tbody id="f_tbody_karyawan">
							@if($datas != null)
								@foreach($datas as $data)
									<tr class=""> 
										<td id="username_{{$data->id}}">{{$data->username}}</td>
										@if($data->role == 1)
											<td id="role_{{$data->id}}">owner</td>
										@elseif($data->role == 2)
											<td id="role_{{$data->id}}">manager</td>
										@else
											<td id="role_{{$data->id}}">sales</td>
										@endif
										
										@if($data->last_login == "0000-00-00 00:00:00")
											<td>-</td>
										@else
											<td>{{$data->last_login}}</td>
										@endif
										
										@if($data->active == 1)
											<td class="f_account_status_lbl">active</td>
										@else
											<td class="f_account_status_lbl">inactive</td>
										@endif
										<td>
											<button type="button" class="btn btn-info btn-xs edit_account" data-toggle="modal" data-target=".pop_up_edit_account">Edit</button>
											<input type="hidden" value="{{$data->id}}"/>
											@if($data->active == 1)
												<button type="button" class="f_activate_btn btn btn-success btn-xs hidden">Activate</button>
												<input type="hidden" value="{{$data->id}}"/>
												<button type="button" class="f_deactivate_btn btn btn-danger btn-xs">Deactivate</button>
												<input type="hidden" value="{{$data->id}}"/>
											@else
												<button type="button" class="f_activate_btn btn btn-success btn-xs">Activate</button>
												<input type="hidden" value="{{$data->id}}"/>
												<button type="button" class="f_deactivate_btn btn btn-danger btn-xs hidden">Deactivate</button>
												<input type="hidden" value="{{$data->id}}"/>
											@endif	
										</td>
										<td>
											<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".pop_up_delete_account">Delete</button>
											<input type="hidden" value="{{$data->id}}"/>
										</td>
									</tr> 
								@endforeach
							@endif
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
		$(this).parent().siblings(".f_account_status_lbl").text("active");
		$(this).closest('tr').removeClass("bg-danger").addClass("bg-success");
		$id = $(this).next().val();
		//alert($id);
		
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('david.edit_account_active')}}',
			data: {
				'id' : $id
			},
			success: function(response){
				alert("edit status aktif berhasil");
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
		
	});

	$( 'body' ).on( "click",'.f_deactivate_btn', function() {
		$(this).addClass("hidden");
		$(this).siblings(".f_activate_btn").removeClass("hidden");
		$(this).parent().siblings(".f_account_status_lbl").text("inactive");
		$(this).closest('tr').addClass("bg-danger").removeClass("bg-success");
		$id = $(this).next().val();
		//alert($id);
		
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('david.edit_account_active')}}',
			data: {
				'id' : $id
			},
			success: function(response){
				alert("edit status aktif berhasil");
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
	});

	$( 'body' ).on( "click",'.edit_account', function() {
		$id = $(this).next().val();
		$('#idRep').val($id);
		$('#edit_username').val($('#username_'+$id).text());		
		$('#edit_password').val("");		
		$role = $('#role_'+$id).text();
		if($role === 'sales')
		{	
			$('#edit_role_sales').attr("selected","selected");
		}
		else if($role === 'manager')
		{
			$('#edit_role_manager').attr("selected","selected");
		}
		else
		{
		
		}
	});
	
	$('body').on('click','#filter_button',function(){
		$username = $('#filter_username').val();
		var x=document.getElementById("filter_role");
		for (var i = 0; i < x.options.length; i++) 
		{
			if(x.options[i].selected ==true)
			{
				$roleRaw = x.options[i].value;
			}
		}
		
		if($roleRaw == 'manager')
		{
			$role = 2;
		}
		else if($roleRaw == 'sales')
		{
			$role = 3;
		}
		else
		{
			$role = '-';
		}
		
		
		$lastLogin = $('#filter_last_login').val();
		var y=document.getElementById("filter_active");
		for (var i = 0; i < y.options.length; i++) 
		{
			if(y.options[i].selected == true)
			{
				$activeRaw = y.options[i].value;
			}
		}
		
		if($activeRaw == 'active')
		{
			$active = 1;
		}
		else if($activeRaw == 'inactive')
		{
			$active = 0;
		}
		else
		{
			$active = '-';
		}
		//alert($username + " " + $role + " " + $lastLogin + " " + $active);
		window.location = "{{URL::route('david.viewAccount')}}" + "?filtered=1&username="+$username+"&role="+$role+"&lastLogin="+$lastLogin+"&active="+$active;
	});
	
	$('body').on('click','#unfilter_button',function(){
		window.location = "{{URL::route('david.viewAccount')}}";
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
	$(document).ready(function(){
		$('.f_account_status_lbl').each(function () {
		    if ($(this).text() == 'active') {
				$(this).closest('tr').removeClass("bg-danger").addClass("bg-success");
		    }else{

				$(this).closest('tr').addClass("bg-danger").removeClass("bg-success");
		    }
		});
	});
	</script>
@stop
