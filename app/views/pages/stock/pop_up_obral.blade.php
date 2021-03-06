<div class="modal fade pop_up_obral" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Add Barang To Obral</h4>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="g-sm-12">

							<div class="form-group">
								<label class="g-sm-3 g-sm-push-2 control-label">Jumlah Yang Mau Diobral</label>
								<div class="g-sm-3 g-sm-push-2">
									<input type="text" class="form-control" id="input_amount">
								</div>
								<div class="g-sm-3 g-sm-push-2">
									<input type="hidden" id="tableRep"/>
									<button type="button" class="btn btn-success save-btn" data-dismiss="modal">Save</button>
									<script>
										$( 'body' ).on( "click",'.save-btn', function() {
											$id = $('#tableRep').val();
											$amount = $('#input_amount').val();
											//alert($id+ " " + $amount);
											$.ajax({
												type: 'PUT',
												url: '{{URL::route('david.add_obral')}}',
												data: {
													'data' : $id,
													'amount' : $amount
												},
												success: function(response){
													if(response['code']==204)
													{
														location.reload();
													}
													else
													{
														alert("Internal Server Error");
													}
												},error: function(xhr, textStatus, errorThrown){
													alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
													alert("responseText: "+xhr.responseText);
												}
											},'json');
										});
									</script>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>