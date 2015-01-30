<div class="modal fade" id="pop_up_finalisasi_belanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Finalisasi Belanja</h4>
				<input type="hidden" id="tableReps" />
			</div>
			<div class="f_slider_alert hidden"  style="text-align: center; padding-top:20px;">
				Apakah Anda yakin ingin menghapus barang ini?
				<button type="button" id="hyper_x" class="btn btn-danger" data-dismiss="modal" >Ya</button>
				<button type="button" class="btn btn-primary f_slider_tutup" data-dismiss="">Tidak</button>
				<hr/>
			</div>

			<div class="modal-body">
				<div class="form">
					<div class="form-group">
						<label >Nama Pelanggan</label>
						<input type="hidden" id="custIdRep" value="none">
						<input type="text" class="form-control" id="f_nama_pelanggan" placeholder="Masukkan nama pelanggan">
						<table class="table table-bordered hidden" id="f_table_suggestion_pelanggan" style="background-color: #fff;">
							<thead>
							</thead>
							<tbody id="customerContent" class="hidden">

							</tbody>
						</table>
						<style>
						#f_table_suggestion_pelanggan > tbody > tr:active > td {
							background-color: #E8CD02 !important;
						}
						</style>
						<script>
							var trigger = false;
							$('body').on('keyup','#f_nama_pelanggan',function(){
								//alert($('#f_nama_pelanggan').val());
								//$('#f_table_suggestion_pelanggan').removeClass('hidden');
								//ajax search customer.....
								$('#custIdRep').val("none");
								$keyword = $('#f_nama_pelanggan').val();
								trigger = false;
								$.ajax({
									type: 'GET',
									url: '{{URL::route('david.getCustomerLiveSearch')}}',
									data: {
										'keyword' : $keyword
									},
									success: function(response){
										if(response['code'] == '404')
										{
											//gagal
										}
										else
										{
											//berhasil...foreach setiap barang
											$data = "";
											$.each(response['messages'], function( i, resp ) {
												$data = $data + "<tr><input type='hidden' value='"+resp.id+"' /><td class='test_row'>"+resp.name+"</td></tr>";	
											});
											if(trigger == false){
												$('#customerContent').html($data);
												$('#f_table_suggestion_pelanggan').removeClass('hidden');
												$('#customerContent').removeClass('hidden');
											}
											
										}
									},error: function(xhr, textStatus, errorThrown){
										alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
										alert("responseText: "+xhr.responseText);
									}
								},'json');
							});

							$('body').on('click','#customerContent > tr > td',function(){
								//alert($(this).text());
								$('#f_nama_pelanggan').val($(this).text());
								$('#custIdRep').val($(this).prev().val());
								trigger = true;
								$('#f_table_suggestion_pelanggan ').addClass('hidden');
											$('#customerContent').addClass('hidden');
							});
							$('body').on('keyup','#f_nama_pelanggan',function(){
								$('#f_table_suggestion_pelanggan').addClass('hidden');
								$('#customerContent').addClass('hidden');
							});
							/*
							$('#f_nama_pelanggan').keypress(function(event){
							 
								var keycode = (event.keyCode ? event.keyCode : event.which);
								if(keycode == '13'){

								$('#f_table_suggestion_pelanggan').addClass('hidden');
								$('#customerContent').addClass('hidden');
								}
								event.stopPropagation();
							});
							*/
							
						</script>
						<style>
							#customerContent *{cursor:pointer;}
						</style>
					</div>

					<div class="form-group">
						<label for="">Subtotal

						</label>
						<p type="text" class="form-control-static" placeholder="">
							<span id="total_text">
							Rp 0
							</span>
							<button class="btn btn-warning btn-sm pull-right f_diskon_revealer">
								<span class="glyphicon glyphicon-usd"></span>
							</button>
						</p>
					</div>
					<div class="form-group hidden f_diskon_inputtext">
						<label for="">Diskon</label>

						<div class="input-group">
							<input type="number" id="diskon_text" class="form-control" id="" value="" aria-describedby="basic-ribuan">
							<span class="input-group-addon" id="basic-ribuan">.000</span>
						</div>

					</div>

					<div class="form-group">
						<label for="" id="total_biaya_label">Total Biaya

						</label>
						<p type="text" class="form-control-static" placeholder="">
							<span id="total_biaya_text">
							Rp 0
							</span>
						</p>
					</div>

					<script>
					$('body').on('click','.f_diskon_revealer',function(){
						if($('.f_diskon_inputtext').hasClass('hidden')){

							$('.f_diskon_inputtext').removeClass('hidden');
						}else{
							$('.f_diskon_inputtext').addClass('hidden');
						}
					});
					</script>

				</div>

			</div>

			<div class="modal-footer">
				<p class="g-sm-12 text-center f_masuk_kasir hidden">
					Orderan sudah masuk kedalam kasir
				</p>
				<input type="hidden" id="transaction_tax" value="0"/>
				<button type="button" class="btn btn-info pull-left g-sm-5" data-dismiss="modal">Back</button>
				<button type="button" class="btn btn-success pull-right g-sm-5 f_send_ke_kasir" disabled>Send</button>

				<script>
				$('body').on('keyup','#diskon_text',function(){
					var oldTotal = toAngka($('#total_text').text());
					var diskon = parseInt($('#diskon_text').val())*1000;
					var tax = $('#transaction_tax').val();
					var newTotal = (oldTotal-diskon) * ((100+parseInt(tax)) / 100);
					$('#total_biaya_text').text("Rp " + toRp(newTotal));
				});
				
				$('body').on('click','.f_send_ke_kasir',function(){
					$('.f_masuk_kasir').removeClass('hidden');
					$('.f_send_ke_kasir').addClass('hidden');
					$custName = $('#f_nama_pelanggan').val();
					$totalBiaya = toAngka($('#total_biaya_text').text());
					$custIdRep = $('#custIdRep').val();
					$discount = parseInt($('#diskon_text').val())*1000;
					$tax = $('#transaction_tax').val();
					
					$idTable = $('#tableReps').val();
					$('#flag_'+ $idTable).val('1');
					$data = [];
					
					//alert($("#pesanan_content_"+$idTable).html());
					//name color quantity
					$("#pesanan_content_"+$idTable+" tr").each(function(i, v){
						$data[i] = [];
						$code = $(this).children('td')[0].innerText;
						$name = $(this).children('td')[1].innerText;
						$color = $(this).children('td')[2].innerText;
						$quantity = $(this).children('td')[3].innerText;
						$price = toAngka($(this).children('td')[5].innerText);
						/*
						$(this).children('td').each(function(ii, vv){
							if(ii == 1)
							{
								$name = vv.innerText;
							}
							
							if(ii == 2)
							{
								$color = vv.innerText;
							}
							
							if(ii == 3)
							{
								$quantity = vv.innerText;
							}
						});
						*/
						$data[i] = {name:$name, color:$color, quantity:$quantity, price:$price, code:$code};
					});
					//alert($data);
					
					$custName = $('#f_nama_pelanggan').val();
					$totalBiaya = toAngka($('#total_biaya_text').text());
					$custIdRep = $('#custIdRep').val();
					$discount = parseInt($('#diskon_text').val())*1000;
					$tax = $('#transaction_tax').val();
					$.ajax({
						type: 'POST',
						url: '{{URL::route('david.postFinalizeTransaction')}}',
						data: {
							'total' : $totalBiaya,
							'customer_name' : $custName,
							'id_customer' : $custIdRep,
							'product_list' : $data,
							'discount' : $discount,
							'tax' : $tax
						},
						success: function(response){
							
							
						},error: function(xhr, textStatus, errorThrown){
							alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
							alert("responseText: "+xhr.responseText);
						}
					},'json');
					
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
				</script>
				<script>
					//Resetter input[type=text] untuk seluruh modal
					$('#pop_up_finalisasi_belanja').on('hidden.bs.modal', function (e) {
					  //alert('modal closed');
					  //-- fungsi untuk me-reset sluruh input[type=text] pada modal --
					  $(this).find('#diskon_text').val('');
					  $(this).find('.f_diskon_inputtext').addClass('hidden');
					});
					
					$('.modal').on('hidden.bs.modal', function(e) { 
					  $('.f_masuk_kasir').addClass('hidden');
					});

					/* -- jan 9 2015 | START -- */
					/* -- button disabled error prevention -- */
					$('#f_nama_pelanggan').keyup(function(){
						if( $(this).val() != '' ){
							$('.f_send_ke_kasir').removeAttr('disabled');
						}
					});
					$('#f_nama_pelanggan').keydown(function(){
						if( $(this).val() == '' ){
							$('.f_send_ke_kasir').attr('disabled','disabled'); 
						}
					});

					$('body').on('click','.test_row',function(){
						$('.f_send_ke_kasir').removeAttr('disabled');
					});

					$('#pop_up_finalisasi_belanja').on('hidden.bs.modal', function () { 
						$('.f_send_ke_kasir').attr('disabled','disabled'); 
					});
					/* -- jan 9 2015 | END -- */
				</script>
			</div>

		</div>
	</div>
</div>