@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Daftar Pesanan Hari Ini
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
		
			<div>
				<table class="table table-bordered table-striped table-hover ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" width="110">
								<a href="javascript:void(0)">No. Nota</a>
									@if($filtered == 0)
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif										
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Nama Pelanggan</a>
									@if($filtered == 0)
										@if($sortBy == 'name')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Total</a>
									@if($filtered == 0)
										@if($sortBy == 'total')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)"><img src="{{asset('assets/img/pigblk.png')}}" height="14"></a>
									@if($filtered == 0)
										@if($sortBy == 'discount')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'discount', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="50">
								<a href="javascript:void(0)">Pajak</a>
									@if($filtered == 0)
										@if($sortBy == 'tax')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'tax', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@endif
									<!--<span class="glyphicon glyphicon-sort" style="float: right;"></span>-->
								</a>
							</th> 
							<th class="table-bordered">
								<a href="javascript:void(0)">Nama Karyawan</a>
									@if($filtered == 0)
										@if($sortBy == 'username')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Void</a>
									@if($filtered == 0)
										@if($sortBy == 'is_void')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'is_void', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="120">
								<a href="javascript:void(0)">Status</a>
									@if($filtered == 0)
										@if($sortBy == 'status')
											@if($order == 'asc')
												<a href="{{action('transController@view_transaction', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_transaction', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_transaction', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="100"></th>
							<th class="table-bordered" width="100">Print</th>
						</thead>
						<!--<thead>
							<tr>
								
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
								<td></td>
								
							</tr>
						</thead>-->
						<tbody>
							<?php
			
								function toMoney($val,$symbol='Rp ',$r=0)
								{
									$n = $val;
									$sign = ($n < 0) ? '-' : '';
									$i = number_format(abs($n),$r,",",".");

									return  $symbol.$sign.$i;
								}
							?>
							@if($datas != null)
								@foreach($datas as $data)
									<tr> 
										<td>{{$data->no_faktur}}</td>
										@if($data->name == "")
											<td id="hidden_trans_customer_name_{{$data->id}}">Tidak Ada Nama</td>
										@else
											<td id="hidden_trans_customer_name_{{$data->id}}">{{$data->name}}</td>
										@endif
										<td id="hidden_trans_total_{{$data->id}}">{{toMoney($data->total)}}</td>
										<td id="hidden_trans_discount_{{$data->id}}">{{toMoney($data->discount)}}</td>
										<td id="hidden_trans_tax_{{$data->id}}">{{$data->tax}}%</td> 
										<td>{{$data->username}}</td>
										@if($data->is_void == 0)
											<td>False</td>
										@else
											<td>True</td>
										@endif
										<td>{{$data->status}}</td>
										<td>
											<!--<button class="btn btn-success btn-xs" data-toggle="modal" data-target=".pop_up_pay_transaction" style="display: block; margin-bottom: 5px;">
												<span class="glyphicon glyphicon-usd" style="margin-right: 5px;"></span>Bayar
											</button>-->
											<input type='hidden' value='{{$data->status}}' id="hidden_status"/>
											<input type='hidden' value='{{$data->total_paid}}' id="hidden_paid"/>
											<button id="detail_{{$data->id}}" class="btn btn-success btn-xs view_detail_button" data-toggle="modal" data-target=".pop_up_detail_transaction">
												<span class="glyphicon glyphicon-usd" style="margin-right: 5px;"></span>View Detail
											</button>
											<input type="hidden" value="{{$data->id}}">
											@if(Auth::user()->role != 3)
											
												@if($data->is_void == 0 && $data->status == "Paid")
												<button id="void_{{$data->id}}" class="btn btn-danger btn-xs view_void_button" data-toggle="modal" data-target=".pop_up_void_transaction" style="margin-top: 5px;">
													<span class="glyphicon glyphicon-usd" style="margin-right: 5px;"></span>Void
												</button>
												
												@endif
											@endif
											<!-- Button trigger modal class ".alertYesNo" -->
										</td>
										<td>
											<button class="btn btn-primary btn-xs print-toko-btn" id="{{$data->id}}" data-toggle="modal" data-target="" style="display: block; margin-bottom: 5px;">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Toko
											</button>
											<button class="btn btn-primary btn-xs print-konsumen-btn" id="{{$data->id}}" data-toggle="modal" data-target="">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Customer
											</button>
											<!-- Button trigger modal class ".alertYesNo" -->
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
	<!-- modal void -->	
	<div class="modal fade pop_up_void_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<!--<div style="font-size: 1.2em;">
						<b>ID Transaksi :</b>  <span id="pop_up_trans_id"></span>
						<span class="clearfix"></span>
						<b>Nama Customer :</b> <span id="pop_up_trans_name"></span>
					</div>-->
				</div>
				<form class="form-horizontal" role="form">
					<div class="modal-body">
						<div class="row">
							<div class="g-sm-12"><!-- g-sm-5 -->
								
								<div class="form-group" style="text-align: center;">
									<h4>
									Apakah Anda yakin ingin mem-void transaksi ini?
									</h4>
									<input type="hidden" id="tableRep"/>
									<button type="button" class="btn btn-danger yes-btn" data-dismiss="modal">Ya</button>
									<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
								</div>
								
								
								
								<!--
								<button type="button" class="btn btn-success pull-right">
									<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Customer
								</button>
								<button type="button" class="btn btn-warning pull-right" style="margin-right: 20px;">
									<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Toko
								</button>
								-->
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	@include('pages.transaction.pop_up_detail_transaction')
	@include('pages.transaction.pop_up_pay_transaction') 

	<script>

	$('body').on('click','.view_detail_button',function(){
		$id = $(this).next().val();
		$status = $(this).prev().prev().val();
		$paid = $(this).prev().val()
		$('#transaction_detail_content').html("");
		//$('#transaction_subtotal_detail').text("");
		$('#transaction_diskon_detail').text("");				
		$('#transaction_tax_detail').text("");			
		$('#transaction_total_detail').text("");
		$name = $('#hidden_trans_customer_name_'+$id).text();
		$discount = $('#hidden_trans_discount_'+$id).text();
		$total = $('#hidden_total_discount_'+$id).text();
		$tax = $('#hidden_trans_tax_'+$id).text();
		//alert($name);
		$('#pop_up_trans_name').text($name);
		$('#pop_up_trans_id').text($id);
		
		$.ajax({
			type: 'GET',
			url: '{{URL::route('david.get_order_by_trans_id')}}',
			data: {
				'data' : $id
			},
			success: function(response){
				$data = "";
				$total = 0;
				$allAvaliability = 0;
				$.each(response['messages'], function( i, resp ) {
					$shop = resp.stock_shop;
					$storage = resp.stock_storage;
					$avaliability = 0;
					
					if(resp.quantity > $shop)
					{
						if(resp.quantity > $storage + $shop)
						{
							$avaliability = 2;
							$allAvaliability = 2;
						}
						else
						{
							$avaliability = 1;
							if($allAvaliability < $avaliability)
							{
								$allAvaliability = 1;
							}
						}
					}
					else
					{
						
					}
					
					if($status != "Paid")
					{
						if($avaliability == 1)
						{
							$data += "<tr class='s_danger_1'>";
						}
						else if($avaliability == 2)
						{
							$data += "<tr class='s_danger_2'>";
						}
						else
						{
							$data += "<tr>";
						}
					}
					else
					{
						$data += "<tr>";
					}
					$data += "<input id='hidden_id' type=hidden value='"+resp.id+"'/>";
					$data += "<input id='hidden_shop' type=hidden value='"+$shop+"'/>";
					$data += "<input id='hidden_storage' type=hidden value='"+$storage+"'/>";
					$data += "<td>"
					$data += resp.kodeProduk;
					$data += "</td><td>";
					$data += "<img src='{{asset('"+resp.foto+"')}}' width='80' height='80'>";
					$data += "</td><td>";
					$data += resp.warna;
					$data += "</td>";
					$data += "<td class='f_td_excel_xlabel'>";
					$data += "<span class='f_excel_xlabel' id=' style=''line-height: 30px;' >"+ resp.quantity +"</span>";
					$data += "<input type='text' id='' class='f_excel_xinput form-control input-sm hidden f_qty_transaction' style=''/>";
					$data += "</td>";
					$data += "<td>";
					$data += resp.stock_shop + " | " + resp.stock_storage; 
					$data += "</td>";
					$data += "<td class='f_price_transaction'>Rp ";
					$data += toRp(parseInt(resp.price)/parseInt(resp.quantity));
					$data += "</td><td class='f_subtotal_price_transaction'>Rp ";
					$data += toRp(resp.price);
					$data += "</td>";
					$data += "<td>";
					$data += "<input id='hidden_id_delete' type=hidden value='"+resp.id+"'/>";
					$data += "<button type='button'class='btn btn-danger f_delete_row_pesanan_vtrans btn-xs'><span class='glyphicon glyphicon-remove'></span></button>";
					$data += "</td>";
					$data += "</tr>"
					$('#transaction_detail_content').html($data);
					$total += parseInt(parseInt(resp.price)/parseInt(resp.quantity)) * parseInt(resp.quantity);
					//alert($allAvaliability);
				});
				//$('#transaction_subtotal_detail').text("Rp " + toRp($total));
				$('#transaction_diskon_detail').val(parseInt(toAngka($discount))/1000);				
				$('#transaction_tax_detail').text($tax);	
				$total -= toAngka($discount);
				$tax = $total * toAngka($tax) / 100;
				$total += $tax;				
				$('#transaction_total_detail').text("Rp " + toRp($total));
				
				if($status == "Paid")
				{
					$('#f_uang_bayaran').val("Rp " + toRp($paid));
					$('#f_uang_bayaran').attr('disabled','disabled');
					$('#transaction_diskon_detail').attr('disabled','disabled');
					$kembalian = parseInt($paid) - parseInt($total);
					$('#f_uang_kembalian').text("Rp " + toRp($kembalian));
					$('#save-btn').addClass('hidden');
					$('#save-btn').addClass('paid');
				}
				else
				{
					$('#f_uang_bayaran').removeAttr('disabled');
					$('#transaction_diskon_detail').removeAttr('disabled');
					$('#f_uang_kembalian').text("");
					$('#save-btn').removeClass('hidden');
					//alert($allAvaliability);
					if($allAvaliability == 2)
					{
						$('#save-btn').addClass('hidden');
					} 
				}
							
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
	});
	
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

	$( 'body' ).on( "click",'.view_void_button', function() {
		$('#tableRep').val($(this).prev().val());
		//alert($(this).prev().val());
	});
	
	$( 'body' ).on( "click",'.yes-btn', function() {
		//ajax void
		$id = $('#tableRep').val();
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('david.make_void')}}',
			data: {
				'data' : $id
			},
			success: function(response){
				if(response['code'] == 200)
				{
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
	});

	/*------- MERUBAH Kuantitas Barang | Detail TRANSAKSI - START -------*/
	$( 'body' ).on( "click",'.f_td_excel_xlabel', function() {
		$(this).children('.f_excel_xlabel').siblings('.f_excel_xinput').removeClass('hidden');
		$(this).children('.f_excel_xlabel').siblings('.f_excel_xinput').val($(this).text());
		$(this).children('.f_excel_xlabel').addClass('hidden');
	});
	$( 'body' ).on( "keypress",'.f_excel_xinput', function(e) {
		var key = e.which;
		if(key == 13)  
		{
			$(this).siblings('.f_excel_xlabel').text($(this).val());
			$(this).siblings('.f_excel_xlabel').removeClass('hidden');
			$(this).addClass('hidden');
		}
	});
	/*------- MERUBAH Kuantitas Barang | Detail TRANSAKSI - END -------*/

	$( 'body' ).on( "click",'.print-toko-btn', function() {
		window.open("{{URL::route('david.view_print_toko')}}"+"?dataT="+$(this).attr('id'));
	});
	$( 'body' ).on( "click",'.print-konsumen-btn', function() {
		window.open("{{URL::route('david.view_print_konsumen')}}"+"?dataT="+$(this).attr('id'));
	});
	
	/*------- HUBUNGAN Quantity, Subtotal | Detail TRANSAKSI - START -------*/
	
	$( 'body' ).on( "keypress",'.f_qty_transaction', function(e) {
		var key = e.which;
		if(key == 13)  
		{
			//alert($(this).val());
			var sub_tot_text = toAngka($(this).closest('tr').find('.f_price_transaction').text());
			var perkalian_subtotal = sub_tot_text*($(this).val());
			//alert(perkalian_subtotal);
			$(this).closest('tr').find('.f_subtotal_price_transaction').text('Rp ' + toRp(perkalian_subtotal));
			$total = 0;
			$("#transaction_detail_content tr").each(function(i, v)
			{
				$totalPrice = $(this).children('td')[6].innerText;
				$total += toAngka($totalPrice);
			});
			$total -= toAngka($('#transaction_diskon_detail').val())*1000;
			$tax = $total * toAngka($('#transaction_tax_detail').text()) / 100;
			$total += $tax;
			$('#transaction_total_detail').text("Rp " + toRp($total));
			
			//cek stock
			$shop = $(this).closest('tr').find('#hidden_shop').val();
			$storage = $(this).closest('tr').find('#hidden_storage').val();
			$avaliability = 0;
			if(parseInt($(this).val()) > parseInt($shop))
			{
				if(parseInt($(this).val()) > parseInt(parseInt($storage) + parseInt($shop)))
				{
					$avaliability = 2;
				}
				else
				{
					$avaliability = 1;
				}
			}
			else
			{
				
			}
			
			if($avaliability == 1)
			{
				$(this).closest('tr').removeClass('s_danger_2');
				$(this).closest('tr').addClass('s_danger_1');
				$(this).closest('tr').removeClass('error');
			}
			else if($avaliability == 2)
			{
				$(this).closest('tr').removeClass('s_danger_1');
				$(this).closest('tr').addClass('s_danger_2');
				$(this).closest('tr').addClass('error');
			}
			else
			{
				$(this).closest('tr').removeClass('s_danger_2');
				$(this).closest('tr').removeClass('s_danger_1');
				$(this).closest('tr').removeClass('error');
			}
			$canContinue = 1;
			$("#transaction_detail_content tr").each(function(i, v)
			{
				if($(this).hasClass('error'))
				{
					$canContinue = 0;
				}
			});
			
			if($canContinue == 0)
			{
				$('#save-btn').addClass('hidden');
			}
			else
			{
				if($('#save-btn').hasClass('paid'))
				{
				
				}
				else
				{
					$('#save-btn').removeClass('hidden');
				}
			}
		}
		
		
	});
	
	//menghapus tr detail pesanan
	$('body').on('click','.f_delete_row_pesanan_vtrans',function(){
		$id = $(this).prev().val();
		//delete the row
		$(this).closest('tr').remove();
		//siapkan variable temp subtotal
		var f_new_subtotal = 0; 

		//foreach subtotal per row
		$allAvaliability = 0;
		$('#transaction_detail_content tr').each(function(){
		 	f_new_subtotal += toAngka( $(this).find('.f_subtotal_price_transaction').text() );
			
			$shop = $(this).closest('tr').find('#hidden_shop').val();
			$storage = $(this).closest('tr').find('#hidden_storage').val();
			
			$avaliability = 0;
			if(parseInt($(this).children('td')[3].innerText) > parseInt($shop))
			{
				if(parseInt($(this).children('td')[3].innerText) > parseInt(parseInt($storage) + parseInt($shop)))
				{
					$avaliability = 2;
					$allAvaliability = 2;
				}
				else
				{
					$avaliability = 1;
					if($allAvaliability < $avaliability)
					{
						$allAvaliability = 1;
					}
				}
			}
			else
			{
				
			}
			
		});
		$('#save-btn').removeClass('hidden');
		if($allAvaliability == 2)
		{
			$('#save-btn').addClass('hidden');
		}
		
		if($('#save-btn').hasClass('paid'))
		{
			$('#save-btn').addClass('hidden');
		}

		var f_cur_transaction_diskon_detail = toAngka( $('#transaction_diskon_detail').val() ) * 1000;
		var f_cur_transaction_tax_detail = toAngka( $('#transaction_tax_detail').text() ) / 100;

		var f_cur_discounted = f_new_subtotal - f_cur_transaction_diskon_detail;
		var f_cur_transaction_total_detail = f_cur_discounted + (f_cur_discounted*f_cur_transaction_tax_detail);

		$('#transaction_total_detail').text("Rp " + toRp(f_cur_transaction_total_detail));
		var current = $('#deleted_order').val();
		if(current == "-")
		{
			current = "";
		}
		$('#deleted_order').val(current+$id+",");
		//alert(f_cur_transaction_total_detail);

		//alert(this_f_subtotal_price_transaction);
		//alert(this_transaction_total_detail);
		//
	});
	</script>
	@stop
