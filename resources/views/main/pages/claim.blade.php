@extends('main.main')

@section('pagetitle')


@endsection
@section('content')

@include('main.modals.quickAddCustomer')
@include('main.modals.confirmClaim')

<div class="row">
	<div class="col-md-8">




			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Claim Form</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					
					<strong><i class="fa fa-envelope"></i> Full SMS</strong>
					<p class="text-muted">
						 {{ $Transaction->body_sms }}
					</p>

					<div class="row">
						<div class="col-sm-4">
							<strong>Amount</strong>
							<p class="text-muted">
								&#8369; {{ number_format($Transaction->amount,2) }}
							</p>
						</div>
						<div class="col-sm-4">
							<strong>Service Charge </strong>
							<p class="text-muted">
								&#8369; {{ number_format($Transaction->service_charge,2) }}
							</p>
						</div>
						<div class="col-sm-4">
							<strong>Commission</strong>
							<p class="text-muted">
								&#8369; {{ App\Classes\Computation::getAgentCharge($Transaction->amount) }}
							</p>
						</div>
					</div>
					<hr>
					<strong><i class="fa fa-user"></i> Customer Details</strong>
						<br>
				
						<div class="row no-print">
							<div class="col-md-6">	
								<div class="input-group">
						            <input type="text" autocomplete="off" style="" name='search' data-provide="typeahead" id='searchCustomer' class="form-control"  placeholder="Customer Name">
						            <span class="input-group-btn">
						              <button type="button"  class="btn btn-flat"><i class="fa fa-search"></i>
						              </button>						     
						            </span>
		          				</div>
	          				</div>
	          				<div class="col-md-4">
	          					  <button type="button"  class="btn btn-primary btn-flat" data-toggle="modal" data-target="#quickAddCustomer"><i class="fa fa-user"> Quick add Customer</i>
						              </button>
	          				</div>
						</div>
					
					
					<div id='result'></div>
							
					
					
					
				</div>
				<!-- /.box-body -->
			</div>




	</div>
	<div class="col-md-4">
		@include('main.panels.rightInfoPanel')
	</div>
</div>
	

@section('scripts')

<script type="text/javascript">

  $(document).ready(function(){

    $.ui.autocomplete.prototype._renderItem = function( ul, item){
      var term = this.term.split(' ').join('|');
      var re = new RegExp("(" + term + ")", "gi") ;
      var t = item.label.replace(re,"<b>$1</b>");
      return $( "<li></li>" )
      .data( "item.autocomplete", item )
      .append( "<a>" + t + "</a>" )
      .appendTo( ul );
    };




    $( "#searchCustomer" ).autocomplete({
      source:function(request, response) {
        $.getJSON("{{ route('searchMain') }}", {term: request.term,cb_option: 2 },
          response);
      },
      select: function(str,ui){

      	$.get("{{ route('searchCustomer') }}",{term :ui.item.value},function(data){

      			$('#result').html(data);
      	
      	});
	}});


	$('#saveCustomer').click(function(){

		var data = $('#formAddCustomer').serialize();
		

		console.log(data);

	    $.ajax({
		  url: "{{ route('saveQuickAddCustomer') }}",
		  method: "GET",
		  data: data
		}).done(function(data){
			$("#quickadd_response_save").html(data);
		}).fail(function(){
			console.log("failed");
		});

	});

	    $( "#searchAddress" ).autocomplete({
      source:function(request, response) {
        $.getJSON("{{ route('searchAddress') }}", {term: request.term},
          response);
      },
      select: function(str,ui){

     	$.get("{{ route('searchAddressView') }}",{term :ui.item.value},function(data){

      			$("#quick_address").val(data);
      	
      	});
      	//console.log(str);

	}});

		$('[data-dismiss=modal]').on('click', function (e) {
		    var $t = $(this),
		        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

		  $(target)
		    .find("input,textarea,select")
		       .val('')
		       .end()
		    .find("input[type=checkbox], input[type=radio]")
		       .prop("checked", "")
		       .end();
		});



  });
</script>
@endsection




@endsection