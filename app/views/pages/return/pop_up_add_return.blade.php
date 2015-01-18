<div class="modal fade pop_up_add_return" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Retur</h4>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="g-sm-12">

							<div class="form-group">
								<label class="g-sm-4 control-label">Kode Barang</label>
								<div class="g-sm-7">
									<p type="text" class="form-control-static" id="prod_name_pop"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-4 control-label">Jumlah Yang Dia Order</label>
								<div class="g-sm-7">
									<p type="text" class="form-control-static" id="prod_quantity_pop"></p>
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-4 control-label">Jumlah Yang Mau Dikembalikan</label>
								<div class="g-sm-6">
									<input type="text" class="form-control" id="quantity_pop">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-4 control-label">Tipe Retur</label>
								<div class="g-sm-6">
									<select class="form-control f_pilih_tipe_retur" id="type_return">
										<option value="1" selected="selected">tukar dengan barang yang sama</option>
										<option value="2">tukar dengan barang yang beda</option>
										<option value="3">tukar dengan uang</option>
									</select>
								</div>
							</div>
							<div class="form-group f_tukar_barang_beda hidden">
								<label class="g-sm-4 control-label">Kode Barang</label>
								<input type="hidden" id="id_trade_prod">
								<div class="g-sm-6">
									<input type="text" class="form-control f_search_barang_beda" id="barang_text_box">
								</div>

								<div class="g-sm-8 g-sm-push-2">
									<table class="table table-bordered">
										<tbody id="search_barang_return" class="hidden">
											<tr class="f_suggest_tukar_barang" id="barang_ceritanya">
												<td>
													<img src="" height="50" width="50" style="margin-right: 20px; float: left;">
													<p class="f_nama_barang_yang_mau_ditukar pull-left" style="line-height: 50px; margin: 0px;">Nama Barang Lain 1/Warna</p>
												</td>
											</tr>
											<tr class="f_suggest_tukar_barang" id="barang_ceritanya">
												<td>
													<img src="" height="50" width="50" style="margin-right: 20px; float: left;">
													<p class="f_nama_barang_yang_mau_ditukar pull-left" style="line-height: 50px; margin: 0px;">Nama Barang Lain 2</p>
												</td>
											</tr>
											<tr class="f_suggest_tukar_barang" id="barang_ceritanya">
												<td>
													<img src="" height="50" width="50" style="margin-right: 20px; float: left;">
													<p class="f_nama_barang_yang_mau_ditukar pull-left" style="line-height: 50px; margin: 0px;">Nama Barang Lain 3</p>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<script>
								$('body').on('click','.f_suggest_tukar_barang',function(){
									var t_barang =  $(this).find('.f_nama_barang_yang_mau_ditukar').text();
									var id_barang = $(this).find('.f_id_barang_yang_mau_ditukar').val();
									$('.f_search_barang_beda').val(t_barang);
									$('#search_barang_return').addClass('hidden');
									$('#id_trade_prod').val(id_barang);
									trigger = true;
								});
								</script>
							</div>
							<div class="form-group f_tukar_dengan_uang hidden">
								<label class="g-sm-4 control-label">Nominal Uang</label>
								<div class="g-sm-6">
									<input type="text" class="form-control f_input_tukar_uang" id="nominal_uang">
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-4 control-label"></label>
								<div class="g-sm-6">
									<input type="button" class="btn btn-success" data-dismiss="modal" id="save_pop" value="Save"/>
								</div>
							</div>

							<!--<div class="form-group">
								<label class="g-sm-9 control-label">Subtotal</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static">Rp 3.100.000</p>
								</div>
								<label class="g-sm-9 control-label">Diskon</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static">Rp 0</p>
									
								</div>
								<label class="g-sm-9 control-label"></label>
								<div class="g-sm-3">
									<hr style="float: left; width: 166px;"></hr>
									<span class="glyphicon glyphicon-plus pull-right" style="line-height: 39px;"></span>
								</div>
								<label class="g-sm-9 control-label">Total</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static">Rp 3.100.000</p>
								</div>
							</div>-->

							<!--<hr></hr>

							<button type="button" class="btn btn-success pull-right">
								Print Customer
							</button>
							<button type="button" class="btn btn-warning pull-right" style="margin-right: 20px;">
								Print Toko
							</button>-->

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
/*jQuery tipe retur*/
$('body').on('click','.f_pilih_tipe_retur', function(){

	var target = $(this).find(":selected").val();

	if(target == "2"){
		$('.f_tukar_barang_beda').removeClass('hidden');
		$('.f_tukar_dengan_uang').addClass('hidden');
		$('.f_input_tukar_uang').val('');
		$('.f_search_barang_beda').val('');
	}else if(target == "3"){
		$('.f_tukar_dengan_uang').removeClass('hidden');
		$('.f_tukar_barang_beda').addClass('hidden');
		$('.f_search_barang_beda').val('');
	}else{
		$('.f_tukar_dengan_uang').addClass('hidden');
		$('.f_tukar_barang_beda').addClass('hidden');
		$('.f_search_barang_beda').val('');
		$('.f_input_tukar_uang').val('');
	}
});

	$('body').on('keyup','#barang_text_box',function(){
		var trigger;
		trigger = false;
		$('#search_barang_return').removeClass('hidden');
		$keyword = $('#barang_text_box').val();
		//alert($keyword);
		
		$.ajax({
			type: 'GET',
			url: '{{URL::route('david.getProductLiveSearch')}}',
			data: {
				'keyword' : $keyword,
				'source' : "return";
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
					$("#search_barang_return").html("");
					$data = "";
					$.each(response['messages'], function( i, resp ) {
						$data += "<tr class='f_suggest_tukar_barang' id='barang_ceritanya'><td>";
						$data += "<img src='{{asset('"+resp.photo+"')}}' height='50' width='50' style='margin-right: 20px; float: left;'>";
						$data += "<p class='f_nama_barang_yang_mau_ditukar pull-left' style='line-height: 50px; margin: 0px;'>"+ resp.name +" / "+resp.color+"</p>";
						$data += "<input type='hidden' class='f_id_barang_yang_mau_ditukar' value='"+resp.id+"'>";
						$data += "</td></tr>";
					});
					$("#search_barang_return").html($data);
					if(trigger == false)
					{
						$('#searchContent').html($data);
					}
				}
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
		
	});
</script>