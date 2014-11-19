<div class="modal fade" id="pop_up_cari_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Cari Barang</h4>
				<input type="hidden" id="tableRep" />
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group has-feedback">
						<div class="g-sm-12">
							<input type="search" class="form-control" id="barang_text_box" placeholder="kode atau nama produk">
							<span class="glyphicon glyphicon-search form-control-feedback"></span>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-striped">
					<thead>
						<!--<tr>
							<th rowspan="2">
								Kode 
							</th>
							<th rowspan="2">
								Nama 
							</th>
							<th rowspan="2">
								Warna 
							</th>
							<th rowspan="2">
								Stok
							</th>
							<th rowspan="2">
								Price
							</th>
						</tr>
						<tr>
							<th>
								Toko
							</th>
							<th>
								Gdg
							</th>
						</tr>-->
					</thead>
					<tbody class="f_table_search" id="searchContent">
							<style>
							.f_table_search > tr:active > td {
								background-color: #E8CD02 !important;
							}
							</style>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	$('body').on('keyup','#barang_text_box',function(){
		$keyword = $('#barang_text_box').val();
		//alert($keyword);
		$.ajax({
			type: 'GET',
			url: '{{URL::route('david.getProductLiveSearch')}}',
			data: {
				'keyword' : $keyword
			},
			success: function(response){
				if(response['code'] == '404')
				{
					//gagal
					$data = "<tr><td> No Result Found </td></tr>";
					$('#searchContent').html($data);
				}
				else
				{
					//berhasil...foreach setiap barang
					$data = "";
					$.each(response['messages'], function( i, resp ) {
						$data = $data + "<tr id='row_" + resp.id + "' class='search_row' style='border-bottom: 1px solid #000 !important;' data-dismiss='modal'><td><span style='display: block;'>";
						$data = $data + "<img src='' width='75' height='75' class='pull-left' style='margin-right:8px;'>";
						$data = $data + "#" + resp.product_code + " / " + resp.color + " / <span class='pull-right'>";
						$data = $data + resp.stock_shop + " | " + resp.stock_storage + "</span> </span> <span style='display: block;'> <span class='pull-left'>";
						$data = $data + resp.name + "</span>   <span class='pull-right'>";
						$data = $data + "IDR " + toRp(resp.sales_price) + "</span> </span>";
						$data = $data + "<span class='hiddenVal'>";
						$data = $data + "<input type='hidden' value='" + resp.id + "' id='id_" + resp.id + "' class='id' />";
						$data = $data + "<input type='hidden' value='" + resp.product_code + "' id='code_" + resp.id + "' />";
						$data = $data + "<input type='hidden' value='" + resp.color + "' id='color_" + resp.id + "' />";
						$data = $data + "<input type='hidden' value='" + resp.stock_shop + "' id='stock_shop_" + resp.id + "' />";
						$data = $data + "<input type='hidden' value='" + resp.stock_storage + "' id='stock_storage_" + resp.id + "' />";
						$data = $data + "<input type='hidden' value='" + resp.name + "' id='name_" + resp.id + "' />";
						$data = $data + "<input type='hidden' value='" + resp.sales_price + "' id='price_" + resp.id + "' />";
						$data = $data + "<input type='hidden' value='" + resp.min_price + "' id='min_price_" + resp.id + "' />";
						$data = $data + "</span>";
						$data = $data + "</td></tr>";
						
					});
					$('#searchContent').html($data);
				}
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
	});
	//kode buat search..
	$('body').on('click','.search_row',function(){
		$inc = $('#tableRep').val();
		$id = $(this).children().first().children('.hiddenVal').children('.id').val();
		$product_code = $('#code_'+$id).val();
		$color = $('#color_'+$id).val();
		$stock_shop = $('#stock_shop_'+$id).val();
		$stock_storage = $('#stock_storage_'+$id).val();
		$name = $('#name_'+$id).val();
		$price = $('#price_'+$id).val();
		$min_price = $('#min_price_'+$id).val();
		
		if($('#'+ $product_code + "_" + $color + "_" + $inc).length)
		{
		
		}
		else
		{
			$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + $product_code + "</td> <td id='name_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + $name + "</td> <td id='color_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + $color + "</td> <td id='quantity_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + 1 + "</td> <td id='price_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + $price + "</td> <input type='hidden' id='hidden_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $min_price + "' </tr>";
			
			$('#pesanan_content_'+$inc).prepend($data);
			
			$subtotalNow = toAngka($('#subtotal_text_'+$inc).text());
			var a = parseInt($subtotalNow);
			var b = parseInt($price);
			var total = a+b;
			$('#subtotal_text_'+$inc).text("IDR " + toRp(total));
		}
		
		
	});
	
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
	
	function toAngka(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}
</script>