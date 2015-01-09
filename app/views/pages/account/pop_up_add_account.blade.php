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
									<input type="text" class="form-control" name="add_account_username" id="add_username">		
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label">Password</label>
								<div class="g-sm-5">
									<input type="text" class="form-control" name="add_account_pass" id="add_password">			
								</div>
							</div>

							<div class="form-group">
								<label class="g-sm-4 control-label">Role</label>
								<div class="g-sm-5">
									<select class="form-control" name="add_account_role" id="add_role">
										<option value="manager">manager</option>
										<option value="sales" selected="selected">sales</option>
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

<script>
	$('body').on('click','#f_add_new_karyawan_btn',function(){
		var x=document.getElementById("add_role");
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
		$username = $('#add_username').val();
		$password = $('#add_password').val();
		
		alert($username + " " + $password + " " + $role);
		
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('david.add_account')}}',
			data: {
				'username' : $username,
				'password' : $password,
				'role' : $role
			},
			success: function(response){
			
				var f_tbody_karyawan_node = '<tr class="bg-success">';
				f_tbody_karyawan_node +=' <td>'+$username+'</td>';
				f_tbody_karyawan_node +=' <td>'+$role+'</td>';
				f_tbody_karyawan_node +=' <td>-</td>';
				f_tbody_karyawan_node +=' <td>Aktif</td>';
				f_tbody_karyawan_node +=' <td>';
				f_tbody_karyawan_node +=' 	<button class="btn btn-info btn-xs" data-toggle="modal" data-target=".pop_up_edit_account">Edit</button>';
				f_tbody_karyawan_node +=' 	<input type="hidden" value="'+response['messages']+'"/>';
				f_tbody_karyawan_node +=' 	<button type="button" class="f_activate_btn btn btn-success btn-xs hidden">Activate</button>';
				f_tbody_karyawan_node +=' 	<input type="hidden" value="'+response['messages']+'"/>';
				f_tbody_karyawan_node +=' 	<button type="button" class="f_deactivate_btn btn btn-danger btn-xs">Deactivate</button>';
				f_tbody_karyawan_node +=' 	<input type="hidden" value="'+response['messages']+'"/>';
				f_tbody_karyawan_node +=' <td>';
				f_tbody_karyawan_node +=' 	<button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".pop_up_delete_account">Delete</button>';
				f_tbody_karyawan_node +=' 	<input type="hidden" value="'+response['messages']+'"/>';
				f_tbody_karyawan_node +=' </td>';
				f_tbody_karyawan_node +=' </tr>';

				$('#f_tbody_karyawan').append(f_tbody_karyawan_node);
				
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
		
		//alert($username + " " + $password + " " +$editedPassword + " " + $role);
	});
</script>