<div class="box box-primary no-print">
	<div class="box-header with-border">
		<h3 class="box-title">Quick Information</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		
		<h5><span class="label label-success">Pending Amount (Unclaimed)</span></h5>
		<p class="text-muted">
			{{  App\Transaction::where('status','1')->sum('amount')  }} 
		</p>

		<h5><span class="label label-danger">Claimed</span></h5>
		<p class="text-muted">
			{{  App\Transaction::where(['status'=>'2'])
			->whereDate('date',DB::raw('curdate()'))
			->sum('amount')  }} 
		</p>
		<h5><span class="label label-primary">Sent</span></h5>
		<p class="text-muted">
			{{  App\Transaction::where(['status'=>'3'])
			->whereDate('date',DB::raw('curdate()'))
			->sum('amount')  }} 
		</p>
		<hr>
		
	</div>
	<!-- /.box-body -->
</div>