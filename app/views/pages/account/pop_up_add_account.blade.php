<div class="modal fade pop_up_add_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Account</h4>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="g-sm-12"><!-- g-sm-5 -->

							<div class="form-group" id="nama_promosi">
								<label class="g-sm-4 control-label">Username</label>
								<div class="g-sm-5">
									<input type="text" class="form-control" name="add_account_username">		
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label">Password</label>
								<div class="g-sm-5">
									<input type="text" class="form-control" name="add_account_pass">			
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label">Role</label>
								<div class="g-sm-5">
									<select class="form-control" name="add_account_role">
										<option value="manager">Manager</option>
										<option value="karyawan">Karyawan</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal" id="f_add_new_karyawan_btn">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>