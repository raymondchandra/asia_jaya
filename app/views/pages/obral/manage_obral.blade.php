@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 class="pull-left">
					Daftar Stok Barang
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
				<!--<a href="{{URL::to('test/add_new_stock')}}" class="pull-right btn btn-success" >
					<span class="glyphicon glyphicon-plus" style="margin-right: 5px;"></span>Add New Stock
				</a>-->
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
							<th class="table-bordered" width="">
								<a href="javascript:void(0)">Jumlah Barang Obral</a> 
							</th>
							<!--
							<th class="table-bordered">
								Command
							</th>
							-->
						</tr>
						<!--<th class="table-bordered">Print</th>-->
					</thead>
					<thead>
						<!--
						<tr>
							
							<td><input type="text" class="form-control input-sm"></td>
							<td></td>
							<!--<td width=""><a class="btn btn-primary btn-xs">Filter</a></td>
							<td></td>-->
						<!--	
						</tr>
						-->
					</thead>
					<tbody>
							<tr> 
								<td>
									<input type="hidden" id="" value="" />
									<input type="hidden" id="" value="" />
									<span class="" id="kode_" style="line-height: 30px;">
									@if($quantity != null)
										{{$quantity}}
									@else
										0
									@endif
									</span>
								</td>
								<!--
								<td>
								<!--	<input type="hidden" value="" />
									<input type="hidden" value="" />
									<button class="btn btn-success btn-xs update_row_button" id="update_row_button" data-toggle="" data-target="" style="display: block;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Update Row
									</button>
									<button class="btn btn-danger btn-xs" data-toggle="" data-target="" style="display: block; margin-top: 5px;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Obral
									</button>
									<input type="hidden" value="" />
									<input type="hidden" value="" />
									<button class="btn btn-danger btn-xs  hapus_button" data-toggle="" data-target="" style="display: block; margin-top: 5px;margin-bottom: 5px;">
										<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Hapus
									</button>
									<input type="hidden" value="" />
									<input accept="image/*" type="file" class="filestyle edit_gambar_button" data-input="false" id="edit_gambar_button_">
								--><!--
								</td>
								-->
							</tr>
								
								<script>
								

							</script>
</tbody>
</table>
</div>
</div>
</div>
</div>

@include('pages.stock.pop_up_add_stock')

<script>



$(":file").filestyle(
	{input: false}
);


$(".bootstrap-filestyle").find('label').addClass('btn-xs').addClass('btn-info').text('');
$(".bootstrap-filestyle").find('label').append('<span class="glyphicon glyphicon-folder-open" style="margin-right: 5px;"></span>Ubar Gambar');



</script>
@stop
