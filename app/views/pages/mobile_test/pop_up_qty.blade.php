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
						<div class="g-xs-7"> 

							<div class="input-group">
							  <span class="input-group-addon fq_qty_min"><span class="glyphicon glyphicon-minus"></span></span>
							  <input type="number" class="form-control" id="ff_quant_first" value="1" style="padding-right: 12px; text-align: center;">
							  <span class="input-group-addon fq_qty_plus"><span class="glyphicon glyphicon-plus"></span></span>
							</div>
						</div>
					</div>
					<div class="form-group has-feedback"> 
						<label class="g-xs-4 control-label">  
						</label>
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
		//show loader
		$('.f_loader_container').removeClass('hidden');

		//prevention kalo angkanya < 1
		if($('#ff_quant_first').val() < 1){
			alert("kuantitas harus lebih besar dari 0");
			return;
		}

		$quantity = $('#ff_quant_first').val();
		$subtotalNow = toAngka($('#subtotal_text_'+$inc).text());
		if($('#'+ $product_code + "_" + $color + "_" + $inc).length)
		{
			//remove loader
			$('.f_loader_container').addClass('hidden');
		}
		else
		{
			if($seri==0)
			{
				if( (( parseInt($stock_shop) + parseInt($stock_storage) ) < $('#ff_quant_first').val()) )
				{
					$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row s_danger_2' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
				}else if( (parseInt($stock_shop) < $('#ff_quant_first').val()) && (( parseInt($stock_shop) + parseInt($stock_storage) ) >= $('#ff_quant_first').val()) )
				{
					$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row s_danger_1' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
				}
				else
				{
					$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row ' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
				}
 				$data = $data + $product_code + "</td> <td id='name_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
				$data = $data + $name + "</td> <td id='color_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
				$data = $data + $color + "</td> <td id='quantity_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
				$data = $data + parseInt($quantity)*($quant.length) + "</td>";
				$data = $data + "<td id='stock" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>" + "<span id='stock_shop_"+ $product_code + "_"+ $color + "_" + $inc +"'>" + $stock_shop +"</span> | <span id='stock_storage_"+ $product_code + "_" +$color + "_" + $inc +"'>"+ $stock_storage + "</span></td>"; 
				$data = $data + "<td class='ff_price_subtot' id='price_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
				//$data = $data + "" + toRp( parseInt($quantity)*$price ) + "</td> <input type='hidden' id='hidden_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $min_price + "' </tr>";
				//newcode
				$data = $data + "" + toRp( parseInt($quantity)*$price ) + "</td> <input type='hidden' id='hidden_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $min_price + "' /> ";
				$data = $data + "<input type='hidden' id='hidden_modal_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $modal_price + "' /> ";
				$data = $data + "</tr>";
				
				$('#pesanan_content_'+$inc).prepend($data);
				
				
				var a = parseInt($subtotalNow);
				var b = parseInt( parseInt($('#ff_quant_first').val())*$price );
				var total = a+b;
				$('#subtotal_text_'+$inc).text("Rp " + toRp(total));
			}
			else
			{
				$.ajax({
					type: 'GET',
					url: '{{URL::route('david.getProductByReference')}}',
					data: {
						'reference' : $reference
					},
					success: function(response){
						if(response['code'] == '404')
						{
							//gagal
							//$data = "<tr><td> No Result Found </td></tr>";
							//$('#searchContent').html($data);
						}
						else
						{
							//berhasil...foreach setiap barang
							var a = parseInt($subtotalNow);
							var b = 0;
							$.each(response['messages'], function( i, resp ) {
								$id = resp.id;
								$product_code = resp.product_code.replace(/\s+/g, '');
								$color = resp.color.replace(/\s+/g, '');
								$stock_shop = resp.stock_shop;
								$stock_storage = resp.stock_storage;
								$name = resp.name.replace(/\s+/g, '');
								$price = resp.sales_price;
								$min_price = resp.min_price;
								//newcode
								$modal_price = resp.modal_price;
								$quant = resp.color.split('-');
								//if( $id == 1){ // kalau dia barang obral
								$quant.length = 1;
								
								if($('#'+ $product_code + "_" + $color + "_" + $inc).length)
								{
								
								}
								else
								{
									if( (( parseInt($stock_shop) + parseInt($stock_storage) ) < $quantity) )
									{
										$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row s_danger_2' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
									}else if( (parseInt($stock_shop) < $quantity) && (( parseInt($stock_shop) + parseInt($stock_storage) ) >= $quantity) )
									{
										$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row s_danger_1' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
									}
									else
									{
										$data = "<tr data-toggle='modal' data-target='#pop_up_edit_barang' class='table_row ' id='"+ $product_code + "_" + $color + "_" + $inc +"'> <td id='code_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
									}
									$data = $data + $product_code + "</td> <td id='name_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
									$data = $data + $name + "</td> <td id='color_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
									$data = $data + $color + "</td> <td id='quantity_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
									$data = $data + $quantity*($quant.length) + "</td>"; 
									$data = $data + "<td id='stock" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>" + "<span id='stock_shop_"+ $product_code + "_"+ $color + "_" + $inc +"'>" + $stock_shop +"</span> | <span id='stock_storage_"+ $product_code + "_"+ $color + "_" + $inc +"'>"+ $stock_storage + "</span></td>"; 
									$data = $data + "<td class='ff_price_subtot' id='price_" + $product_code + "_" + $color + "_" + $inc + "' style='line-height: 30px;'>";
									//$data = $data + "" + toRp( parseInt($quantity)*$price ) + "</td> <input type='hidden' id='hidden_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $min_price + "' </tr>";
									//newcode
									$data = $data + "" + toRp( parseInt($quantity)*$price ) + "</td> <input type='hidden' id='hidden_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $min_price + "' /> ";
									$data = $data + "<input type='hidden' id='hidden_modal_" + $product_code + "_" + $color + "_" + $inc + "' value='" + $modal_price + "' /> ";
									$data = $data + "</tr>";
									
									$('#pesanan_content_'+$inc).prepend($data);
									b = parseInt(b) + parseInt($quantity*$price);
								}
							});
							var total = a+b;
							$('#subtotal_text_'+$inc).text("Rp " + toRp(total));
							//remove loader
							$('.f_loader_container').addClass('hidden');
						}
					},error: function(xhr, textStatus, errorThrown){
						alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
						alert("responseText: "+xhr.responseText);
						//remove loader
						$('.f_loader_container').addClass('hidden');
					}
				},'json');
			}
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

	$('#pop_up_qty').on('hidden.bs.modal', function () {
		$('#ff_quant_first').val(1);
	});

</script>