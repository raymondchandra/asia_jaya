<div class="modal fade pop_up_edit_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Edit Account</h4>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="g-sm-12"><!-- g-sm-5 -->

							<div class="form-group" id="nama_promosi">
								<label class="g-sm-4 control-label">Username</label>
								<div class="g-sm-5">
									<input type="text" class="form-control">		
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label">Password</label>
								<div class="g-sm-5">
									<input type="text" class="form-control">		
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label">Role</label>
								<div class="g-sm-5">
									<select class="form-control">
										<option value="manager">Manager</option>
										<option value="karyawan">Karyawan</option>
									</select>
								</div>
							</div>

							<!--
							Gak kepake
							<div class="form-group">
								<label for="inputPassword3" class="g-sm-4 control-label">Status</label>
								<div class="g-sm-5">
									<p id="account_status" class="form-control-static f_active">Active</p>
								</div>
								<div class="g-sm-3">
									<button type="button" class="btn btn-warning" id="account_status_editor">Change</button>
									<script>
									$( 'body' ).on( "click",'#account_status_editor', function() {
										if($('#account_status').text() == "Active"){
											$('#account_status').text("Inactive");
											$('#account_status').removeClass("f_active").addClass("f_inactive");
										}else{
											$('#account_status').text("Active");
											$('#account_status').addClass("f_active").removeClass("f_inactive");
										}
									});
									</script>
								</div>
							</div>-->
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>