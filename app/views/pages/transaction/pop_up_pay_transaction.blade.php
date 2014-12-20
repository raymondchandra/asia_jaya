<div class="modal fade pop_up_pay_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<div style="font-size: 1.2em;">
					<b>ID Transaksi :</b>  <span id="pop_up_trans_id"></span>
					<span class="clearfix"></span>
					<b>Nama Customer :</b> <span id="pop_up_trans_name"></span>
				</div>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="g-sm-12">
							<div class="form-group">
								<label class="g-sm-3 control-label">Total</label>
								<div class="g-sm-6">
									<p type="text" class="form-control-static" id="f_total_harus_bayar">3000000</p>
								</div>
								<span class="clearfix"></span>

								<label class="g-sm-3 control-label">Bayar</label>
								<div class="g-sm-6">
									<input type="text" class="form-control" id="f_uang_bayaran">
								</div>
								<span class="clearfix"></span>

								<label class="g-sm-3 control-label"></label>
								<div class="g-sm-6">
									<hr style="float: left; width: 100%;"></hr>
								</div>
								<span class="clearfix"></span>

								<label class="g-sm-3 control-label">Kembalian</label>
								<div class="g-sm-6">
									<p type="text" class="form-control-static" id="f_uang_kembalian"></p>
								</div>

							</div>
							<script>
								$('body').on('change','#f_uang_bayaran',function(){
									
 
									if($('#f_total_harus_bayar').text() > $('#f_uang_bayaran').val()){
										$('#f_uang_kembalian').text("Uang Belum Cukup");
									}else{
										var kembalian = $('#f_uang_bayaran').val() - $('#f_total_harus_bayar').text();
										$('#f_uang_kembalian').text(kembalian);
									}
									
								});
							</script>

							<hr></hr>

							<button type="button" class="btn btn-success pull-right">
								<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Customer
							</button>
							<button type="button" class="btn btn-warning pull-right" style="margin-right: 20px;">
								<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Toko
							</button>

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