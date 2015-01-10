@extends('layouts.admin_layout'){{-- WARNING! fase ini sementara untuk show saja, untuk lebih lanjut akan dibuat controller agar tidak meng-extend layout --}}
@section('content')	
<div class="container-fluid">
	<div class="row ">
		<div class="g-lg-12">
			<div class="s_title_n_control">
				<h3 style="float: left;">
					Kelola Tax/Pajak
				</h3>
				<!--<a href="index.php" class="btn btn-default" style="float: right; margin-top: 20px; margin-right: 10px;">Back</a> -->
			</div>
			<span class="clearfix"></span>
			<hr></hr>
			<!--<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target=".pop_up_add_account" style="margin-bottom: 20px;">
				<span class="glyphicon glyphicon-plus"></span>Add Account
			</button>-->
			<div class="row">
				<div class="g-lg-6 g-lg-push-3">
					<div class="panel panel-default">
						<!--<div class="panel-heading">Panel heading without title</div>-->
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="control-label g-lg-3">Nilai Tax (%)</label>
									<div class="g-lg-7">
										@if($tax==null)
										<input type="text" class="form-control" value="0" id="taxAmount" placeholder="e.g.: 10">
										@else
										<input type="text" class="form-control ff_num_only" value="{{$tax->amount}}" id="taxAmount" placeholder="e.g.: 10">
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="control-label g-lg-3"> </label>
									<div class="g-lg-7">
										<button type="button" class="btn btn-success" id="saveTax">Save</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script>

	/* -- jan 9 2015 | START -- */
	/* -- button disabled error prevention -- */
	$('#taxAmount').on('input', function() {  
		//var ff_harga_min = parseFloat($(this).closest('.form-horizontal').find('#edit_harga_min').text());
		if( ($(this).val() != '') && !isNaN($(this).val())){
			$('#saveTax').removeAttr('disabled');
		} else {
			$('#saveTax').attr('disabled','disabled');
		}
	});
	/* -- jan 9 2015 | END -- */

	$("body").on('click', '#saveTax', function(){
		$tax = $("#taxAmount").val();
		$.ajax({
			type: 'PUT',
			url: '{{URL::route('gentry.edit_tax')}}',
			data: {
				'data' : $tax
			},
			success: function(response){
				alert('Perubahan Tax Berhasil');
			},error: function(xhr, textStatus, errorThrown){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				alert("responseText: "+xhr.responseText);
			}
		},'json');
	});
</script>
@stop
