@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Cashflow Hari Ini
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
		
			<div>
				<table class="table table-bordered table-hover ">
					<thead class="table-bordered">
						<tr>
							<th class="table-bordered" >
								<a href="javascript:void(0)">Tipe Jual Beli</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">ID Transaksi</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Customer Name</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Total Transaksi</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Total Cash</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<!--<th class="table-bordered">
								<a href="javascript:void(0)">Discount</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Tax</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Kar. ID</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered">
								<a href="javascript:void(0)">Username</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="80">
								<a href="javascript:void(0)">Void</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							<th class="table-bordered" width="120">
								<a href="javascript:void(0)">Status</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
							-->

							<th class="table-bordered" width="200">
								<a href="javascript:void(0)">Waktu</a>
								<a href="javascript:void(0)">
									<span class="glyphicon glyphicon-sort" style="float: right;"></span>
								</a>
							</th>
						<!--<th class="table-bordered" width="100"></th>
							<th class="table-bordered" width="100">Print</th>-->
						</thead>
						
						<tbody>
							<tr>
								<td>
									Transaksi
								</td>
								<td>
									23896452893
								</td>
								<td>
									Mr Jaya
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									Rp 2.000.000
								</td>
								<td>
									2015-7-30 09:34:01
								</td>
							</tr>

							<tr>
								<td>
									Retur
								</td>
								<td>
									23896452893
								</td>
								<td>
									Mr Jaya
								</td>
								<td>
									- Rp 700.000
								</td>
								<td>
									Rp 1.100.000
								</td>
								<td>
									2015-7-30 09:34:01
								</td>
							</tr>

							<tr>
								<td>
									Transaksi
								</td>
								<td>
									23896452893
								</td>
								<td>
									Mr Jaya
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									Rp 1.800.000
								</td>
								<td>
									2015-7-30 09:34:01
								</td>
							</tr>

							<tr>
								<td>
									Morning Bank
								</td>
								<td>
									-
								</td>
								<td>
									Owner
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									Rp 900.000
								</td>
								<td>
									2015-7-30 07:34:01
								</td>
							</tr>
									<!--<tr> 
										
										<td> 
											<button id="" class="btn btn-success btn-xs view_detail_button" data-toggle="modal" data-target=".pop_up_detail_transaction">
												<span class="glyphicon glyphicon-usd" style="margin-right: 5px;"></span>View Detail
											</button>
											<input type="hidden" value=""> 
										</td>
										<td>
											<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="" style="display: block; margin-bottom: 5px;">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Toko
											</button>
											<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="">
												<span class="glyphicon glyphicon-print" style="margin-right: 5px;"></span>Customer
											</button> 
										</td>
									</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@stop
