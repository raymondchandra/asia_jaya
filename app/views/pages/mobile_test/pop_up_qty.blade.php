<div class="modal fade" id="pop_up_qty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Set Kuantitas</h4>
				<input type="hidden" id="tableRep" />
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group has-feedback">
						<label class="g-xs-4 control-label"> 
							Jumlah Kuantitas
						</label>
						<div class="g-xs-4"> 

							<div class="input-group">
							  <span class="input-group-addon ff_qty_min"><span class="glyphicon glyphicon-minus"></span></span>
							  <input type="number" class="form-control" id="ff_quant_first" value="1">
							  <span class="input-group-addon ff_qty_plus"><span class="glyphicon glyphicon-plus"></span></span>
							</div>
						</div>
					</div>
					<div class="form-group has-feedback">
						
						<div class="g-xs-3">
							<button type="button" class="btn btn-success ff_save_to_pesanan" data-dismiss="modal">Save</button>
						</div>
					</div>
				</div> 
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	$('body').on('click','.ff_save_to_pesanan', function(){

		if($('#'+ $product_code + "_" + $color + "_" + $inc).length)
		{
		
		}
		else
		{
			$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + $product_code + "</td> <td id='name_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + $name + "</td> <td id='color_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + $color + "</td> <td id='quantity_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + parseInt($('#ff_quant_first').val())*($quant.length) + "</td> <td class='ff_price_subtot' id='price_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
			$data = $data + "" + toRp($price) + "</td> <input type='hidden' id='hidden_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $min_price + "' </tr>";
			
			$('#pesanan_content_'+$inc).prepend($data);
			
			$subtotalNow = toAngka($('#subtotal_text_'+$inc).text());
			var a = parseInt($subtotalNow);
			var b = parseInt($price);
			var total = a+b;
			$('#subtotal_text_'+$inc).text("Rp " + toRp(total));
		}

	});


		$('body').on('click','.fq_qty_min',function(){ 
			if($('#ff_quant_first').val() != 1){
				var qty_temp = parseInt($('#ff_quant_first').val())-1; 
				$('#ff_quant_first').val(qty_temp);
				//$('#f_subtotal_edit').text("Rp " + $('#f_hsatuan_qty').val()*qty_temp);
			}
		});
		$('body').on('click','.fq_qty_plus',function(){ 
			var qty_temp = parseInt($('#ff_quant_first').val())+1; 
			$('#ff_quant_first').val(qty_temp);
			//$('#f_subtotal_edit').text("Rp " + $('#f_hsatuan_qty').val()*qty_temp);
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