@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Log Account
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" data-backdrop="static" style="margin-bottom: 20px; ">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->
			<div>
				<table class="table ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered">
								<a href="javascript:void(0)">ID</a>
									@if($filtered == 0)
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('accountController@manageLog', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('accountController@manageLog', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>

							<th class="table-bordered">
								<a href="javascript:void(0)">Username</a>
									@if($filtered == 0)
										@if($sortBy == 'username')
											@if($order == 'asc')
												<a href="{{action('accountController@manageLog', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'username')
											@if($order == 'asc')
												<a href="{{action('accountController@manageLog', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>

							<th class="table-bordered">
								<a href="javascript:void(0)">Role</a>
									@if($filtered == 0)
										@if($sortBy == 'role')
											@if($order == 'asc')
												<a href="{{action('accountController@manageLog', array('sortBy' => 'role', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'role')
											@if($order == 'asc')
												<a href="{{action('accountController@manageLog', array('sortBy' => 'role', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'role', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
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
												<a href="{{action('accountController@manageLog', array('sortBy' => 'last_login', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'last_login')
											@if($order == 'asc')
												<a href="{{action('accountController@manageLog', array('sortBy' => 'last_login', 'order' => 'desc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@else
												<a href="{{action('accountController@manageLog', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
											@endif
										@else
											<a href="{{action('accountController@manageLog', array('sortBy' => 'last_login', 'order' => 'asc', 'filtered'=>'1','username'=>$username,'role'=>$role,'lastLogin'=>$lastLogin,'id'=>$id))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>

							<th class="table-bordered" width="200">
								Command
							</th>
							<!--<th class="table-bordered" width="70">
								Delete
							</th>-->
						</thead>
						<thead>
							<tr>
								
								<td>
									<input type="text" class="form-control input-sm" id="filter_id">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="filter_username">
								</td>
								<td>
									<select class="form-control input-sm" id="filter_role">
										<option value="owner">owner</option>
										<option value="manager">manager</option>
										<option value="sales">sales</option>
									</select>
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="filter_last_login" placeholder="yyyy-mm-dd hh:mm:ss">
								</td>
									 
								
								<td width="">
									<a class="btn btn-primary btn-xs" id="filter_button"><span class="glyphicon glyphicon-filter" style="margin-right: 5px;"></span>Filter</a>
									<a class="btn btn-primary btn-xs" id="unfilter_button"><span class="glyphicon glyphicon-refresh" style="margin-right: 5px;"></span>Reset</a>
								</td>
							</tr>
						</thead>
						<tbody id="f_tbody_karyawan">
							@if($datas != null)
								@foreach($datas as $record)
								<tr>
									<td>
										{{ $record->id }}
									</td>
									<td>
										{{ $record->username }}
									</td>
									<td>
										{{ $record->role }}
									</td>
									<td>
										{{ $record->last_login }}
									</td>
									<td>
										 
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

<script>
	$('body').on('click','#filter_button',function(){
		$id = $('#filter_id').val();
		if($id == ''){
			$id = '-';
		}
		
		$username = $('#filter_username').val();
		if($username == ''){
			$username = '-';
		}
		
		var x=document.getElementById("filter_role");
		for (var i = 0; i < x.options.length; i++) 
		{
			if(x.options[i].selected ==true)
			{
				$roleRaw = x.options[i].value;
			}
		}
		
		// alert($roleRaw);
		
		if($roleRaw == 'manager')
		{
			// $role = 'manager';
			$role = '2';
		}
		else if($roleRaw == 'sales')
		{
			// $role = 'sales';
			$role = '3';
		}
		else
		{
			$role = '-';
		}
		
		
		$lastLogin = $('#filter_last_login').val();
		if($lastLogin == ''){
			$lastLogin = '-';
		}
		
		//alert($username + " " + $role + " " + $lastLogin + " " + $id);
		window.location = "{{URL::route('gentry.manage_log')}}" + "?filtered=1&username="+$username+"&role="+$role+"&lastLogin="+$lastLogin+"&id="+$id;
	});
	
	$('body').on('click','#unfilter_button',function(){
		window.location = "{{URL::route('gentry.manage_log')}}";
	});
</script>
	
@stop
