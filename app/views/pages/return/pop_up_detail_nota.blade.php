<div class="modal fade pop_up_detail_nota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
									<tr>
										<td>
											k
										</td>
										<td>
											k
										</td>
										<td>
											k
										</td>
										<td>
											k
										</td>
										<td>
											k
										</td>
										<td>
											k
										</td>
										<td>
											<button type="button" class="btn btn-warning btn-xs view_pilih_button"  data-toggle="modal" data-target=".pop_up_add_return">Pilih</button>
											
										</td>
									</tr>
								</tbody>
							</table>
							<script>
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
								$('body').on('keyup','#f_uang_bayaran',function(){

									if(toAngka($('#transaction_total_detail').text()) > toAngka($('#f_uang_bayaran').val())){
										$('#f_uang_kembalian').text("Uang Belum Cukup");
									}else{
										var kembalian = parseInt($('#f_uang_bayaran').val()) - parseInt(toAngka($('#transaction_total_detail').text()));
										$('#f_uang_kembalian').text("Rp " + toRp(kembalian));
									}
									
								});
								
								$('body').on('click','#save-btn',function(){

									//ajax bayar.... ajax ngupdet order dan ngurangin stock
									//ajax buat ngupdate
									$id = $('#pop_up_trans_id').text();
									$total = toAngka($('#transaction_total_detail').text());									
									$total_paid = toAngka($('#f_uang_bayaran').val());
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
										$orderPrices[$counter] = toAngka($(this).children('td')[5].innerText);
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
														'discount' : $discount
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
										$totalPrice = $(this).children('td')[5].innerText;
										$total += toAngka($totalPrice);
									});
									
									//alert($total);
									if($('#transaction_diskon_detail').val() == "")
									{
										
									}
									else
									{
										$total -= toAngka($('#transaction_diskon_detail').val());
									}
									
									$tax = parseInt($total) * toAngka($('#transaction_tax_detail').text()) / parseInt(100);
									$total += $tax;
									$('#transaction_total_detail').text("Rp " + toRp($total));
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