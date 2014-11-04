<div class="modal fade" id="pop_up_cari_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Cari Barang</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
					<div class="form-group has-feedback">
						<div class="g-sm-12">
							<input type="search" class="form-control" id="" placeholder="kode atau nama">
							<span class="glyphicon glyphicon-search form-control-feedback"></span>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-striped">
					<thead>
						<!--<tr>
							<th rowspan="2">
								Kode 
							</th>
							<th rowspan="2">
								Nama 
							</th>
							<th rowspan="2">
								Warna 
							</th>
							<th rowspan="2">
								Stok
							</th>
							<th rowspan="2">
								Price
							</th>
						</tr>
						<tr>
							<th>
								Toko
							</th>
							<th>
								Gdg
							</th>
						</tr>-->
					</thead>
					<tbody class="f_table_search">
						<?php
						for($i=0; $i<20; $i++){
							?>
							<tr id="" style="border-bottom: 1px solid #000 !important;" data-dismiss="modal">
								<td>
									<span style="display: block;">
										#423424242342 / Merah / <span class="pull-right">10|100</span>
									</span>

									<span style="display: block;">
										<span class="pull-left">Tas KW Backpacker</span>   <span class="pull-right">400.000</span>
									</span>

								</td>
							</tr>
							<?php
						}
						?>
							<!--<tr id="">
								<td style="line-height: 30px;">
									123123123
								</td>
								<td style="line-height: 30px;">
									Tas KW Epic<br/>
									(Seri)
								</td>
							
								<td style="line-height: 30px;">
									10 | 200
								</td>
								<td style="line-height: 30px;">
									1.000.000
								</td>
							</tr>-->
							<style>
							.f_table_search > tr:active > td {
								background-color: #E8CD02 !important;
							}
							</style>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>