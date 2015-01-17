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
				<td colspan="3">
					<p style="text-align: center;  ">
						<font style="font-size: 1.2em;">ASIA JAYA</font>
						<br/>
						Menjul Tas Import Wanita
						<br />
						Grosir &amp; Eceran 
						<br />
						-------
						<br />
						<font style="font-size: 0.8em;">Pusat Grosir Senen Jaya </font>
						<br />
						<font style="font-size: 0.8em;">Blok 4 Lt. 3 Blok B 7 No. 16 Jakarta Pusat</font>
						<br />
						HP: 081 910 558 710
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td>No. Nota</td>
				<td>:</td>
				<td>{{$kodeFaktur}}</td>
			</tr>
			<tr>
				<td>ID Transaksi</td>
				<td>:</td>
				<td>{{$transaksi->id}}</td>
			</tr>
			<tr>
				<td>Waktu Transaksi</td>
				<td>:</td>
				<td>{{date("d-M-Y, G:i:s", strtotime($transaksi->created_at))}}</td>
			</tr>
			<tr>
				<td>Pelanggan</td>
				<td>:</td>
				<td>{{$namaPelanggan}}</td>
			</tr>
			<tr>
				<td>Karyawan</td>
				<td>:</td>
				<td>{{$namaSales}}</td>
			</tr>
		</table>
		-----------------------------------------

		<table>
			@foreach($orders as $order)
				<tr>
				<td>
					<tr>
						<td colspan="2">{{$order->name}}</td>
					</tr>
					<tr>
						<td style="text-align: right;">{{$order->quantity}} x {{toMoney($order->price/$order->quantity)}}</td>
						<td style="text-align: right;">=</td>
						<td style="text-align: right;">{{toMoney($order->price)}}</td>
					</tr>
				</td>
				
			</tr>
			@endforeach
			<!--
			<tr>
				<td>
					<tr>
						<td colspan="2">Nama Barang</td>
					</tr>
					<tr>
						<td style="text-align: right;">30 x 180.000</td>
						<td style="text-align: right;">=</td>
						<td style="text-align: right;">8.400.000</td>
					</tr>
				</td>
				
			</tr>
			-->
		</table>
		-----------------------------------------

		<table>
			<tr>
				<td>Total</td>
				<td>:</td>
				<td style="text-align: right;">{{toMoney($total)}}</td>
			</tr>

			<tr>
				<td>Diskon</td>
				<td>:</td>
				<td style="text-align: right;">{{toMoney($transaksi->discount)}}</td>
			</tr>

			<tr>
				<td>Pajak</td>
				<td>:</td>
				<td style="text-align: right;">{{$transaksi->tax}}%</td>
			</tr>

			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>
			<tr>
				<td>Grand Total</td>
				<td>:</td>
				<td style="text-align: right;">{{toMoney($transaksi->total)}}</td>
			</tr>
			<tr>
				<td>Dibayar</td>
				<td>:</td>
				<td style="text-align: right;">{{toMoney($transaksi->total_paid)}}</td>
			</tr>
			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>
			<tr>
				<td>Kembalian</td>
				<td>:</td>
				<td style="text-align: right;">{{toMoney($transaksi->total_paid - $transaksi->total)}}</td>
			</tr>
			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>
			<tr>
				<td colspan="3">
					
					<p style="text-align: center; border: 1px solid #000; font-size: 0.8em;">
						PERHATIAN!!!
						<br/>
						Barang yang sudah dibeli tidak dapat
						<br />
						ditukar atau dikembalikan.
					</p>
					<p style="text-align: center; font-size: 0.8em;">
						Terima kasih, semoga tetap menjadi langanan
					</p>
					<p style="text-align: center; font-size: 0.9em;">
						No. Rek: <br/>
						BCA: 091 800 3765 a/n: Winnie Husin<br/>
						Mandiri: 103-00-800-3765-4 a/n: Winnie Husin
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
