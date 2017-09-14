@extends('main.main')

@section('pagetitle')


@endsection
@section('content')


<div class="row">
	<div class="col-md-8">

	<form action="{{ route('filter.smsinsert') }}" method="post">
			

			<input type="text" name="body">
			<button type="submit" class="btn btn-primary">Try</button>


	</form>


	</div>
	<div class="col-md-4">
		@include('main.panels.rightInfoPanel')
	</div>
</div>
	
@endsection