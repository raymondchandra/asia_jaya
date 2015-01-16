@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<ol class="breadcrumb">
  					<li><a href="#">Data Customer</a></li>
					<li class="active">Transaction History</li>
				</ol>
				<h3 style="float: left;">
					Transaction History | {{$customer->id}} | {{$customer->name}}
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
							<th class="table-bordered" width="100">
								<a href="javascript:void(0)">is_void</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">status</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">created_at</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Sales Name</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="100">Command</th>
						</thead>
						<thead>
							<tr>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td><input type="text" class="form-control input-sm"></td>
								<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
							</tr>
						</thead>
						<tbody>
							@if($transaction!=null)
								@foreach($transaction as $trans)
									<tr> 
										<td>
											{{ $trans->id }}
											<input type="hidden" id="hidden_trans_tax_{{$trans->id}}" value="{{$trans->tax}}" />
										</td>
										<td id="">{{ $trans->total }}</td>
										<td id="hidden_trans_discount_{{$trans->id}}">{{ $trans->discount }}</td>
											@if($trans->is_void == 0)
												<td id="is_void_{{$trans->id}}">False</td>
											@else
												<td id="is_void_{{$trans->id}}">True</td>
											@endif
										<td id="status_{{$trans->id}}">{{ $trans->status }}</td>
										<td id="">{{ $trans->created_at }}</td>
										<td id="">{{ $trans->salesName }}</td>
										<td>
											<button id="detail_{{$trans->id}}" class="btn btn-info btn-xs view_detail_button"  data-toggle="modal" data-target=".pop_up_detail_transaction">View Detail</button>
											<input type="hidden" value="{{$trans->id}}" />
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

	@include('pages.customer.pop_up_detail_transaction')
	
	<script>
		$('body').on('click','.view_detail_button',function(){
		$id = $(this).next().val();
		//alert($id);
		$('#transaction_detail_content').html("");
		$('#transaction_subtotal_detail').text("");
		$('#transaction_diskon_detail').text("");				
		$('#transaction_tax_detail').text("");			
		$('#transaction_total_detail').text("");
		$('#transaction_status_detail').text("");
		$('#transaction_is_void_detail').text("");
		$discount = $('#hidden_trans_discount_'+$id).text();
		$tax = $('#hidden_trans_tax_'+$id).val();
		$is_void = $('#is_void_'+$id).text();
		$status = $('#status_'+$id).text();
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
					$data += "<img src=" + resp.foto + " width='100' height='100'>";
					$data += "</td><td>";
					$data += resp.warna;
					$data += "</td><td>";
					$data += resp.quantity;
					$data += "</td><td>Rp ";
					$data += toRp(resp.hargaSatuan);
					$data += "</td><td>Rp ";
					$data += toRp(parseInt(resp.hargaSatuan) * parseInt(resp.quantity));
					$data += "</td>";
					$data += "</tr>"
					$('#transaction_detail_content').html($data);
					$total += parseInt(resp.hargaSatuan) * parseInt(resp.quantity);
				});
				$('#transaction_status_detail').text($status);
				$('#transaction_is_void_detail').text($is_void);
				$('#transaction_subtotal_detail').text("Rp " + toRp($total));
				$('#transaction_diskon_detail').text("Rp " + toRp(toAngka($discount)));				
				$('#transaction_tax_detail').text($tax);			
				$('#transaction_total_detail').text("Rp " + toRp($total));			
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
	</script>

	@stop
