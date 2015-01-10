<div class="modal fade" id="pop_up_edit_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
				<input type="hidden" id="rowRep" value="">
				<input type="hidden" id="tabRep" value="">
				<input type="hidden" id="minPrice" value="">
				<input type="hidden" id="currentTotal" value="">
			</div>
			<div class="f_slider_alert hidden"  style="text-align: center; padding-top:20px;">
				Apakah Anda yakin ingin menghapus produk ini?
				<button type="button" id="hyper_x" class="btn btn-danger" data-dismiss="modal">Ya</button>
				<button type="button" class="btn btn-primary f_slider_tutup" data-dismiss="">Tidak</button>
				<hr/>
			</div>

			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group" style="margin-bottom: 0px;">
						<label class="g-sm-3 control-label">Kode</label>
						<div class="g-sm-9">
							<p class="form-control-static" id="edit_code"></p>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 0px;">
						<label class="g-sm-3 control-label">Nama</label>
						<div class="g-sm-9">
							<p class="form-control-static" id="edit_nama"></p>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 0px;">
						<label class="g-sm-3 control-label">Warna</label>
						<div class="g-sm-9">
							<p class="form-control-static" id="edit_warna"></p>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 0px;">
						<label class="g-sm-3 control-label">Harga Min</label>
						<div class="g-sm-9">
							<p class="form-control-static" id="edit_harga_min"></p>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 0px;">
						<label for="" class="g-sm-3 control-label">Harga@</label>
						<div class="g-sm-4">
							<input type="number" class="form-control" id="f_hsatuan_qty" value="">
						</div>
						<label for="" class="g-sm-2 control-label">Qty.</label>
						<div class="g-sm-3">
							<input type="number" class="form-control" value="" id="f_edit_qty">
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 0px;">
						<label class="g-sm-3 control-label">Subtotal</label>
						<div class="g-sm-9">
							<p class="form-control-static" id="f_subtotal_edit"></p>
						</div>
						<script>
						$('body').on('keyup','#f_edit_qty',function(){
							$('#f_subtotal_edit').text("IDR " + $('#f_hsatuan_qty').val()*$('#f_edit_qty').val());
						});
						$('body').on('keyup','#f_hsatuan_qty',function(){
							/*
							$min_price = $('#minPrice').val();
							if(parseInt($('#f_hsatuan_qty').val()) < parseInt($min_price))
							{
								$('#f_hsatuan_qty').val($min_price);
							}
							$('#f_subtotal_edit').text("IDR " + $('#f_hsatuan_qty').val()*$('#f_edit_qty').val());
							*/
						})
						</script>
					</div>

				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left f_slide_alert" id="deleteButton">Delete</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="changeButton">Save changes</button>
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
			</div>
			<script>
				$('body').on('click','.f_slide_alert',function(){
					$('.f_slider_alert').removeClass('hidden');
					//alert("sad");
				});
				$('body').on('click','.f_slider_tutup',function(){
					$('.f_slider_alert').addClass('hidden');
					//alert("sad");
				});
				$('body').on('click','#hyper_x',function(){
					
					$row_id = $('#rowRep').val();
					$oldTotal = $('#currentTotal').val();
					$inc = $('#tabRep').val();
					$currentTotal = toAngka($('#subtotal_text_'+$inc).text());

					$total = $currentTotal - $oldTotal;
					
					$('#subtotal_text_'+$inc).text("IDR " + $total);
					$('#'+$row_id).remove();
					$('.f_slider_alert').addClass('hidden');
				});
				$('body').on('click','#changeButton',function(){
					$row_id = $('#rowRep').val();
					$('#quantity_'+$row_id).text($('#f_edit_qty').val());
					$oldTotal = $('#currentTotal').val();
					$newTotal = $('#f_hsatuan_qty').val()*$('#f_edit_qty').val();
					$('#price_'+$row_id).text("" + toRp($newTotal));
					$inc = $('#tabRep').val(); 
					
					$currentTotal = toAngka($('#subtotal_text_'+$inc).text());


					$total = $currentTotal + $newTotal - $oldTotal;
					$('#subtotal_text_'+$inc).text("IDR " + $total);
					$('.f_slider_alert').addClass('hidden');
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


				/* -- jan 9 2015 | START -- */
				/* -- button disabled error prevention -- */
				$('#f_hsatuan_qty').on('input', function() {  
				   var ff_harga_min = parseFloat($(this).closest('.form-horizontal').find('#edit_harga_min').text());
				   if( ($(this).val() < ff_harga_min) || isNaN($(this).val())){
				   	$('#changeButton').attr('disabled','disabled');
				   } else {
				   	$('#changeButton').removeAttr('disabled');
				   }
				});
				/* -- jan 9 2015 | END -- */
			</script>

		</div>
	</div>
</div>