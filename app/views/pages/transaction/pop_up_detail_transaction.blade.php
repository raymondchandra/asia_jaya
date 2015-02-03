<div class="modal fade pop_up_detail_transaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<div style="font-size: 1.2em;">
					<!-- <b>ID Transaksi :</b>  <span id="pop_up_trans_id"></span>
					<span class="clearfix"></span>-->
					<b>Nama Customer :</b> <span id="pop_up_trans_name"></span>
					<input type="hidden" id="pop_up_trans_id"/>
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
											Kode Produk
										</th>
										<th>
											Foto
										</th>
										<th>
											Warna
										</th>
										<th>
											Qty.
										</th>
										<th>
											S. Toko - Gdg.
										</th>
										<th>
											Harga Satuan
										</th>
										<th>
											Sub Total
										</th>
										<th>
											 
										</th>
									</tr>
								</thead>
								<tbody id="transaction_detail_content">

								</tbody>
							</table>
							<hr></hr>
							<div class="form-group">
								<!--
								<label class="g-sm-8 control-label">Subtotal</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static" id="transaction_subtotal_detail">Rp 3.100.000</p>
								</div>
								-->
								<label class="g-sm-8 control-label"><img src="{{asset('assets/img/pigblk.png')}}" height="20"></label>
								<div class="g-sm-3">

									<div class="input-group">
										<input type="text" class="form-control" id="transaction_diskon_detail" aria-describedby="basic-ribuan">
										<span class="input-group-addon" id="basic-ribuan">.000</span>
									</div>
									
								</div>
								<label class="g-sm-8 control-label">Tax</label>
								<div class="g-sm-3">
									
									<p type="text" class="form-control-static" id="transaction_tax_detail"></p>
									
								</div>
								<label class="g-sm-8 control-label"></label>
								<!--
								<div class="g-sm-3">
									<hr style="float: left; width: 166px;"></hr>
									<span class="glyphicon glyphicon-plus pull-right" style="line-height: 39px;"></span>
								</div>
								-->
								<label class="g-sm-8 control-label">Total</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static" id="transaction_total_detail"></p>
								</div>

								<label class="g-sm-8 control-label">Bayar</label>
								<div class="g-sm-3">
									
									<div class="input-group">
										<input type="text" class="form-control" id="f_uang_bayaran" aria-describedby="basic-ribuan">
										<span class="input-group-addon" id="basic-ribuan">.000</span>
									</div>
								</div>
								<span class="clearfix"></span>

								<label class="g-sm-8 control-label"></label>
								<div class="g-sm-3">
									<hr style="float: left; width: 100%;"></hr>
								</div>
								<span class="clearfix"></span>

								<label class="g-sm-8 control-label">Kembalian</label>
								<div class="g-sm-3">
									<p type="text" class="form-control-static" id="f_uang_kembalian"></p>
								</div>
							</div>
							
							<script>
								
								$('body').on('keyup','#f_uang_bayaran',function(){

									if(toAngka($('#transaction_total_detail').text()) > (toAngka($('#f_uang_bayaran').val())*1000 ) ){
										$('#f_uang_kembalian').text("Uang Belum Cukup");
									}else{
										var kembalian = parseInt( (toAngka($('#f_uang_bayaran').val())*1000 ) ) - parseInt( toAngka($('#transaction_total_detail').text()) );
										$('#f_uang_kembalian').text("Rp " + toRp(kembalian));
									}
									
								});
								
								function toAngka(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}
								function toRp(angka){
									var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
									var rev2    = '';
									for(var i = 0; i < rev.length; i++){
										rev2  += rev[i];
										if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
											rev2 += '.';
										}
									}
									return rev2.split('').reverse().join('');
								}
								
							</script>
							

							<hr></hr>
							<input type="hidden" value="-" id="deleted_order"/>
							<button type="button" class="btn btn-success pull-right" id="save-btn"  data-dismiss="modal">
								<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Save
							</button>
							<script>
								$('body').on('click','#save-btn',function(){

									//ajax bayar.... ajax ngupdet order dan ngurangin stock
									//ajax buat ngupdate
									$id = $('#pop_up_trans_id').text();
									$total = toAngka($('#transaction_total_detail').text());									
									$total_paid = toAngka($('#f_uang_bayaran').val())*1000;
									$discount = toAngka($('#transaction_diskon_detail').val());
									$orderIds = [];
									$orderQtys = [];
									$orderPrices = [];
									$counter = 0;
									$deleted = $(this).prev().val();
									$("#transaction_detail_content tr").each(function(i, v)
									{
										$orderIds[$counter] = $(this).find('#hidden_id').val();
										$orderQtys[$counter] = $(this).children('td')[3].innerText;
										$orderPrices[$counter] = toAngka($(this).children('td')[6].innerText);
										$counter++;
									});

									$.ajax({
										type: 'PUT',
										url: '{{URL::route('david.update_order')}}',
										data: {
											'data' : $orderIds,
											'qty' : $orderQtys,
											'prcs' : $orderPrices,
											'deleted' : $deleted,
											'ctr' : $counter
										},
										success: function(response){
											if(response['code'] == 200)
											{
												$.ajax({
													type: 'PUT',
													url: '{{URL::route('david.save_transaction')}}',
													data: {
														'data' : $id,
														'total' : $total,
														'paid' : $total_paid,
														'discount' : $discount*1000
													},
													success: function(response){
														//ajax lagi baru window.open.. ITS SOMMMEEETTTHIIINNGG
														if(response['code'] == 200)
														{
															$.ajax({
																type: 'PUT',
																url: '{{URL::route('david.update_stock')}}',
																data: {
																	'data' : $orderIds,
																	'qty' : $orderQtys,
																	'ctr' : $counter
																},
																success: function(response){
																	if(response['code'] == 200)
																	{
																		window.open("{{URL::route('david.view_print_konsumen')}}"+"?dataT="+$id);
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
														}
														else
														{
															alert("Something Going Wrong.. Check your payment input or contact developer..");
														}
													},error: function(xhr, textStatus, errorThrown){
														alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
														alert("responseText: "+xhr.responseText);
													}
												},'json');
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
								
								$('body').on( "keyup",'#transaction_diskon_detail', function(e) {
									$total = 0;
									$("#transaction_detail_content tr").each(function(i, v)
									{
										$totalPrice = $(this).children('td')[6].innerText;
										$total += toAngka($totalPrice);
									});
									
									//alert($total);
									if($('#transaction_diskon_detail').val() == "")
									{
										
									}
									else
									{
										$total -= parseInt(toAngka($('#transaction_diskon_detail').val()))*1000;
									}
									
									$tax = parseInt($total) * toAngka($('#transaction_tax_detail').text()) / parseInt(100);
									$total += $tax;
									$('#transaction_total_detail').text("Rp " + toRp($total));
								});
								
								
								
								
							</script>
							<!--
							<button type="button" class="btn btn-success pull-right">
								<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Customer
							</button>
							<button type="button" class="btn btn-warning pull-right" style="margin-right: 20px;">
								<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Print Toko
							</button>
							-->
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