@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<ol class="breadcrumb">
					<li class="active">Retur</li>
				</ol>
				<h3 style="">
					Search Barang
					<!--<button class="btn btn-success pull-right" data-toggle="modal" data-target=".pop_up_add_return">
						<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Retur
					</button>-->
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<div class="panel panel-default">
				<div class="panel-body">
					
			<form class="form-horizontal" role="form">
					<div class="row">
						<div class="g-sm-12">

							<div class="form-group">
								<label class="g-sm-3 control-label">Nama Orang</label>
								<div class="g-sm-7">
									<input type="text" class="form-control" id="trans_code">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-3 control-label">Kode Produk (opt)</label>
								<div class="g-sm-7">
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-3 control-label">Nama Produk (opt)</label>
								<div class="g-sm-7">
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-3 control-label">Kode Transaksi (opt)</label>
								<div class="g-sm-7">
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-3 control-label"></label>
								<div class="g-sm-7">
									<button class="btn btn-success" type="button" id="search_button">
										Search
									</button>
								</div>
							</div>

						</div>
					</div>
			</form>
				</div>
			</div>
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
							<a href="javascript:void(0)">Nama Orang</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Kode Produk</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Nama Produk</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">Kode Transaksi</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">Tanggal</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="100">
							<a href="javascript:void(0)">Command</a>
							<a href="javascript:void(0)">
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
					</tr>
				</thead>
				<thead>
					<tr>

						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td><input type="text" class="form-control input-sm"></td>
						<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
						<!--<td></td>-->

					</tr>
				</thead>
				<tbody>

					@if($dataOrder != null)
						@foreach($dataOrder as $data)
						<tr> 
							<td>
								{{ $data->id }}
								<input type="hidden" id="prod_quantity_{{$data->id}}" value="{{$data->quantity}}">
								<input type="hidden" id="prod_id_{{$data->id}}" value="{{$data->prod_id}}" >
							</td>
							<td>
								{{ $data->cust_name }}
							</td>
							<td>
								{{ $data->prod_code }}
							</td>
							<td id="prod_name_{{$data->id}}">
								{{ $data->prod_name }}
							</td>
							<td>
								{{ $data->transaction_id }}
							</td>
							<td>
								{{ $data->created_at }}
							</td>
							<td>
								<button id="" class="btn btn-warning btn-xs view_detail_button"  data-toggle="modal" data-target=".pop_up_add_return">Pilih</button>
								<input type="hidden" value="{{$data->id}}" />
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
						
						//blm jalan
						$("body").on('click', '#search_button', function(){
							$trans_code = $("#trans_code").val();
							alert($trans_code);
							$.ajax({
								type: 'GET',
								url: '{{URL::route('gentry.search_return')}}',
								data: {
									'data' : $trans_code
								},
								success: function(response){
									alert('Search Berhasil');
								},error: function(xhr, textStatus, errorThrown){
									alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
									alert("responseText: "+xhr.responseText);
								}
							},'json');
						});
						</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	@include('pages.return.pop_up_add_return')

	<script>
		$('body').on('click','.view_detail_button',function(){
			$id = $(this).next().val();
			$prodName = $('#prod_name_'+$id).text();
			$prodQuantity = $('#prod_quantity_'+$id).val();
			$('#prod_name_pop').text($prodName);
			$('#prod_quantity_pop').text($prodQuantity);
			
			$('body').on('click','#save_pop',function(){
				$prod_id = $('#prod_id_'+$id).val();
				
				$.ajax({
					type: 'PUT',
					url: '{{URL::route('gentry.insert_return')}}',
					data: {
						'order_id' : $id,
						'prod_id' : $prod_id
					},
					success: function(response){
						alert('Insert Berhasil');
					},error: function(xhr, textStatus, errorThrown){
						alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
						alert("responseText: "+xhr.responseText);
					}
				},'json');
				
				});
		});
	</script>
	@stop
