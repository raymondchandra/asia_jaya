
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--<a class="navbar-brand" href="#">Brand</a>-->
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="#"><span class="glyphicon glyphicon-home" style="color:#fff; margin-right:10px;"></span>Dashboard</a></li>
				<li><a href="{{URL::to('test/transaction')}}"><span class="glyphicon glyphicon-usd" style="color:#fff; margin-right:10px;"></span>Transaksi</a></li>
				<li><a href="{{URL::to('test/return')}}"><span class="glyphicon glyphicon-transfer" style="color:#fff; margin-right:10px;"></span>Retur</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-briefcase" style="color:#fff; margin-right:10px;"></span>Produk<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{URL::to('test/stock')}}"><span class="glyphicon glyphicon-briefcase" style="margin-right:10px;"></span>Stok</a></li>
						<li><a href=""><span class="glyphicon glyphicon-plus-sign" style="margin-right:10px;"></span>Restok</a></li>
					</ul>
				</li>
				<li><a href="{{URL::to('test/tax')}}"><span class="glyphicon glyphicon-credit-card" style="color:#fff; margin-right:10px;"></span>Tax</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" style="color:#fff; margin-right:10px;"></span>Account<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{URL::to('fungsi/view_account')}}"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>Account Karyawan</a></li>
						<li><a href="{{URL::to('test/manage_log')}}"><span class="glyphicon glyphicon-stats" style="margin-right:10px;"></span>Log Karyawan</a></li>
					</ul>
				</li>

				
				
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book" style="color:#fff; margin-right:10px;"></span>Laporan<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><span class="glyphicon glyphicon-folder-close" style="margin-right:10px;"></span>Laporan by Kasir</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-stats" style="margin-right:10px;"></span>Laporan by Transaksi</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>Laporan by Customer</a></li>
					</ul>
				</li>
				<!--
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-volume-up" style="color:#fff; margin-right:10px;"></span>Link<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Add New Newsletter</a></li>

					</ul>
				</li>
			-->
		</ul>
		<span class="pull-right" id="f_clock" style="margin-right: 10px; line-height: 30px; color: #fff;"></span>
	</div><!-- /.navbar-collapse -->

</div><!-- /.container -->
</nav>