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
						<label for="">Nama Pelanggan</label>
						<input type="text" class="form-control" id="" placeholder="Masukkan Nama">
					</div>

					<div class="form-group">
						<label for="">Total Biaya

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