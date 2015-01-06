@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Laporan Transaksi
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
								@if($filtered == 0)
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'id')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
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
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'name')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
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
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'total')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'total', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Discount</a>
								@if($filtered == 0)
										@if($sortBy == 'discount')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'discount')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'discount', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Tax</a>
								@if($filtered == 0)
										@if($sortBy == 'tax')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'tax')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'tax', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Kar. ID</a>
								@if($filtered == 0)
										@if($sortBy == 'sales_id')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'sales_id', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'sales_id', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'sales_id', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'sales_id')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'sales_id', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'sales_id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'sales_id', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Username</a>
								@if($filtered == 0)
										@if($sortBy == 'username')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'username')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'username', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="120">
								<a href="javascript:void(0)">Void</a>
								@if($filtered == 0)
										@if($sortBy == 'is_void')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'is_void')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'is_void', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
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
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'0'))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										@if($sortBy == 'status')
											@if($order == 'asc')
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'desc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@else
												<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
											@endif
										@else
											<a href="{{action('transController@view_all_transaction2', array('sortBy' => 'status', 'order' => 'asc', 'filtered'=>'1','id'=>$id,'name'=>$name,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'sales_id'=>$sales_id,'username'=>$username,'void'=>$void,'status'=>$status))}}">
										@endif
									@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="100">View Detail</th>
							<th class="table-bordered" width="100">Print</th>
						</thead>
						<thead>
							<tr>
								
								<td><input type="text" class="form-control input-sm" id="filter_id"></td>
								<td><input type="text" class="form-control input-sm" id="filter_name"></td>
								<td><input type="text" class="form-control input-sm" id="filter_total"></td>
								<td><input type="text" class="form-control input-sm" id="filter_discount"></td>
								<td><input type="text" class="form-control input-sm" id="filter_tax"></td>
								<td><input type="text" class="form-control input-sm" id="filter_sales_id"></td>
								<td><input type="text" class="form-control input-sm" id="filter_username"></td>
								<td>
									<select class="form-control input-sm" id="filter_void">
										<option value="true">true</option>
										<option value="false">false</option>
									</select>
								</td>
								<td>
									<select class="form-control input-sm" id="filter_status">
										<option value="true">paid</option>
										<option value="false">unpaid</option>
									</select>
								</td>
								<td width=""><a class="btn btn-primary btn-xs" id="filter_button">Filter</a></td>
								<td></td>
								
							</tr>
						</thead>
						<tbody>
							@if($datas != null)
								@foreach($datas as $data)
									<tr> 
										<td>{{$data->id}}</td>
										@if($data->name == "")
											<td id="hidden_trans_customer_name_{{$data->id}}">Tidak Ada Nama</td>
										@else
											<td id="hidden_trans_customer_name_{{$data->id}}">{{$data->name}}</td>
										@endif
										<td id="hidden_trans_total_{{$data->id}}">IDR {{$data->total}}</td>
										<td id="hidden_trans_discount_{{$data->id}}">IDR {{$data->discount}}</td>
										<td id="hidden_trans_tax_{{$data->id}}">{{$data->tax}}%</td>
										<td>{{$data->sales_id}}</td>
										<td>{{$data->username}}</td>
										@if($data->void == 0)
											<td>False</td>
										@else
											<td>True</td>
										@endif
										<td>{{$data->status}}</td>
										<td>
											<button id="detail_{{$data->id}}" class="btn btn-info btn-xs view_detail_button" data-toggle="modal" data-target=".pop_up_detail_transaction">View Detail</button>
											<input type="hidden" value="{{$data->id}}">
											<!-- Button trigger modal class ".alertYesNo" -->
										</td>
										<td>
											<button class="btn btn-warning btn-xs" data-toggle="modal" data-target="" style="display: block; margin-bottom: 5px;">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Toko
											</button>
											<button class="btn btn-success btn-xs" data-toggle="modal" data-target="">
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

	<script>
	
	$('body').on('click','#filter_button',function(){
		$id = $('#filter_id').val();
		if($id == ''){
			$id = '-';
		}
		
		$name = $('#filter_name').val();
		if($name == ''){
			$name = '-';
		}
		
		$total = $('#filter_total').val();
		if($total == ''){
			$total = '-';
		}
		
		$discount = $('#filter_discount').val();
		if($discount == ''){
			$discount = '-';
		}
		
		$tax = $('#filter_tax').val();
		if($tax == ''){
			$tax = '-';
		}
		
		$sales_id = $('#filter_sales_id').val();
		if($sales_id == ''){
			$sales_id = '-';
		}
		
		$username = $('#filter_username').val();
		if($username == ''){
			$username = '-';
		}
		
		var x = document.getElementById('filter_void');
		for(var i=0; i<x.options.length; i++){
			if(x.options[i].selected == true){
				$tempVal = x.options[i].value;
			}
		}
		if($tempVal == 'true'){
			$is_void = 1;
		}else if($tempVal == 'false'){
			$is_void = 0;
		}else{
			$is_void = '-';
		}
		
		var y = document.getElementById('filter_status');
		for(var i=0; i<y.options.length; i++){
			if(y.options[i].selected == true){
				$tempVal2 = y.options[i].value;
			}
		}
		if($tempVal2 == 'true'){
			$status = 'OK';
		}else if($tempVal2 == 'false'){
			$status = 'Not OK';
		}else{
			$status = '-';
		}
		
		window.location = "{{URL::route('david.view_all_transaction')}}" + "?filtered=1&id="+$id+"&name="+$name+"&total="+$total+"&discount="+$discount+"&tax="+$tax+"&sales_id="+$sales_id+"&username="+$username+"&void="+$is_void+"&status="+$status;
	});

	$('body').on('click','.view_detail_button',function(){
		$id = $(this).next().val();
		$('#transaction_detail_content').html("");
		$('#transaction_subtotal_detail').text("");
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
					$data += "<img src=" + resp.foto + " width='100' height='100'>";
					$data += "</td><td>";
					$data += resp.warna;
					$data += "</td><td>";
					$data += resp.quantity;
					$data += "</td><td>IDR ";
					$data += toRp(resp.hargaSatuan);
					$data += "</td><td>IDR ";
					$data += toRp(parseInt(resp.hargaSatuan) * parseInt(resp.quantity));
					$data += "</td>";
					$data += "</tr>"
					$('#transaction_detail_content').html($data);
					$total += parseInt(resp.hargaSatuan) * parseInt(resp.quantity);
				});
				$('#transaction_subtotal_detail').text("IDR " + toRp($total));
				$('#transaction_diskon_detail').text("IDR " + toRp(toAngka($discount)));				
				$('#transaction_tax_detail').text($tax);			
				$('#transaction_total_detail').text("IDR " + toRp($total));			
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
