@extends('layouts.print_layout')
@section('content')	
<html lang="en" style="width: 80mm; margin: 0;">
	<head>
		<style>
			html,body {
				font-family: consolas;
				font-size: 10pt;
				margin:0cm;
			}
			table{
				width: 100%;
			}
		</style>
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
		</script>
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
						<td colspan="2">{{$order->productName}} - {{$order->productColor}}</td>
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
						<td colspan="2">Nama Barang - Warna</td>
					</tr>
					<tr>
						<td style="text-align: right;">10 x 180.000</td>
						<td style="text-align: right;">=</td>
						<td style="text-align: right;">1.800.000</td>
					</tr>
				</td>
				
			</tr>

			<tr>
				<td>
					<tr>
						<td colspan="2">Nama Barang - Warna</td>
					</tr>
					<tr>
						<td style="text-align: right;">10 x 180.000</td>
						<td style="text-align: right;">=</td>
						<td style="text-align: right;">1.800.000</td>
					</tr>
				</td>
				
			</tr>

			<tr>
				<td>
					<tr>
						<td colspan="2">Nama Barang - Warna</td>
					</tr>
					<tr>
						<td style="text-align: right;">10 x 180.000</td>
						<td style="text-align: right;">=</td>
						<td style="text-align: right;">1.800.000</td>
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
				<td>Kembali</td>
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
