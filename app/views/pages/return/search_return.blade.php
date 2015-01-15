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
					Search Nota
					<!--<button class="btn btn-success pull-right" data-toggle="modal" data-target=".pop_up_add_return">
						<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Retur
					</button>-->
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<form class="form-horizontal" role="form">
				<div class="row">
					<div class="g-sm-6" style="margin-left: auto; margin-right: auto; float: none;">

						<div class="panel panel-default">
							<div class="panel-body">

								<div class="form-group">
									<label class="g-sm-3 control-label">Nama Orang</label>
									<div class="g-sm-7">
										<input type="text" class="form-control" id="cust_name" placeholder="Masukkan nama pelanggan">
									</div>
								</div>
								<div class="form-group">
									<label class="g-sm-3 control-label">Kode Produk <span style="font-weight: 300;">(opt)</span></label>
									<div class="g-sm-7">
										<input type="text" class="form-control" id="prod_code">
									</div>
								</div>
								<div class="form-group">
									<label class="g-sm-3 control-label">Nama Produk <span style="font-weight: 300;">(opt)</span></label>
									<div class="g-sm-7">
										<input type="text" class="form-control" id="prod_name">
									</div>
								</div>
								<div class="form-group">
									<label class="g-sm-3 control-label">No. Nota<span style="font-weight: 300;">(opt)</span></label>
									<div class="g-sm-7">
										<input type="text" class="form-control" id="trans_code">
									</div>
								</div>
								<div class="form-group">
									<label class="g-sm-3 control-label"></label>
									<div class="g-sm-7">
										<button class="btn btn-success" type="button" id="search_button" readonly>
											Search
										</button>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</form>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->
			<div class="g-xs-8" style="margin-left: auto; margin-right: auto; float: none;">

				<table class="table table-bordered">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" width="110">
								<a href="javascript:void(0)">No. Nota</a>
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" style="width: 180px;">
								<a href="javascript:void(0)">Nama Pelanggan</a>
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<!-- <th class="table-bordered">
								<a href="javascript:void(0)">Kode Produk</a>
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th> 
							<th class="table-bordered">
								<a href="javascript:void(0)">Nama Produk</a>
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th> -->
							<th class="table-bordered" width="">
								<a href="javascript:void(0)">Tanggal</a>
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width=" ">
								<a href="javascript:void(0)">Command</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
						</tr>
					</thead>
					<!--<thead>
						<tr>

							<td><input type="text" class="form-control input-sm" id="filter_order_id"></td>
							<td><input type="text" class="form-control input-sm" id="filter_cust_name"></td>
							<td><input type="text" class="form-control input-sm" id="filter_prod_code"></td>
							<td><input type="text" class="form-control input-sm" id="filter_prod_name"></td>
							<td><input type="text" class="form-control input-sm" id="filter_transaction_id"></td>
							<td><input type="text" class="form-control input-sm" id="filter_created"></td>
							<td width=""><a class="btn btn-primary btn-xs" id="filter_button">Filter</a></td>
							
						</tr>
					</thead>-->
					<tbody id="body_content">

						@if($dataOrder != null)
							@foreach($dataOrder as $data)
							<tr> 
								<td>
									{{ $data->id }}
									<input type="hidden" id="prod_quantity_{{$data->id}}" value="{{$data->quantity}}">
									<input type="hidden" id="order_price_{{$data->id}}" value="{{$data->price}}">
									<!--<input type="hidden" id="prod_id_{{$data->id}}" value="{{$data->prod_id}}" >-->
								</td>
								<!-- <td>
									{{-- $data->cust_name --}}
								</td>
								<td>
									{{-- $data->prod_code --}}
								</td> 
								<td id="prod_name_{{$data->id}}">
									{{ $data->prod_name }}
								</td> -->
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
								//alert($cust_name);
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
											$row += data.transTime;
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
	</div>


	@include('pages.return.pop_up_add_return')

	<script>
	
	/*
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

	*/

	/* -- jan 9 2015 | START -- */
	/* -- button disabled error prevention -- */
	$('#cust_name').keyup(function(){
		if( $(this).val() != '' ){
			$('#search_button').removeAttr('readonly');
		}
	});
	$('#cust_name').keydown(function(){
		if( $(this).val() == '' ){
			$('#search_button').attr('readonly','readonly'); 
		}
	});
	/* -- jan 9 2015 | END -- */

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
						//alert(response);
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
