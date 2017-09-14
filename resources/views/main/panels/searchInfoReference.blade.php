<?php

use \Carbon\Carbon;
?>
<div class="box box-primary">



	<div class="box-header with-border">
		<h3 class="box-title">Transaction </h3>
			@if($transaction->getStatus->sm_status_no == 1)
				<span class="label label-success">{{ $transaction->getStatus->name }}</span>
			@elseif($transaction->getStatus->sm_status_no == 2)
		<span class="label label-danger">{{ $transaction->getStatus->name }}</span>
		<span class="text-muted pull-right"> {{ Carbon::parse($transaction->date_claimed)->diffForHumans()  }}</span>
			@elseif($transaction->getStatus->sm_status_no == 3)
				<span class="label label-info">{{ $transaction->getStatus->name }}</span>
			@endif
	</div>
	<!-- /.box-header -->



	<div class="box-body">
		<strong>SMS</strong>
			<p class="text-muted">
				{{ $transaction->body_sms }}
			</p>
		<br>
		<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
			<p>
				
			</p>
		<hr>
		<div>
			@if($transaction->getStatus->sm_status_no == 1)

				<form action='{{ route("transaction.claimform",["tran" => $transaction->tran_id]) }}' method="post">
					
					{{ csrf_field() }}
					<button type="submit" class="btn btn-primary pull-right">Claim</button>

				</form>

				
			@endif
		</div>
	</div>
	<!-- /.box-body -->
</div>