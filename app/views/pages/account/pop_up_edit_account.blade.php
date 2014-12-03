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
									<input type="text" class="form-control" id="edit_username">		
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label">Password</label>
								<div class="g-sm-5">
									<input type="text" class="form-control" id="edit_password">	
									<input type="hidden" id="edited_password" value="none">
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label" >Role</label>
								<div class="g-sm-5">
									<select class="form-control" id="edit_role">
										<option value="manager" id="edit_role_manager">Manager</option>
										<option value="sales" id="edit_role_sales">Sales</option>
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
					<input type="hidden" id="idRep"/>
					<button type="button" class="btn btn-success" data-dismiss="modal" id="save">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" id="cancel">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$('body').on('keyup','#edit_password',function(){
		if($(this).val() == "")
		{
			$('#edited_password').val('none');
		}
		else
		{
			$('#edited_password').val('yes');
		}
	});
	
	$('body').on('click','#save',function(){
		$id = $('#idRep').val();
		$username = $('#edit_username').val();
		$password = $('#edit_password').val();
		$editedPassword = $('#edited_password').val();
		var x=document.getElementById("edit_role");
		for (var i = 0; i < x.options.length; i++) 
		{
			if(x.options[i].selected ==true)
			{
				$roleRaw = x.options[i].value;
			}
		}
		if($roleRaw === 'manager')
		{
			$role = 2;
		}
		else
		{
			$role = 3;
		}
		
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('david.edit_account')}}',
			data: {
				'id' : $id,
				'username' : $username,
				'password' : $password,
				'isEditPassword' : $editedPassword,
				'role' : $role
			},
			success: function(response){
				$('#username_'+$id).text($username);		
				//$('#edit_password').val("");		
				//$role = $('#role_'+$id).text();
				if($role == '3')
				{	
					$('#role_'+$id).text('sales');
				}
				else if($role == '2')
				{
					$('#role_'+$id).text('manager');
				}
				else
				{
				
				}
				alert("edit berhasil");
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
		//alert($username + " " + $password + " " +$editedPassword + " " + $role);
	});
</script>