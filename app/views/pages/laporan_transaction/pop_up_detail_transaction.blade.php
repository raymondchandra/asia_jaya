<div class="modal fade pop_up_detail_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
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
						<div class="g-sm-12"><!-- g-sm-5 -->
							<table class="table">
								<thead>
									<tr>
										<th>
											Nama Produk
										</th>
										<th>
											Foto
										</th>
										<th>
											Warna
										</th>
										<th>
											Kuantitas
										</th>
										<th>
											Harga Satuan
										</th>
										<th>
											Sub Total
										</th>
									</tr>
								</thead>
								<tbody id="transaction_detail_content">

								</tbody>
							</table>
							<hr></hr>
							<div class="form-group">
								<label class="g-sm-9 control-label">Subtotal</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static" id="transaction_subtotal_detail">IDR 3.100.000</p>
								</div>
								<label class="g-sm-9 control-label">Diskon</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static" id="transaction_diskon_detail">IDR 0</p>
									
								</div>
								<label class="g-sm-9 control-label">Tax</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static" id="transaction_tax_detail">IDR 0</p>
									
								</div>
								<label class="g-sm-9 control-label"></label>
								<div class="g-sm-3">
									<hr style="float: left; width: 166px;"></hr>
									<span class="glyphicon glyphicon-plus pull-right" style="line-height: 39px;"></span>
								</div>
								<label class="g-sm-9 control-label">Total</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static" id="transaction_total_detail">IDR 3.100.000</p>
								</div>
							</div>

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