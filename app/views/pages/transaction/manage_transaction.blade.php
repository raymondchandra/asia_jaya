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
				<table class="table table-bordered table-hover ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" width="110">
								<a href="javascript:void(0)">Trans. ID</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Customer Name</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Total</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Discount</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Tax</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Kar. ID</a>
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
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Void</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="120">
								<a href="javascript:void(0)">Status</a>
								<a href="javascript:void(0)">
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
							@if($dataAll != null)
								@foreach($dataAll as $data)
									<tr> 
										<td>{{$data->id}}</td>
										@if($data->customerName == "")
											<td id="hidden_trans_customer_name_{{$data->id}}">Tidak Ada Nama</td>
										@else
											<td id="hidden_trans_customer_name_{{$data->id}}">{{$data->customerName}}</td>
										@endif
										<td id="hidden_trans_total_{{$data->id}}">IDR {{$data->total}}</td>
										<td id="hidden_trans_discount_{{$data->id}}">IDR {{$data->discount}}</td>
										<td id="hidden_trans_tax_{{$data->id}}">{{$data->tax}}%</td>
										<td>{{$data->sales_id}}</td>
										<td>{{$data->salesName}}</td>
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
				
				$.each(response['messages'], function( i, resp ) {
					$data += "<tr><td>";
					$data += resp.namaProduk;
					$data += "</td><td>";
					$data += "<img src='{{asset('"+resp.foto+"')}}' width='100' height='100'>";
					$data += "</td><td>";
					$data += resp.warna;
					$data += "</td><td class='f_td_excel_xlabel'>";
					$data += "<span class='f_excel_xlabel' id=' style=''line-height: 30px;' >"+ resp.quantity +"</span>";
					$data += "<input type='text' id='' class='f_excel_xinput form-control input-sm hidden f_qty_transaction' style=''/>";
					$data += "</td><td>IDR ";
					$data += toRp(resp.hargaSatuan);
					$data += "</td><td class='f_subtotal_price_transaction'>IDR ";
					$data += toRp(parseInt(resp.hargaSatuan) * parseInt(resp.quantity));
					$data += "</td>";
					$data += "</tr>"
					$('#transaction_detail_content').html($data);
					$total += parseInt(resp.hargaSatuan) * parseInt(resp.quantity);
				});
				//$('#transaction_subtotal_detail').text("IDR " + toRp($total));
				$('#transaction_diskon_detail').val(toAngka($discount));				
				$('#transaction_tax_detail').text($tax);			
				$('#transaction_total_detail').text("IDR " + toRp($total));
				if($status == "Paid")
				{
					$('#f_uang_bayaran').val("IDR " + toRp($paid));
					$('#f_uang_bayaran').attr('disabled','disabled');
					$('#transaction_diskon_detail').attr('disabled','disabled');
					$kembalian = parseInt($paid) - parseInt($total);
					$('#f_uang_kembalian').text("IDR " + toRp($kembalian));
					$('#save-btn').addClass('hidden');
				}
				else
				{
					$('#f_uang_bayaran').removeAttr('disabled');
					$('#transaction_diskon_detail').removeAttr('disabled');
					$('#f_uang_kembalian').text("");
					$('#save-btn').removeClass('hidden');
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
			var sub_tot_text = toAngka($(this).closest('tr').find('.f_subtotal_price_transaction').text());
			var perkalian_subtotal = sub_tot_text*($(this).val());
			//alert(perkalian_subtotal);
			$(this).closest('tr').find('.f_subtotal_price_transaction').text('IDR ' + toRp(perkalian_subtotal));
			$total = 0;
			$("#transaction_detail_content tr").each(function(i, v)
			{
				$totalPrice = $(this).children('td')[5].innerText;
				$total += toAngka($totalPrice);
			});
			$('#transaction_total_detail').text("IDR " + toRp($total));
		}
		
		
	});
	</script>
	@stop
