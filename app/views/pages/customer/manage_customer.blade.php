@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<ol class="breadcrumb">
					<li class="active">Data Customer</li>
				</ol>
				<h3 style="float: left;">
					Data Customer
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
								<a href="javascript:void(0)">Cust. ID</a>
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
								<a href="javascript:void(0)">Count Belanja</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Total Money Spend</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Created At</a>
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
								<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
							</tr>
						</thead>
						<tbody>
							@if($dataAll != null)
								@foreach($dataAll as $data)
								<tr> 
									<td>{{ $data->id }}</td>
									<td id="">{{ $data->name }}</td>
									<td id="">{{ $data->countTrans }}</td>
									<td id="">{{ $data->total }}</td>
									<td id="">{{ $data->created_at }}</td>
									<td>
										<!--href="{{URL::to('test/customer/transaction_history')}}"-->
										<input type="hidden" value="{{ $data->id }}" />
										<a id="detail_0" class="btn btn-info btn-xs" href="{{URL::to('fungsi/view_cust_trans?id='.$data->id)}}">View History</a>
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
	
	<script>
		/*$(document).ready(function(){
			//$total = $('#totalTransaksi').text();
			//$('#totalTransaksi').text("IDR " + $total);
		});*/
	
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
