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
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>

							<th class="table-bordered">
								<a href="javascript:void(0)">Username</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>

							<th class="table-bordered">
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

							<!--<th class="table-bordered" width="200">
								Command
							</th>
							<th class="table-bordered" width="70">
								Delete
							</th>-->
						</thead>
						<thead>
							<tr>
								
								<td>
									<input type="text" class="form-control input-sm" id="">
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="">
								</td>
								<td>
									<select class="form-control input-sm" id="">
										<option value="owner">owner</option>
										<option value="manager">manager</option>
										<option value="sales">sales</option>
									</select>
								</td>
								<td>
									<input type="text" class="form-control input-sm" id="filter_last_login" placeholder="yyyy-mm-dd hh:mm:ss">
								</td>
								
								<!--<td width="">
									<a class="btn btn-primary btn-xs" id="filter_button"><span class="glyphicon glyphicon-filter" style="margin-right: 5px;"></span>Filter</a>
									<a class="btn btn-primary btn-xs" id="unfilter_button"><span class="glyphicon glyphicon-refresh" style="margin-right: 5px;"></span>Reset</a>
								</td>-->
							</tr>
						</thead>
						<tbody id="f_tbody_karyawan">
							<tr>
								<td>
									3
								</td>
								<td>
									Upin
								</td>
								<td>
									sales
								</td>
								<td>
									1977-11-06 23:07:14
								</td>
							</tr>
							<tr>
								<td>
									4
								</td>
								<td>
									Ipim
								</td>
								<td>
									manager
								</td>
								<td>
									1978-11-06 23:07:14
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	
@stop
