<?php

use \Carbon\Carbon;
?>
<div class="box box-primary">



	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-envelope-o"></i> SMS </h3>

	</div>
	<!-- /.box-header -->



	<div class="box-body">
		<strong>SENDER</strong>
			<p class="text-muted">
				{{ $sms->address }}
			</p>
		<strong>SMS</strong>
			<p class="text-muted">
				{{ $sms->body }}
			</p>
		<br>
		<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
			<p>
				
			</p>
		<hr>
		<div>
			

				<form action='{{ route('search.filtersms') }}' method="post">
					
					<input type="hidden" name="id" value="{{ $sms->id }}">

					{{ csrf_field() }}

					<button type="submit" class="btn btn-primary pull-right">Filter</button>

				</form>

				
		
		</div>
	</div>
	<!-- /.box-body -->
</div>