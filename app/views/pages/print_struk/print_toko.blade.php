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
	</head>
	<body style="width: 80mm; margin: 0;">
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
				<td>2342352</td>
			</tr>
			<tr>
				<td>Waktu</td>
				<td>:</td>
				<td>9 nov 2014 14:33:24</td>
			</tr>
			<tr>
				<td>Pelanggan</td>
				<td>:</td>
				<td>John Deo</td>
			</tr>
			<tr>
				<td>Karyawan</td>
				<td>:</td>
				<td>Upin</td>
			</tr>
		</table>
		-----------------------------------------

		<table>
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
		</table>
		-----------------------------------------

		<table>
			<tr>
				<td>Total</td>
				<td>:</td>
				<td style="text-align: right;">8.400.000</td>
			</tr>
			<tr>
				<td>Diskon</td>
				<td>:</td>
				<td style="text-align: right;">0</td>
			</tr>
			<tr>
				<td>Pajak</td>
				<td>:</td>
				<td style="text-align: right;">10%</td>
			</tr>
			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>
			<tr>
				<td>Grand Total</td>
				<td>:</td>
				<td style="text-align: right;">9.240.000</td>
			</tr>
			<tr>
				<td>Dibayar</td>
				<td>:</td>
				<td style="text-align: right;">10.000.000</td>
			</tr>
			<tr>
				<td colspan="3">
					----------------------------------------
				</td>
			</tr>
			<tr>
				<td>Kembali</td>
				<td>:</td>
				<td style="text-align: right;">760.000</td>
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
					</p>
				</td>
			</tr>
		</table>

		<table>
		</table>


	</body>
</html>
@stop
