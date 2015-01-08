<div class="modal fade pop_up_solusi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Solusi</h4>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<div class="row">
						<div class="g-sm-12">

							<div class="form-group">
								<label class="g-sm-4 control-label">Solusi</label>
								<div class="g-sm-7">
									<select class="form-control" id="solution-opt">
										<option value="0">Masukan ke stok toko</option>
										<option value="1">Masukan ke obral</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="g-sm-4 control-label"></label>
								<div class="g-sm-6">
									<input type="hidden" id="return_id_hidden"/>
									<button type="button" class="btn btn-success save-solution-btn" data-dismiss="modal" id="">Save</button>
									<script>
										$( 'body' ).on( "click",'.save-solution-btn', function() {
											$id = $(this).prev().val();
											var e = document.getElementById("solution-opt");
											var solution = e.options[e.selectedIndex].text;
											$.ajax({
												type: 'PUT',
												url: '{{URL::route('david.update_solution_return')}}',
												data: {
													'data' : $id,
													'solusi' : solution
												},
												success: function(response){
													//ajax lagi baru window.open.. ITS SOMMMEEETTTHIIINNGG
													if(response['code'] == 204)
													{
														window.open("{{URL::route('gentry.view_print_konsumen')}}"+"?dataT="+$id;
														location.reload();
													}
													else
													{
														alert("Something Going Wrong.. Check your form or contact developer..");
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
					<input type="hidden" id="return_id_hidden_print"/>
					<button type="button" class="btn btn-success print-btn" data-dismiss="modal" id="">Print</button>
					<script>
						$( 'body' ).on( "click",'.print-btn', function() {
							window.open("{{URL::route('gentry.view_print_konsumen')}}"+"?dataT="+$(this).prev().val());
						});
						
					</script>
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>