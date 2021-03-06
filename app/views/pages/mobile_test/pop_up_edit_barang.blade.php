<div class="modal fade" id="pop_up_edit_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
				<input type="hidden" id="rowRep" value="">
				<input type="hidden" id="tabRep" value="">
				<input type="hidden" id="minPrice" value="">
				<!-- newcode -->
				<input type="hidden" id="modalPrice" value="">
				<input type="hidden" id="currentTotal" value="">
			</div>
			<div class="f_slider_alert hidden"  style="text-align: center; padding-top:20px;">
				Apakah Anda yakin ingin menghapus barang ini?
				<span class="clearfix">
				</span>
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
						<label class="g-sm-3 control-label">Merk</label>
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
					<!--<div class="form-group" style="margin-bottom: 0px;">
						<label class="g-sm-3 control-label">Harga Min</label>
						<div class="g-sm-9">-->
							<!-- newcode -->
							<input type="hidden" id="edit_harga_modal" value=""/>
							<input type="hidden" id="edit_harga_min" value=""/>							
						<!--</div>
					</div>-->
					<div class="form-group" style=" ">
						<label for="" class="g-sm-3 control-label">Harga@</label>
						<div class="g-sm-6">
							<!--<div class="input-group"> -->  
								<div class="input-group">
									<input type="number" class="form-control" id="f_hsatuan_qty" aria-describedby="basic-ribuan">
									<span class="input-group-addon" id="basic-ribuan">.000</span>
									
								</div>
							<!--	<span class="input-group-addon">.000</span>
							</div> -->
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 0px;"> 
						<label for="" class="g-sm-3 control-label">Qty.</label>
						<div class="g-sm-6">
							<!--<input type="number" class="form-control" value="" id="f_edit_qty">-->

							<div class="input-group">
							  <span class="input-group-addon ff_qty_min"><span class="glyphicon glyphicon-minus"></span></span>
							  <input type="number" class="form-control" value="" id="f_edit_qty">
							  <span class="input-group-addon ff_qty_plus"><span class="glyphicon glyphicon-plus"></span></span>
							</div>
						</div>
					</div>
					<div class="form-group" style="margin-bottom: 0px;">
						<label class="g-sm-3 control-label">Subtotal</label>
						<div class="g-sm-9">
							<p class="form-control-static" id="f_subtotal_edit"></p>
						</div>
						<script>
						$('body').on('keyup','#f_edit_qty',function(){
							var newVal = parseInt(toAngka($('#f_hsatuan_qty').val()))*1000;
							var newQty = $('#f_edit_qty').val();
							$('#f_subtotal_edit').text("Rp " + toRp(parseInt(newVal)*parseInt(newQty)));
						});
						$('body').on('keyup','#f_hsatuan_qty',function(){
							/*
							$min_price = $('#minPrice').val();
							if(parseInt($('#f_hsatuan_qty').val()) < parseInt($min_price))
							{
								$('#f_hsatuan_qty').val($min_price);
							}
							$('#f_subtotal_edit').text("Rp " + $('#f_hsatuan_qty').val()*$('#f_edit_qty').val());
							*/
						});
						$('body').on('click','.ff_qty_min',function(){ 
							if($('#f_edit_qty').val() != 1){
								var qty_temp = parseInt($('#f_edit_qty').val())-1; 
								$('#f_edit_qty').val(qty_temp);
								$('#f_subtotal_edit').text("Rp " + toRp( ($('#f_hsatuan_qty').val()*1000 )*qty_temp) );
							}
						});
						$('body').on('click','.ff_qty_plus',function(){ 
							var qty_temp = parseInt($('#f_edit_qty').val())+1; 
							$('#f_edit_qty').val(qty_temp);
							$('#f_subtotal_edit').text("Rp " + toRp( ($('#f_hsatuan_qty').val()*1000 )*qty_temp) );
						});
						</script>
					</div>

				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left f_slide_alert" id="deleteButton">Delete</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="changeButton" >Save changes</button>
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
					$('.f_loader_container').removeClass('hidden');

					$row_id = $('#rowRep').val();
					$oldTotal = $('#currentTotal').val();
					$inc = $('#tabRep').val();
					$currentTotal = toAngka($('#subtotal_text_'+$inc).text());

					$total = $currentTotal - $oldTotal;
					
					$('#subtotal_text_'+$inc).text("Rp " + $total);
					$('#'+$row_id).remove();
					$('.f_slider_alert').addClass('hidden');
					setTimeout(function(){ 
						$('.f_loader_container').addClass('hidden');
					}, 200);
				});

				$('body').on('click','#changeButton',function(){
					//show loader					
					$('.f_loader_container').removeClass('hidden');					
					setTimeout(function(){ $('.f_loader_container').addClass('hidden'); }, 2000);
						

					//prevent quantity minus
					if($('#f_edit_qty').val() < 1){
						alert("kuantitas harus lebih besar dari 0");
						return;
					}

					$row_id = $('#rowRep').val();
					$('#quantity_'+$row_id).text($('#f_edit_qty').val());
					
					
					$oldTotal = $('#currentTotal').val();
					$newTotal = ($('#f_hsatuan_qty').val()*1000)*$('#f_edit_qty').val();
					$('#price_'+$row_id).text("" + toRp($newTotal));
					$inc = $('#tabRep').val(); 


					if( (( parseInt($('#stock_shop_'+$row_id).text()) + parseInt($('#stock_storage_'+$row_id).text()) ) < $('#f_edit_qty').val()) )
					{
						$("#" + $row_id).removeClass('s_danger_1');
						$("#" + $row_id).addClass('s_danger_2'); 
						alert();
	 				}else if( (parseInt($('#stock_shop_'+$row_id).text()) < $('#f_edit_qty').val()) && (( parseInt($('#stock_shop_'+$row_id).text()) + parseInt($('#stock_storage_'+$row_id).text()) ) >= $('#f_edit_qty').val()) )
					{
						$("#" + $row_id).removeClass('s_danger_2');
						$("#" + $row_id).addClass('s_danger_1');
	 				}
					else
					{ 
						$("#" + $row_id).removeClass('s_danger_1');
						$("#" + $row_id).removeClass('s_danger_2');
	 				}
						
					$currentTotal = toAngka($('#subtotal_text_'+$inc).text());


					$total = $currentTotal + $newTotal - $oldTotal;
					$('#subtotal_text_'+$inc).text("Rp " + toRp($total) );
					$('.f_slider_alert').addClass('hidden');

				});
				

				/* -- jan 9 2015 | START -- */
				/* -- button disabled error prevention -- */
				//xxx $('#f_hsatuan_qty').on('input', function() {
				$('#f_hsatuan_qty').on('input', function() {
				    var ff_harga_min = parseFloat( toAngka($(this).closest('.form-horizontal').find('#edit_harga_min').val()) );
			   		var ff_harga_modal =  parseFloat( toAngka($(this).closest('.form-horizontal').find('#edit_harga_modal').val()) );				   					   					   	
			   		if(ff_harga_modal < ff_harga_min){
			   			var lowest = ff_harga_modal;
			   		}else{
			   			var lowest = ff_harga_min;
			   		}

				   // if( ($(this).val() < (ff_harga_min/1000) ) || isNaN($(this).val())){
				   // if( ($(this).val() < (lowest/1000) ) || isNaN($(this).val())){
				   //xxx if( ($(this).val() < 0 ) || isNaN($(this).val())){	
				   if( isNaN($(this).val()) ){
						$('#changeButton').addClass('hidden');						
				   }else if( ($(this).val()*1000) < lowest ){
				   		$('#changeButton').attr('disabled','disabled');				   		
				   } else {				   		
				   		$('#changeButton').removeAttr('disabled');				   		
				   }  
					$('#f_subtotal_edit').text("Rp " + toRp( ($('#f_hsatuan_qty').val()*1000 )*$('#f_edit_qty').val()  ) );

				});

				$('#f_edit_qty').on('input', function() {   

				  if( $.isNumeric( $(this).val() ) ){
				   	$('#changeButton').removeAttr('disabled');
				   } else {
				   	$('#changeButton').attr('disabled','disabled');
				   } 
				});
				/* -- jan 9 2015 | END -- */
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

		</div>
	</div>
</div>