@extends('main.main')

@section('pagetitle')


@endsection
@section('content')
<style type="text/css">
	
.stripl,.stripr,.exp,.exp_index{

	width:10%;
}
.keywords:hover{

	cursor:pointer;
	letter-spacing: 5px;
	

}
.fields{
	margin-bottom: 5px;
}
a{
	cursor:pointer;
}
</style>



<?php

	
	$body = explode(" ",$sms->body);

	$col = App\Transaction::getColumnNames();
	  		 //$value->Field 
			 //$value->Type 
			  //$value->Null 


?>


<div class="row">
	<div class="col-md-12">




			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">SMS Filter</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">


					<div class="row ">
					@foreach($body as $index => $k)
					<div class="col-md-4 keywords">
						<span class="label label-primary">{{ $index }}</span>
						
						<span class="text-center">{{$k}}</span>
					</div>	
						

					@endforeach
					</div>
				

					<hr>
					<form action="{{ route('filter.smsfilter') }}" method="get">
					

					<div class="row" style="margin-bottom:10px;">
						<div class="col-md-6" >
							<fieldset>
								<input type="text" name="config_name" placeholder="Filter Name" style="width: 30%" class="form-control">
								<select name="status" style="width: 30%" class="form-control">
								@foreach(App\Status::all() as $k)
									<option value="{{$k->sm_status_no}}">{{ $k->name }}</option>

								@endforeach
									
								</select>
								<select name="direction"  style="width: 30%" class="form-control">
									<option value="1">Incoming</option>
									<option value="1">Outgoing</option>
								</select>
								
							</fieldset>
						</div>
					</div>

					<div class="row" >
						<div class="col-md-6" >
						<h3 class="box-title">Variables</h3>
							@foreach($col as $s => $k)


							@if(strpos($k->Type,'decimal') !== false || strpos($k->Type,'int') !== false)
							<fieldset class="fields">
								<span>Preview</span><div class="fields_content"></div>
								<input type="number" class="inputs" name="indexes[]" placeholder="{{ ucfirst($k->Field) }}">

								<input type="number" class="stripl" name="stripl[]" value="0" placeholder="StripL">
								<input type="number" class="stripr" name="stripr[]"  value="0" placeholder="StripR">
								<input type="text" class="exp" name="explode[]"  placeholder="Exp">
								<input type="number" class="exp_index" name="explode_index[]"  value="0">
								<input type="hidden"  name="type[]"  value="1">
								<input type="hidden"  name="col[]"  value="{{ $k->Field }}">
								<button type="button" class="btn btn-success strip">Strip</button>
								
							</fieldset>
							@else
							<fieldset class="fields">
								<span>Preview</span><div class="fields_content"></div>
								<input type="number" class="inputs" name="indexes[]" placeholder="{{ ucfirst($k->Field) }}">
								<input type="number" class="stripl" name="stripl[]" value="0" placeholder="StripL">
								<input type="number" class="stripr" name="stripr[]"  value="0" placeholder="StripR">
								<input type="text" class="exp" name="explode[]"  placeholder="Exp">
								<input type="number" class="exp_index" name="explode_index[]"  value="0">
								<input type="hidden"  name="type[]"  value="0">
								<input type="hidden"  name="col[]"  value="{{ $k->Field }}">
								<button type="button" class="btn btn-primary strip">Strip</button>
								
							</fieldset>

							@endif

							@endforeach
						</div>
						<div class="col-md-6 items-to-add" >
								
								<h3 class="box-title">Static <small><a id="addItem">Add Item</a></small></h3>



							@for($i = 0;$i < 10 ; $i++)
							<fieldset class="fields">								
								<input type="number" class="inputs" name="static_index[]" placeholder="Index">
								<input type="text" class="fields_content" name="static_word[]" placeholder="Value">
						   </fieldset>

						   @endfor


						</div>
					</div>

					{{ csrf_field() }}
					<hr>
					<div class="row col-md-12">
						<button type="submit" class="btn btn-primary pull-right">Save Filter</button>
					</div>

				</form>
				
				</div>
				<!-- /.box-body -->

			



			</div>

	




	</div>
	
</div>
	

@section('scripts')

<script type="text/javascript">

  $(document).ready(function(){


  	 <?php echo "var data =". json_encode($body);  ?>

  	 $(".inputs").keyup(function(event){



  	 	var values = $(event.target).val();

  	 	var inputvalue = '';

  	 	console.log(data.length);

  	 	if(values > data.length - 1)
  	 		inputvalue = '';
  	 	else if(values == '')
  	 		inputvalue = '';
  	 	else
  	 		inputvalue = data[values];



  	 	$(event.target.parentElement).children("div.fields_content").text(inputvalue);
  	 	$(event.target.parentElement).children("input.fields_content").val(inputvalue);



  	 });

  	  $(".strip").click(function(event){


  	  	var from =  data[$(event.target.parentElement).children("input.inputs").val()];

  	 	var valuesL = $(event.target.parentElement).children("input.stripl").val();
  	 	var valuesR = $(event.target.parentElement).children("input.stripr").val();

  	 	var exp = $(event.target.parentElement).children("input.exp").val();
  	 	var exp_i = $(event.target.parentElement).children("input.exp_index").val();


  	 	if(exp){

  	 		from = from.split(exp)[exp_i];

  	 	}

  	 	var inputvalue = from;

  	 	

  	 	if(valuesL > from.length || valuesR > from.length)
  	 		inputvalue = from;
  	 	else if(valuesL == '')
  	 		inputvalue = from;
  	 	else{
  	 		inputvalue = from.slice(valuesL);
  	 		inputvalue = inputvalue.slice(0, (inputvalue.length  - valuesR));
  	 	}
  	 		


  	 	 $(event.target.parentElement).children("div.fields_content").text(inputvalue);


  	 	



  	 });




  	});
</script>
@endsection




@endsection