<div class="modal fade pop_up_edit_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
			</div>

			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="g-sm-3 control-label">Kode</label>
						<div class="g-sm-9">
							<p class="form-control-static">435345434335</p>
						</div>
					</div>
					<div class="form-group">
						<label class="g-sm-3 control-label">Nama</label>
						<div class="g-sm-9">
							<p class="form-control-static">Tas Gaya Banget</p>
						</div>
					</div>
					<div class="form-group">
						<label class="g-sm-3 control-label">Warna</label>
						<div class="g-sm-9">
							<p class="form-control-static">Merah</p>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="g-sm-3 control-label">Harga@</label>
						<div class="g-sm-4">
							<p class="form-control-static" id="f_hsatuan_qty">100000</p>
						</div>
						<label for="" class="g-sm-2 control-label">Qty.</label>
						<div class="g-sm-3">
							<input type="text" class="form-control" value="1" id="f_edit_qty">
						</div>
					</div>
					<div class="form-group">
						<label class="g-sm-3 control-label">Subtotal</label>
						<div class="g-sm-9">
							<p class="form-control-static" id="f_subtotal_edit">100000</p>
						</div>
						<script>
						$('body').on('change','#f_edit_qty',function(){
							$('#f_subtotal_edit').text($('#f_hsatuan_qty').text()*$('#f_edit_qty').val());
						});
						</script>
					</div>

				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Delete</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
			</div>

		</div>
	</div>
</div>