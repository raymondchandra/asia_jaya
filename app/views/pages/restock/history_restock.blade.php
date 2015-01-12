@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3>
					History Restock

					<a href="{{URL::to('test/add_new_stock')}}" class="pull-right btn btn-success" >
						<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Add New Stock
					</a>
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>

			<div>
				<style>

				td.selected {
					background-color: #fcf5dd;
				}

				thead {
					background-color: #f5f5f5 !important;
				}

				</style>
				<table class="table table-bordered">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered">
								<a href="javascript:void(0)">Product Code</a>
								@if($filtered == 0)
									@if($sortBy == 'product_code')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'product_code', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'product_code')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'product_code', 'order' => 'desc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'product_code', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" style="width: 180px;">
								<a href="javascript:void(0)">Product Name</a>
								@if($filtered == 0)
									@if($sortBy == 'name')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'product_name')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'name', 'order' => 'desc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'name', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Warna</a>
								@if($filtered == 0)
									@if($sortBy == 'color')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'color', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'product_name')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'color', 'order' => 'desc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'color', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Restok ke Toko</a>
								@if($filtered == 0)
									@if($sortBy == 'stock_shop')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_shop', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'product_name')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_shop', 'order' => 'desc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_shop', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Restok ke Gudang</a>
								@if($filtered == 0)
									@if($sortBy == 'stock_storage')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_storage', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'product_name')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_storage', 'order' => 'desc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'stock_storage', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Waktu</a>
								@if($filtered == 0)
									@if($sortBy == 'created_at')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'0'))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'0'))}}">
									@endif
								@else
									@if($sortBy == 'product_name')
										@if($order == 'asc')
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'created_at', 'order' => 'desc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@else
											<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
										@endif
									@else
										<a href="{{action('historyRestockController@viewHistoryRestock', array('sortBy' => 'created_at', 'order' => 'asc', 'filtered'=>'1','code'=>$code,'name'=>$prod_name,'color'=>$color,'shop'=>$shop,'storage'=>$storage,'created_at'=>$time))}}">
									@endif
								@endif
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Command</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
						</tr>
						<!--<th class="table-bordered">Print</th>-->
					</thead>
					<thead>
						<tr>
							
							<td><input type="text" class="form-control input-sm" id="filter_code"></td>
							<td><input type="text" class="form-control input-sm" id="filter_name"></td>
							<td><input type="text" class="form-control input-sm" id="filter_color"></td>
							<td><input type="text" class="form-control input-sm" id="filter_shop"></td>
							<td><input type="text" class="form-control input-sm" id="filter_storage"></td>
							<td><input type="text" class="form-control input-sm" id="filter_time"></td>
							<td width="140">
							<a class="btn btn-primary btn-xs" id="filter_button" style="float: left;">Filter</a>
							
							<a class="btn btn-primary btn-xs" id="unfilter_button" style="float: left; margin-left: 5px;"><span class="glyphicon glyphicon-refresh" style="margin-right: 5px;"></span>Reset</a>
							</td>
							<!--<td></td>-->
							
						</tr>
					</thead>
					<tbody>
						@if($datas != null)
							@foreach($datas as $data)
								<tr> 
									<td>
										{{$data->product_code}}
									</td>
									<td>
										{{$data->name}}
									</td>
									<td>
										{{$data->color}}
									</td>
									<td>
										{{$data->stock_shop}}
									</td>
									<td>
										{{$data->stock_storage}}
									</td>
									<td>
										{{$data->created_at}}
									</td>
									<td>
										<input type="hidden" id="idProduct" value="" />
										<input type="hidden" id="idDetail" value="" />
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

								$idProduct = $(this).prev().prev().prev().val();
								$idDetail = $(this).prev().prev().val();

								$editName = $("span#name_"+$idProduct).text();
								$editColor = $("span#color_"+$idProduct).text();
								$editModal = $("span#modal_"+$idProduct).text();
								$editMin = $("span#min_"+$idProduct).text();
								$editSales = $("span#sales_"+$idProduct).text();
								$editShop = $("span#shop_"+$idProduct).text();
								$editStorage = $("span#storage_"+$idProduct).text();

								$.ajax({
									type: 'PUT',
									url: '{{URL::route('gentry.edit_stock')}}',
									data: {
										'idProduct' : $idProduct,
										'idDetail' : $idDetail,
										'editName' : $editName,
										'editColor' : $editColor,
										'editModal' : $editModal,
										'editMin' : $editMin,
										'editSales' : $editSales,
										'editShop' : $editShop,
										'editStorage' : $editStorage
									},
									success: function(response){
										alert('Perubahan Berhasil');
									},error: function(xhr, textStatus, errorThrown){
										alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
										alert("responseText: "+xhr.responseText);
									}
								},'json');
							}
						});
						</script>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@include('pages.stock.pop_up_add_stock')

<script>
	$('body').on('click','#filter_button',function(){
		$code = $('#filter_code').val();
		if($code == ''){
			$code = '-';
		}
		
		$name = $('#filter_name').val();
		if($name == ''){
			$name = '-';
		}
		
		$color = $('#filter_color').val();
		if($color == ''){
			$color = '-';
		}
		
		$shop = $('#filter_shop').val();
		if($shop == ''){
			$shop = '-';
		}
		
		$storage = $('#filter_storage').val();
		if($storage == ''){
			$storage = '-';
		}
		
		$time = $('#filter_time').val();
		if($time == ''){
			$time = '-';
		}
		

		window.location = "{{URL::route('david.view_restock_history')}}" + "?filtered=1&code="+$code+"&name="+$name+"&color="+$color+"&hop="+$shop+"&storage="+$storage+"&time="+$time;
	});

	$('body').on('click','#unfilter_button',function(){
		window.location = "{{URL::route('david.view_restock_history')}}";
	});
	/*$('body').on('click','.flogin',function(){
		$data = {
			'status' : '202',
			'text' : "Hello World!"
		}
		
		var json_data = JSON.stringify($data);
		
		$.ajax({
			url: '../test_login',
			type: 'POST',
			data: {
				'json_data':json_data
			},
			success: function (res) {
				alert(res)
			},
			error: function(jqXHR, textStatus, errorThrown){
						alert(errorThrown);
			}
		},'json');	
});*/

	var index = 0;
	//38 up, 40down

	var maxCellIndex = $('.table tr td').length;

	$(document).keydown(function(e) {
		$('.table tr td:eq(' + index + ')').removeClass('selected');

		var rows = $('.table tr').length;
		var columns = $('.table tr:eq(1) td').length;

		if (e.keyCode === 39) { //move right or wrap
			while( !$('.table tr td:eq(' + (++index) + ')') ) {
				if (index >= maxCellIndex) {
					// wrap both ways:
					index = -1;
				}
			}
		}
		if (e.keyCode === 37) { // move left or wrap
			--index;
			if (index < 0) {
				index = maxCellIndex;
			}
			while( !$('.table tr td:eq(' + (index) + ')') ) {
				if (index < 0) {
					// wrap both ways:
					index = maxCellIndex;
				} else {
					--index;
				}
			}
		}
		
		if (e.keyCode === 38) {  // move up
			index -= columns;
			if (index < 0) {
				index += maxCellIndex;
			}
			while( !$('.table tr td:eq(' + (index) + ')') ) {
				if (index < 0) {
					// wrap both ways:
					index += maxCellIndex;
				} else {
					index -= columns;
				}
			}
		}
		if (e.keyCode === 40) { // move down
			index += columns;
			if (index >= maxCellIndex) {
				index -= maxCellIndex;
			}
			while( !$('.table tr td:eq(' + (index) + ')') ) {
				if (index >= maxCellIndex) {
					// wrap both ways:
					index -= maxCellIndex;
				} else {
					index += columns;
				}


			}
		}
		$('.table tr td:eq(' + index + ')').addClass('selected');
		if($('.table tr td:eq(' + index + ')').children('.f_excel_xinput').hasClass('hidden') && e.which == 13) {
			var f_excel_xlabel_text = $('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').text();
			$('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').siblings('.f_excel_xinput').removeClass('hidden');
			$('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').siblings('.f_excel_xinput').val(f_excel_xlabel_text);
			$('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').addClass('hidden');
		}/*else if($('.table tr td:eq(' + index + ')').children('.f_excel_xlabel').hasClass('hidden')){
			var f_excel_xinput_text = $('.table tr td:eq(' + index + ')').children('.f_excel_xinput').val();
			$('.table tr td:eq(' + index + ')').children('.f_excel_xinput').siblings('.f_excel_xlabel').text(f_excel_xinput_text);
			$('.table tr td:eq(' + index + ')').children('.f_excel_xinput').siblings('.f_excel_xlabel').removeClass('hidden');
			$('.table tr td:eq(' + index + ')').children('.f_excel_xinput').addClass('hidden');
		}*/
	});
</script>
@stop
