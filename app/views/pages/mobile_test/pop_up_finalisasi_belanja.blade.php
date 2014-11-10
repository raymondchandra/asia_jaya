<div class="modal fade" id="pop_up_finalisasi_belanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Finalisasi Belanja</h4>
				<input type="hidden" id="tableReps" />
			</div>
			<div class="f_slider_alert hidden"  style="text-align: center; padding-top:20px;">
				Apakah Anda yakin ingin menghapus produk ini?
				<button type="button" id="hyper_x" class="btn btn-danger" data-dismiss="modal" >Ya</button>
				<button type="button" class="btn btn-primary f_slider_tutup" data-dismiss="">Tidak</button>
				<hr/>
			</div>

			<div class="modal-body">
				<div class="form">
					<div class="form-group">
						<label >Nama Pelanggan</label>
						<input type="hidden" id="custIdRep" value="none">
						<input type="text" class="form-control" id="f_nama_pelanggan">
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
							IDR 0
							</span>
							<button class="btn btn-warning btn-sm pull-right f_diskon_revealer">
								<span class="glyphicon glyphicon-usd"></span>
							</button>
						</p>
					</div>
					<div class="form-group hidden f_diskon_inputtext">
						<label for="">Diskon</label>
						<input type="text" class="form-control" id="" value="0">
					</div>

					<div class="form-group">
						<label for="">Total Biaya

						</label>
						<p type="text" class="form-control-static" placeholder="">
							<span id="total_biaya_text">
							IDR 0
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
				<button type="button" class="btn btn-success pull-left g-sm-5 f_send_ke_kasir">Send</button>
				<button type="button" class="btn btn-info pull-right g-sm-5" data-dismiss="modal">Back</button>

				<script>
				$('body').on('click','.f_send_ke_kasir',function(){
					
						$('.f_masuk_kasir').removeClass('hidden');
					
				});
				</script>
			</div>

		</div>
	</div>
</div>