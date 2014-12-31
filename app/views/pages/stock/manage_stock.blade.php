@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 class="pull-left">
					Daftar Stok Produk
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
				<a href="{{URL::to('test/add_new_stock')}}" class="pull-right btn btn-success" >
					<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Add New Stock
				</a>
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
							<th class="table-bordered" width="110">
								<a href="javascript:void(0)">Produk</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" style="width: 137px;">
								<a href="javascript:void(0)">Foto</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" style="width: 180px;">
								<a href="javascript:void(0)">Nama Produk</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Warna</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Modal</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Min.</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="140">
								<a href="javascript:void(0)">Harga Jual</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Stok Toko</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Stok Gudang</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Deleted</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								Obral
							</th>
						</tr>
						<!--<th class="table-bordered">Print</th>-->
					</thead>
					<thead>
						<tr>
							
							<td><input type="text" class="form-control input-sm"></td>
							<td></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td><input type="text" class="form-control input-sm"></td>
							<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
							<!--<td></td>-->
							
						</tr>
					</thead>
					<tbody>
						
						@if($products != null)
							@foreach($products as $prodList)
							<tr> 
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									{{$prodList->product_code}}
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<img src="{{$prodList->photo}}" width="120" height="120">
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="f_excel_xlabel f_cell_nama_produk" id="name_{{$prodList->id}}" style="line-height: 30px;">{{$prodList->name}}</span>
									<input type="text" class="f_excel_xinput f_cell_nama_produk_input form-control input-sm hidden" style=""/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="f_excel_xlabel" id="color_{{$prodList->id}}" style="line-height: 30px;">{{$prodList->color}}</span>
									<input type="text" class="f_excel_xinput form-control input-sm hidden" style=""/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="f_excel_xlabel" id="modal_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->modal_price}}">{{$prodList->modal_price}}</span>
									<input type="text" id="f_cell_harga_modal_input" class="f_excel_xinput form-control input-sm hidden" style=""/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="f_excel_xlabel" id="min_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->min_price}}">{{$prodList->min_price}}</span>
									<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="f_excel_xlabel" id="sales_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->sales_price}}">{{$prodList->sales_price}}</span>
									<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="" id="shop_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->stock_shop}}">{{$prodList->stock_shop}}</span>
									<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									<span class="" id="storage_{{$prodList->id}}" style="line-height: 30px;" data-modal="{{$prodList->stock_storage}}">{{$prodList->stock_storage}}</span>
									<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
								</td>
								<td>
									<input type="hidden" id="idProduct" value="{{$prodList->id}}" />
									<input type="hidden" id="idDetail" value="{{$prodList->idDetail}}" />
									@if($prodList->deleted == 0)
										no
									@else
										yes
									@endif
								</td>
								<td>
									<button class="btn btn-warning btn-xs" data-toggle="" data-target="" style="display: block;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Obral
									</button>
									<button class="btn btn-warning btn-xs" data-toggle="" data-target="" style="display: block;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Update Row
									</button>
									<button class="btn btn-warning btn-xs" data-toggle="" data-target="" style="display: block;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Ganti Foto
									</button>
									<button class="btn btn-warning btn-xs" data-toggle="" data-target="" style="display: block;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Hapus
									</button>
									<input type="file" class="filestyle" data-input="false">
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

								/*$( 'body' ).on( "click",'#f_cell_harga_modal', function() {
									// 'Getting' data-attributes using getAttribute
									var plant = document.getElementById('f_cell_harga_modal');
									var fruitCount = plant.getAttribute('data-modal'); // fruitCount = '12'

									// 'Setting' data-attributes using setAttribute
									plant.setAttribute('data-modal','7'); // Pesky birds
									$(this).text(plant.getAttribute('data-modal'));
								});*/
</script>
</tbody>
</table>
</div>
</div>
</div>
</div>

@include('pages.stock.pop_up_add_stock')

<script>

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


$(":file").filestyle({input: false}).filestyle({buttonText: 'Ubah Foto'});
</script>
@stop
