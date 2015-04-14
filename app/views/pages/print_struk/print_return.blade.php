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
						Menjual Tas Import Wanita
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
					<!--
					<tr>
						<td>Solusi</td>
						<td>:</td>
						<td>{{$solution}}</td>
					</tr>
					-->
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
						<td>Selisih</td>
						<td>:</td>						
						<td>{{$difference*-1}}</td>												
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
					
					<p style="text-align: center; border: 1px solid #000; font-size: 0.8em;">
						PERHATIAN!!!
						<br/>
						Barang yang sudah dibeli tidak dapat
						<br />
						ditukar atau dikembalikan.
					</p>
					<p style="text-align: center; font-size: 0.8em;">
						Terima kasih, semoga tetap menjadi langganan
					</p>
					<p style="text-align: center; font-size: 0.9em;">
						No. Rek: <br/>
						BCA: 091 800 3765 a/n: Winnie Husin<br/>
						Mandiri: 103-00-800-37654 a/n: Winnie Husin
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
