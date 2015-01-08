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
									<input type="text" class="form-control" id="cust_name">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-3 control-label">Kode Produk (opt)</label>
								<div class="g-sm-7">
									<input type="text" class="form-control" id="prod_code">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-3 control-label">Nama Produk (opt)</label>
								<div class="g-sm-7">
									<input type="text" class="form-control" id="prod_name">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-3 control-label">Kode Transaksi (opt)</label>
								<div class="g-sm-7">
									<input type="text" class="form-control" id="trans_code">
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
								@if($filtered == 0)
									@if($sortBy == 'id')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'id')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" style="width: 180px;">
							<a href="javascript:void(0)">Nama Orang</a>
								@if($filtered == 0)
									@if($sortBy == 'cust_name')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'cust_name', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'cust_name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'cust_name', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'cust_name')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'cust_name', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'cust_name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'cust_name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Kode Produk</a>
								@if($filtered == 0)
									@if($sortBy == 'prod_code')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_code', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_code', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_code', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'prod_code')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_code', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_code', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_code', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered">
							<a href="javascript:void(0)">Nama Produk</a>
								@if($filtered == 0)
									@if($sortBy == 'prod_name')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_name', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_name', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'prod_name')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_name', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'prod_name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">Kode Transaksi</a>
								@if($filtered == 0)
									@if($sortBy == 'transaction_id')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'transaction_id', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'transaction_id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'transaction_id', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'transaction_id')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'transaction_id', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'transaction_id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'transaction_id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
									@endif
								@endif
								<span class="glyphicon glyphicon-sort" style="float: right;"></span>
							</a>
						</th>
						<th class="table-bordered" width="140">
							<a href="javascript:void(0)">Tanggal</a>
								@if($filtered == 0)
									@if($sortBy == 'created_at')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'created_at')
										@if($order == 'asc')
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@else
											<a href="{{action('returnController@search_product_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
										@endif
									@else
										<a href="{{action('returnController@search_product_return', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'cust_name'=>$cust_name,'prod_code'=>$prod_code,'prod_name'=>$prod_name,'transaction_id'=>$transaction_id,'created_at'=>$created_at))}}">
									@endif
								@endif
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

						<td><input type="text" class="form-control input-sm" id="filter_order_id"></td>
						<td><input type="text" class="form-control input-sm" id="filter_cust_name"></td>
						<td><input type="text" class="form-control input-sm" id="filter_prod_code"></td>
						<td><input type="text" class="form-control input-sm" id="filter_prod_name"></td>
						<td><input type="text" class="form-control input-sm" id="filter_transaction_id"></td>
						<td><input type="text" class="form-control input-sm" id="filter_created"></td>
						<td width=""><a class="btn btn-primary btn-xs" id="filter_button">Filter</a></td>
						<!--<td></td>-->

					</tr>
				</thead>
				<tbody id="body_content">

					@if($datas != null)
						@foreach($datas as $data)
						<tr> 
							<td>
								{{ $data->id }}
								<input type="hidden" id="prod_quantity_{{$data->id}}" value="{{$data->quantity}}">
								<input type="hidden" id="order_price_{{$data->id}}" value="{{$data->price}}">
								<!--<input type="hidden" id="prod_id_{{$data->id}}" value="{{$data->prod_id}}" >-->
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
							$cust_name = $("#cust_name").val();
							$prod_code = $("#prod_code").val();
							$prod_name = $("#prod_name").val();
							$trans_code = $("#trans_code").val();
							alert($cust_name);
							$.ajax({
								type: 'GET',
								url: '{{URL::route('gentry.search_return2')}}',
								data: {
									'cust_name' : $cust_name,
									'prod_code' : $prod_code,
									'prod_name' : $prod_name,
									'trans_code' : $trans_code
								},
								success: function(response){
									$('#body_content').html("");
									$row = "";
									$.each(response, function(i,data){
										$row += "<tr><td>";
										$row += data.id;
										$row += "<input type='hidden' id='prod_quantity_"+data.id+"' value='"+data.quantity+"' >";
										$row += "<input type='hidden' id='order_price_"+data.id+"' value='"+data.price+"' >";
										//$row += "<input type='hidden' id='prod_id_"+data.id+"' value='"+data.id+"' >";
										$row += "</td><td>";
										$row += data.cust_name;
										$row += "</td><td>";
										$row += data.product_code;
										$row += "</td><td id='prod_name_"+data.id+"'>";
										$row += data.name;
										$row += "</td><td>";
										$row += data.transaction_id;
										$row += "</td><td>";
										$row += data.created_at;
										$row += "</td><td>";
										$row += "<button id='' class='btn btn-warning btn-xs view_detail_button'  data-toggle='modal' data-target='.pop_up_add_return'>Pilih</button>";
										$row += "<input type='hidden' value='"+data.id+"' >";
										$row += "</td></tr>";
									});
									$("#body_content").html($row);
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
	
		$('body').on('click','#filter_button',function(){
			$order_id = $('#filter_order_id').val();
			if($order_id == ''){
				$order_id = '-';
			}
			
			$cust_name = $('#filter_cust_name').val();
			if($cust_name == ''){
				$cust_name = '-';
			}
			
			$prod_code = $('#filter_prod_code').val();
			if($prod_code == ''){
				$prod_code = '-';
			}
			
			$prod_name = $('#filter_prod_name').val();
			if($prod_name == ''){
				$prod_name = '-';
			}
			
			$transaction_id = $('#filter_transaction_id').val();
			if($transaction_id == ''){
				$transaction_id = '-';
			}
			
			$created = $('#filter_created').val();
			if($created == ''){
				$created = '-';
			}
			
			window.location = "{{URL::route('gentry.search_return')}}" + "?filtered=1&id="+$order_id+"&cust_name="+$cust_name+"&prod_code="+$prod_code+"&prod_name="+$prod_name+"&transaction_id="+$transaction_id+"&created_at="+$created;
		});	
	
		$('body').on('click','.view_detail_button',function(){
			$id = $(this).next().val();
			$prodName = $('#prod_name_'+$id).text();
			$prodQuantity = $('#prod_quantity_'+$id).val();
			$('#prod_name_pop').text($prodName);
			$('#prod_quantity_pop').text($prodQuantity);
			
			$('body').on('click','.f_pilih_tipe_retur', function(){

				var target = $(this).find(":selected").val();

				if(target == "3"){
					$tempQuantity = $('#prod_quantity_'+$id).val();
					$tempPrice = $('#order_price_'+$id).val();
					$('#nominal_uang').val($tempPrice / $tempQuantity);
				}
			});
			
			$('body').on('click','#save_pop',function(){
				//$prod_id = $('#prod_id_'+$id).val();
				$type = $('#type_return option:selected').text();
				//alert($type);
				$trade_id = $('#id_trade_prod').val();
				$return_quantity = $("#quantity_pop").val();
				$nominal_uang = $('#nominal_uang').val();
				
				//alert($return_quantity);
				
				$.ajax({
					type: 'PUT',
					url: '{{URL::route('gentry.insert_return')}}',
					data: {
						'order_id' : $id,
						//'prod_id' : $prod_id,
						'type' : $type,
						'trade_id' : $trade_id,
						'return_quantity' : $return_quantity,
						'nominal_uang' : $nominal_uang
					},
					success: function(response){
						alert(response);
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
