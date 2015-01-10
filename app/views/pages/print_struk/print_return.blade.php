@extends('layouts.print_layout')
@section('content')	
<html lang="en" style="width: 80mm; margin: 0;">
	<head>
		<style>
			html,body {
				font-family: consolas;
				font-size: 10pt;
				margin: 0;
			}

			table{
				width: 100%;
			}
		</style>
	</head>
	<body style="width: 80mm; margin: 0;">
		<?php
			
			function toMoney($val,$symbol='Rp. ',$r=0)
			{
				$n = $val;
				$sign = ($n < 0) ? '-' : '';
				$i = number_format(abs($n),$r,",",".");

				return  $symbol.$sign.$i;
			}
		?>
		<table>
			<tr>
				<td colspan="3">Toko Asia Jaya</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>Faktur</td>
				<td>:</td>
				<td>{{$kodeFaktur}}</td>
			</tr>
			<tr>
				<td>Waktu Transaksi</td>
				<td>:</td>
				<td>{{date("d-M-Y, G:i:s", strtotime($created))}}</td>
			</tr>
			<tr>
				<td>Pelanggan</td>
				<td>:</td>
				<td>{{$pelanggan}}</td>
			</tr>
			<tr>
				<td>Karyawan</td>
				<td>:</td>
				<td>{{$sales}}</td>
			</tr>
		</table>
		-----------------------------------------

		<table>
			<tr>
				<td>
					<tr>
						<td>Tipe Retur</td>
						<td>:</td>
						<td>{{$type}}</td>
					</tr>
					<tr>
						<td>Solusi</td>
						<td>:</td>
						<td>{{$solution}}</td>
					</tr>
					<tr>
						<td>Barang Retur</td>
						<td>:</td>
						<td>{{$barangReturn}}</td>
					</tr>
					<tr>
						<td>Ditukar Dengan</td>
						<td>:</td>
						<td>{{$barangTukar}}</td>
					</tr>
					<tr>
						<td>Diferensial</td>
						<td>:</td>
						<td>{{$difference}}</td>
					</tr>
					<tr>
						<td colspan="3">
							----------------------------------------
						</td>
					</tr>
				</td>
			</tr>
			
		</table>

		<table>
			<!--<tr>
				<td>Total</td>
				<td>:</td>
				<td style="text-align: right;">total</td>
			</tr>
			<tr>
				<td>Diskon</td>
				<td>:</td>
				<td style="text-align: right;">sdasad</td>
			</tr>
			<tr>
				<td>Pajak</td>
				<td>:</td>
				<td style="text-align: right;">231%</td>
			</tr>
			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>
			<tr>
				<td>Grand Total</td>
				<td>:</td>
				<td style="text-align: right;">dfs</td>
			</tr>
			<tr>
				<td>Dibayar</td>
				<td>:</td>
				<td style="text-align: right;">dsf</td>
			</tr>
			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>
			<tr>
				<td>Kembali</td>
				<td>:</td>
				<td style="text-align: right;">dfs</td>
			</tr>
			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>-->
			<tr>
				<td colspan="3">
					
					<p>
						Terimakasih telah berbelanja di toko kami.
						<br/>
						Barang yang sudah dibeli tidak dapat dikembalikan.
						<br />
						Salam Owner.
					</p>
				</td>
			</tr>
		</table>

		<table>
		</table>
		
		<input type="button" id="print_button" value="print" onclick="printFunction()"/>
		<script>
			function printFunction() 
			{
				document.getElementById('print_button').style.visibility = 'hidden';
				window.print();
			}
		</script>

	</body>
</html>
@stop
