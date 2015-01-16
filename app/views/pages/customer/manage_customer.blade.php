@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<?php
			
		function toMoney($val,$symbol='Rp ',$r=0)
		{
			$n = $val;
			$sign = ($n < 0) ? '-' : '';
			$i = number_format(abs($n),$r,",",".");

			return  $symbol.$sign.$i;
		}
	?>
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
								@if($filtered == 0)
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Customer Name</a>
								@if($filtered == 0)
										@if($sortBy == 'name')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Count Belanja</a>
								@if($filtered == 0)
										@if($sortBy == 'countTrans')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'countTrans', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'countTrans', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'countTrans', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'countTrans', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'countTrans', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'countTrans', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Total Money Spend</a>
								@if($filtered == 0)
										@if($sortBy == 'total')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Created At</a>
								@if($filtered == 0)
										@if($sortBy == 'created_at')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('custController@view_customer', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@else
												<a href="{{action('custController@view_customer', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
											@endif
										@else
											<a href="{{action('custController@view_customer', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'count'=>$count,'created_at'=>$created_at))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="100">Command</th>
						</thead>
						<thead>
							<tr>
								<td><input type="text" class="form-control input-sm" id="input_1" ></td>
								<td><input type="text" class="form-control input-sm" id="input_2"></td>
								<td><input type="text" class="form-control input-sm" id="input_3" placeholder=" > input"></td>
								<td><input type="text" class="form-control input-sm" id="input_4" placeholder=" > input"></td>
								<td><input type="text" class="form-control input-sm" id="input_5" placeholder="yyyy-MM-dd hh-mm-ss"></td>
								<td width="">
									<a class="btn btn-primary btn-xs" id="filter_button">Filter</a>
									<a class="btn btn-primary btn-xs" id="unfilter_button"><span class="glyphicon glyphicon-refresh" style="margin-right: 5px;"></span>Reset</a>
								</td>
							</tr>
						</thead>
						<tbody>
							@if($datas != null)
								@foreach($datas as $data)
								<tr> 
									<td>{{ $data->id }}</td>
									<td id="">{{ $data->name }}</td>
									<td id="">{{ $data->countTrans }}</td>
									<td id="">
										@if($data->total == null)
											Rp 0
										@else
											{{ toMoney($data->total) }}
										@endif
										</td>
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
			//$('#totalTransaksi').text("Rp " + $total);
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
		
		$('body').on('click','#unfilter_button',function(){
			window.location = "{{URL::route('gentry.view_customer')}}";
		});
		
		$('body').on('click','#filter_button',function(){
			$id = $('#input_1').val();
			if($id == ''){
				$id = '-';
			}
			
			$name = $('#input_2').val();
			if($name == ''){
				$name = '-';
			}
			
			$total = $('#input_4').val();
			if($total == ''){
				$total = '-';
			}
			
			$count = $('#input_3').val();
			if($count == ''){
				$count = '-';
			}
			
			$created_at = $('#input_5').val();
			if($created_at == ''){
				$created_at = '-';
			}
			
			
			
			window.location = "{{URL::route('gentry.view_customer')}}" + "?filtered=1&id="+$id+"&name="+$name+"&total="+$total+"&count="+$count+"&created_at="+$created_at;
		});
	</script>

	@stop
