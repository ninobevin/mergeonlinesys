@extends('main.main')

@section('pagetitle')


@endsection
@section('content')


<div class="row">
	<div class="col-md-8">


	@if(isset($Customers))
		@foreach($Customers as $customer)
		
			
			@include('main.panels.searchDetailsCustomer')
		
		
		@endforeach
	@endif

	@if(isset($Transactions))
		@foreach($Transactions as $transaction)
		
		
			@include('main.panels.searchInfoReference')
		
		
		@endforeach
	@endif
	@if(isset($Sms))
		@foreach($Sms as $sms)
		
		
			@include('main.panels.searchInfoSms')
		
		
		@endforeach
	@endif
	</div>
	<div class="col-md-4">
		@include('main.panels.rightInfoPanel')
	</div>
</div>
	
	@if(isset($Customers))
	{{ $Customers->appends(['search'=>$_REQUEST['search'],'cb_option'=>$_REQUEST['cb_option']])->links() }}
	@endif
	@if(isset($Transactions))
	{{ $Transactions->appends(['search'=>$_REQUEST['search'],'cb_option'=>$_REQUEST['cb_option']])->links() }}
	@endif
	@if(isset($Sms))
		{{ $Sms->appends(['search'=>$_REQUEST['search'],'cb_option'=>$_REQUEST['cb_option']])->links() }}
	@endif
@endsection