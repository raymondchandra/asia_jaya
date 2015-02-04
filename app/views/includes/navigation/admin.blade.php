
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
				@if(Auth::user()->role == 1) 
				<li><a href="{{URL::route('david.view_dashboard')}}"><span class="glyphicon glyphicon-home" style="color:#fff; margin-right:10px;"></span>Dashboard</a></li>
				@endif
				<li><a href="{{URL::route('david.view_transaction')}}"><span class="glyphicon glyphicon-usd" style="color:#fff; margin-right:10px;"></span>Transaksi Hari Ini</a></li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-folder-close" style="color:#fff; margin-right:10px;"></span>Barang<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						@if( (Auth::user()->role == 1) || (Auth::user()->role == 2) ) 
						<li><a href="{{URL::route('gentry.view_stock')}}"><span class="glyphicon glyphicon-unchecked" style="margin-right:10px;"></span>View Stock</a></li>
						@endif
						@if(Auth::user()->role == 1) 
						<li><a href="{{URL::route('david.view_restock_history')}}"><span class="glyphicon glyphicon-collapse-down" style="margin-right:10px;"></span>View Restock History</a></li>
						@endif
						@if( (Auth::user()->role == 1) || (Auth::user()->role == 2) ) 
						<li><a href="{{URL::route('gentry.view_return')}}"><span class="glyphicon glyphicon-log-in" style="margin-right:10px;"></span>View Retur</a></li>
						<li><a href="{{URL::route('david.view_obral')}}"><span class="glyphicon glyphicon-new-window" style="margin-right:10px;"></span>View Obral</a></li>
						@endif
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-briefcase" style="color:#fff; margin-right:10px;"></span>Laporan<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{URL::route('david.view_all_transaction')}}"><span class="glyphicon glyphicon-briefcase" style="margin-right:10px;"></span>Semua Transaksi</a></li>
						@if(Auth::user()->role == 1) 
						<li><a href="{{URL::route('david.view_keuntungan')}}"><span class="glyphicon glyphicon-usd" style="margin-right:10px;"></span>Semua Keuntungan</a></li>
						@endif
						@if(Auth::user()->role == 1) 	
						<li><a href="{{URL::route('david.view_cashflow')}}"><span class="glyphicon glyphicon-refresh" style="margin-right:10px;"></span>Semua Cashflow</a></li>
						@endif
						@if(Auth::user()->role == 1) 
						<li><a href="{{URL::route('gentry.view_customer')}}"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>Semua Customer</a></li>
						@endif
					</ul>
				</li>
				@if(Auth::user()->role == 1) 
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" style="color:#fff; margin-right:10px;"></span>Kepegawaian<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{URL::route('david.viewAccount')}}"><span class="glyphicon glyphicon-user" style="margin-right:10px;"></span>Account Karyawan</a></li>
						<li><a href="{{URL::route('gentry.manage_log')}}"><span class="glyphicon glyphicon-stats" style="margin-right:10px;"></span>Log Karyawan</a></li>
					</ul>
				</li> 
				@endif
				@if(Auth::user()->role == 1) 
				<li><a href="{{URL::route('gentry.view_tax')}}"><span class="glyphicon glyphicon-credit-card" style="color:#fff; margin-right:10px;"></span>Set Tax</a></li>
				@endif

				<li><a href="{{URL::route('mobile_site')}}" target="_blank"><span class="glyphicon glyphicon-shopping-cart" style="color:#fff; margin-right:10px;"></span>Form Pemesanan</a></li>

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