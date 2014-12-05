@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3>
					Daftar Stok Produk
					<button class="btn btn-success pull-right">
						<span class="glyphicon glyphicon-plus"></span>Add Stock
					</button>
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
								<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
								<!--<td></td>-->
								
							</tr>
						</thead>
						<tbody>
							
							<?php for($i=0; $i<30; $i++){
								?>
								<tr> 
									<td>
										824739
									</td>
									<td>
										<img src="" width="120" height="120">
									</td>
									<td>
										<span class="f_excel_xlabel f_cell_nama_produk" style="line-height: 30px;">Tas Trendy</span>
										<input type="text" class="f_excel_xinput f_cell_nama_produk_input form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" style="line-height: 30px;">Cyan</span>
										<input type="text" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="f_cell_harga_modal" style="line-height: 30px;" data-modal="400000">400000</span>
										<input type="text" id="f_cell_harga_modal_input" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">500000</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">600000</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">30</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										<span class="f_excel_xlabel" id="" style="line-height: 30px;" data-modal="400000">79</span>
										<input type="text" id="" class="f_excel_xinput form-control input-sm hidden" style=""/>
									</td>
									<td>
										Deleted
									</td>
									<!--<td>
										<button class="btn btn-warning btn-xs" data-toggle="" data-target="" style="display: block;">
											<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Toko
										</button>
										<button class="btn btn-success btn-xs" data-toggle="" data-target="">
											<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Customer
										</button>
									</td>-->
								</tr> 
								<?php }
								?>
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

@include('pages.transaction.pop_up_detail_transaction')

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
</script>
@stop
