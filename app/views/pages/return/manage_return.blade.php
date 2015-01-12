@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
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
								@if($filtered == 0)
									@if($sortBy == 'order_id')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'order_id', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'order_id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'order_id', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'order_id')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'order_id', 'order' => 'desc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'order_id', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'order_id', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" style="width: 180px;">
							<a href="javascript:void(0)">Tipe</a>
								@if($filtered == 0)
									@if($sortBy == 'type')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'type')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'desc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'type', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Status</a>
								@if($filtered == 0)
									@if($sortBy == 'status')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'status')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Solusi</a>
								@if($filtered == 0)
									@if($sortBy == 'solution')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'solution')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'desc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'solution', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Tukar dengan Kode Produk</a>
								@if($filtered == 0)
									@if($sortBy == 'trade_product_id')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'trade_product_id')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'desc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'trade_product_id', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">Selisih</a>
								@if($filtered == 0)
									@if($sortBy == 'difference')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'difference')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'desc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'difference', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">created_at</a>
								@if($filtered == 0)
									@if($sortBy == 'created_at')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'created_at')
										@if($order == 'asc')
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@view_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','order_id'=>$order_id,'type'=>$type,'status'=>$status,'solution'=>$solution,'trade_product_id'=>$trade_product_id,'difference'=>$difference,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="100">Command</th>
					</tr>
				</thead>
				<thead>
					<tr>
						
						<td><input type="text" class="form-control input-sm" id="filter_order_id"></td>
						<td>
							<select class="form-control input-sm" id="filter_type">
									<option value="true">tukar barang sama</option>
									<option value="false">tukar barang beda</option>
									<option value="false">tukar uang</option>
							</select>
						</td>
						<td>
							<select class="form-control input-sm" id="filter_status">
									<option value="true">pending</option>
									<option value="false">fixed</option>
							</select>
						</td>
						<td>
							<select class="form-control input-sm" id="filter_solution">
									<option value="true">kembalikan ke toko</option>
									<option value="false">masukan ke daftar obral</option>
							</select>
						</td>
						<td><input type="text" class="form-control input-sm" id="filter_trade_product_id"></td>
						<td><input type="text" class="form-control input-sm" id="filter_difference"></td>
						<td><input type="text" class="form-control input-sm" id="filter_created_at"></td>
						<td width=""><a class="btn btn-primary btn-xs" id="filter_button">Filter</a></td>
						<!--<td></td>-->
						
					</tr>
				</thead>
				<tbody>
					
						@if($datas!=null)
							@foreach($datas as $data)
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
		$('body').on('click','#filter_button',function(){
			$order_id = $('#filter_order_id').val();
			if($order_id == ''){
				$order_id = '-';
			}
			
			var a=document.getElementById("filter_type");
			for (var i = 0; i < a.options.length; i++) 
			{
				if(a.options[i].selected ==true)
				{
					$typeRaw = a.options[i].value;
				}
			}
			
			if($typeRaw == 'true'){
				$type = 1;
			}else if($typeRaw == 'false'){
				$type = 2;
			}else if($typeRaw == 'false'){
				$type = 3;
			}else{
				$type = '-';
			}
			
			var b=document.getElementById("filter_status");
			for (var i = 0; i < b.options.length; i++) 
			{
				if(b.options[i].selected ==true)
				{
					$statusRaw = b.options[i].value;
				}
			}
			
			if($statusRaw == 'true'){
				$status = 'pending';
			}else if($statusRaw == 'false'){
				$status = 'fixed';
			}else{
				$status = '-';
			}
			
			var c=document.getElementById("filter_solution");
			for (var i = 0; i < c.options.length; i++) 
			{
				if(c.options[i].selected ==true)
				{
					$solutionRaw = c.options[i].value;
				}
			}
			
			if($solutionRaw == 'true'){
				$solution = 'kembalikan ke toko';
			}else if($solutionRaw == 'false'){
				$solution = 'masukkan ke daftar obral';
			}else{
				$solution = '-';
			}
			
			//$solution = '-';
			
			$trade_product_id = $('#filter_trade_product_id').val();
			if($trade_product_id == ''){
				$trade_product_id = '-';
			}
			
			$difference = $('#filter_difference').val();
			if($difference == ''){
				$difference = '-';
			}
			
			$created_at = $('#filter_created_at').val();
			if($created_at == ''){
				$created_at = '-';
			}
			
			window.location = "{{URL::route('gentry.view_return')}}" + "?filtered=1&order_id="+$order_id+"&type="+$type+"&status="+$status+"&solution="+$solution+"&trade_product_id="+$trade_product_id+"&difference="+$difference+"&created_at="+$created_at;
		});
	</script>
	@stop
