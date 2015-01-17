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
										<input type="text" class="form-control" id="no_nota">
									</div>
								</div>
								<div class="form-group">
									<label class="g-md-3 control-label" >
										Range tanggal
									</label>
									<div class="input-daterange g-md-7">
										<div class="g-md-5">
											<input value="" class="f_date_0 form-control" id="start_date"/>
										</div>
										<div class="g-md-2" style="text-align:center; line-height: 34px;">
											<span>to</span>
										</div>
										<div class="g-md-5">
											<input value="" class="f_date_1 form-control" id="end_date"/>
										</div>
									</div>
								</div>

								<script>
								$('.f_date_0').datepicker();

								$('.f_date_1').datepicker();
								</script>

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
								<td id="no_nota_{{$data->id}}">
									{{ $data->no_faktur }}
								</td>
								<td id="cust_name_{{$data->id}}">
									{{ $data->cust_name }}
								</td>
								<td>
									{{ $data->created_at }}
								</td>
								<td>
									<button id="" type="button" class="btn btn-primary btn-xs view_detail_button"  data-toggle="modal" data-target=".pop_up_detail_nota">Lihat Detail</button>
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
								$no_nota = $("#no_nota").val();
								$start_date = $('#start_date').val();
								$end_date = $('#end_date').val();
								//alert($cust_name);
								$.ajax({
									type: 'GET',
									url: '{{URL::route('gentry.search_return2')}}',
									data: {
										'cust_name' : $cust_name,
										'prod_code' : $prod_code,
										'prod_name' : $prod_name,
										'no_nota' : $no_nota,
										'start_date' : $start_date,
										'end_date' : $end_date
									},
									success: function(response){
										$('#body_content').html("");
										$row = "";
										$.each(response, function(i,data){
											$row += "<tr><td id='no_nota_"+data.id+"'>";
											$row += data.no_nota;
											$row += "<input type='hidden' id='prod_quantity_"+data.id+"' value='"+data.quantity+"' >";
											$row += "<input type='hidden' id='order_price_"+data.id+"' value='"+data.price+"' >";
											$row += "<input type='hidden' id='transaction_id_"+data.id+"' value='"+data.transaction_id+"' >";
											$row += "<input type='hidden' id='prod_code_"+data.id+"' value='"+data.prod_code+"' >";
											$row += "</td><td id='cust_name_"+data.transaction_id+"'>";
											$row += data.cust_name;
											$row += "</td><td>";
											$row += data.created_at;
											$row += "</td><td>";
											$row += "<button id='' type='button' class='btn btn-primary btn-xs view_detail_button'  data-toggle='modal' data-target='.pop_up_detail_nota'>Lihat Detail</button>";
											$row += "<input type='hidden' value='"+data.transaction_id+"' >";
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


	@include('pages.return.pop_up_detail_nota')
	@include('pages.return.pop_up_add_return')

	<script>
	
	$('body').on('click','.view_detail_button',function(){
		$id = $(this).next().val();
		$cust_name = $('#cust_name_'+$id).text();
		$('#pop_up_trans_name').text($cust_name);
		
		$('#transaction_detail_content').html("");
		$.ajax({
			type : 'GET',
			url: '{{URL::route('david.get_order_by_trans_id')}}',
			data: {
				'data' : $id
			},
			success: function(response){
				$data = "";
				$total = 0;
				
				$.each(response['messages'], function( i, resp ) {
					$data += "<tr><td>";
					$data += resp.kodeProduk;
					$data += "</td><td>";
					$data += "<img src='{{asset('"+resp.foto+"')}}' width='20' height='20'>";
					$data += "</td><td>";
					$data += resp.warna;
					$data += "</td><td>";
					$data += resp.quantity;
					$data += "</td><<td>";
					$data += "IDR " + toRp(parseInt(resp.hargaSatuan)/parseInt(resp.quantity));
					$data += "</td><td>";
					$total = (parseInt(resp.hargaSatuan)*parseInt(resp.quantity));
					$data += "IDR " + toRp($total);
					$data += "</td><td>";
					$data += "<button type='button' class='btn btn-warning btn-xs view_pilih_button'  data-toggle='modal' data-target='.pop_up_add_return'>Pilih</button>";
					$data += "<input type='hidden' value='"+resp.id+"'/> ";
					$data += "<input type='hidden' value='"+resp.quantity+"'/> ";
					$data += "<input type='hidden' value='"+resp.kodeProduk+"'/> ";
					$data += "<input type='hidden' value='"+resp.price+"'/> ";
					$data += "</td></tr>";
				});
				
				$('#transaction_detail_content').html($data);
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
		function toAngka(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}
		function toRp(angka){
			var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
			var rev2    = '';
			for(var i = 0; i < rev.length; i++){
				rev2  += rev[i];
				if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
					rev2 += '.';
				}
			}
			return rev2.split('').reverse().join('');
		}
		$('body').on('click','.view_pilih_button',function(){
			$quantity = $(this).next().next().val();
			$id = $(this).next().val()
			$prodCode = $(this).next().next().next().val();
			$price = $(this).next().next().next().next().val()
			$('#prod_quantity_pop').text($(this).next().next().val());
			$('#prod_name_pop').text($(this).next().next().next().val());
			
			$('body').on('click','.f_pilih_tipe_retur', function(){

				var target = $(this).find(":selected").val();

				if(target == "3"){
					$('#nominal_uang').val(parseInt($price)/parseInt($quantity));
				}
			});
			
			$('body').on('click','#save_pop',function(){
				//alert($id);
				$type = $('#type_return option:selected').text();
				$trade_id = $('#id_trade_prod').val();
				$return_quantity = $("#quantity_pop").val();
				$nominal_uang = $('#nominal_uang').val();
				
				//alert($trade_id);
				//alert($type);
				
				$.ajax({
					type: 'PUT',
					url: '{{URL::route('gentry.insert_return')}}',
					data: {
						'order_id' : $id,
						'type' : $type,
						'no_nota' : 0,
						'trade_id' : $trade_id,
						'return_quantity' : $return_quantity,
						'nominal_uang' : $nominal_uang
					},
					success: function(response){
						alert(response);
						//alert('Insert Berhasil');
					},error: function(xhr, textStatus, errorThrown){
						alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
						alert("responseText: "+xhr.responseText);
					}
				},'json');
				
			});
		});
	});
	
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
	</script>
	@stop
