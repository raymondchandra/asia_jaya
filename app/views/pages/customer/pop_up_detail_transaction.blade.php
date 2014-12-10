<div class="modal fade pop_up_detail_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<div style="font-size: 1.2em;">
					<b>ID Transaksi :</b>  <span id="pop_up_trans_id">76345546</span>
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
									<tr>
										<td>
											Nama Produk
										</td>
										<td>
											<img src='' width='100' height='100'>
										</td>
										<td>
											Maroon
										</td>
										<td>
											10
										</td>
										<td>
											IDR 100000
										</td>
										<td>
											IDR 1000000
										</td>
									</tr>
									<tr>
										<td>
											Nama Produk
										</td>
										<td>
											<img src='' width='100' height='100'>
										</td>
										<td>
											Maroon
										</td>
										<td>
											10
										</td>
										<td>
											IDR 100000
										</td>
										<td>
											IDR 1000000
										</td>
									</tr>
								</tbody>
							</table>
							<hr></hr>
							<div class="form-group">
								<div class="g-sm-8">
									<label class="g-sm-9 control-label">Status</label>
									<div class="g-sm-3">
										<p type="text" class="form-control-static" id="transaction_status_detail">belum lunas</p>
									</div>
									<label class="g-sm-9 control-label">is_void</label>
									<div class="g-sm-3">
										<p type="text" class="form-control-static" id="transaction_is_void_detail">false</p>

									</div>
								</div>
								<div class="g-sm-4">
									<label class="g-sm-4 control-label">Subtotal</label>
									<div class="g-sm-8">
										<p type="text" class="form-control-static" id="transaction_subtotal_detail">IDR 6.100.000</p>
									</div>
									<label class="g-sm-4 control-label">Diskon</label>
									<div class="g-sm-8">
										<p type="text" class="form-control-static" id="transaction_diskon_detail">IDR 0</p>

									</div>
									<label class="g-sm-4 control-label">Tax</label>
									<div class="g-sm-8">
										<p type="text" class="form-control-static" id="transaction_tax_detail">IDR 0</p>

									</div>
									<label class="g-sm-4 control-label"></label>
									<div class="g-sm-8">
										<hr style="float: left; width: 140px;"></hr>
										<span class="glyphicon glyphicon-plus pull-right" style="line-height: 40px;"></span>
									</div>
									<label class="g-sm-4 control-label">Total</label>
									<div class="g-sm-8">
										<p type="text" class="form-control-static" id="transaction_total_detail">IDR 3.100.000</p>
									</div>
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