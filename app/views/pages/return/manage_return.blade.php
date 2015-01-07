@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<ol class="breadcrumb">
					<li class="active">Retur</li>
				</ol>
				<h3 style="">
					Kelola Retur
					<a class="btn btn-success pull-right" href="{{URL::to('fungsi/search_return')}}">
						<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Retur
					</a>
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->

			<table class="table table-bordered">
				<thead class="table-bordered">
					<tr>
						<th class="table-bordered" width="110">
							<a href="javascript:void(0)">Order ID</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" style="width: 180px;">
							<a href="javascript:void(0)">Type</a>
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
						<th class="table-bordered">
							<a href="javascript:void(0)">Solution</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">trade_product_id</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">difference</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">created_at</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="100">Command</th>
					</tr>
				</thead>
				<thead>
					<tr>
						
						<td><input type="text" class="form-control input-sm"></td>
						<td>
							<select class="form-control input-sm">
									<option value="true">tukar barang sama</option>
									<option value="false">tukar barang beda</option>
									<option value="false">tukar uang</option>
							</select>
						</td>
						<td>
							<select class="form-control input-sm">
									<option value="true">pending</option>
									<option value="false">fixed</option>
							</select>
						</td>
						<td>
							<select class="form-control input-sm">
									<option value="true">kembalikan ke toko</option>
									<option value="false">masukan ke daftar obral</option>
							</select>
						</td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
						<!--<td></td>-->
						
					</tr>
				</thead>
				<tbody>
					
						@if($dataAll!=null)
							@foreach($dataAll as $data)
							<tr> 
								<td>
									{{ $data->order_id }}
								</td>
								<td>
									{{ $data->type }}
								</td>
								<td>
									{{ $data->status }}
								</td>
								<td>
									{{ $data->solution }}
								</td>
								<td>
									{{ $data->trade_product_id }}
								</td>
								<td>
									{{ $data->difference }}
								</td>
								<td>
									{{ $data->created_at}}
								</td>
								<td>
									<input type="hidden" value="{{$data->id}}"/>
									<button id="" class="btn btn-info btn-xs solution-btn"  data-toggle="modal" data-target=".pop_up_solusi">Solusi</button>
								</td>
							</tr> 
							@endforeach
						@endif
						
						<script>
						$( 'body' ).on( "click",'.f_excel_xlabel', function() {
							$(this).siblings('.f_excel_xinput').removeClass('hidden');
							$(this).siblings('.f_excel_xinput').val($(this).text());
							$(this).addClass('hidden');
						});

						$('.f_excel_xinput').keypress(function(e) {
							if(e.which == 13) {
								$(this).siblings('.f_excel_xlabel').text($(this).val());
								$(this).siblings('.f_excel_xlabel').removeClass('hidden');
								$(this).addClass('hidden');
							}
						});
						
						$( 'body' ).on( "click",'.solution-btn', function() {
							$id = $(this).prev().val();
							$('#return_id_hidden').val($id);
							$('#return_id_hidden_print').val($id);
							/*
							$.ajax({
								type: 'PUT',
								url: '{{URL::route('david.update_solution_return')}}',
								data: {
									'data' : $id;
									'qty' : $orderQtys,
									'ctr' : $counter
								},
								success: function(response){
									//ajax lagi baru window.open.. ITS SOMMMEEETTTHIIINNGG
									if(response['code'] == 200)
									{
										window.open("{{URL::route('david.view_print_konsumen')}}"+"?dataT="+$id);
										location.reload();
									}
									else
									{
										alert("Something Going Wrong.. Check your form or contact developer..");
									}
								},error: function(xhr, textStatus, errorThrown){
									alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
									alert("responseText: "+xhr.responseText);
								}
							},'json');
							*/
						});
						</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	@include('pages.return.pop_up_add_return')
	@include('pages.return.pop_up_solusi')

	<script>

	</script>
	@stop
