	  <div class="modal fade modal-default" id="quickAddCustomer" role="dialog">
	  	<div class="modal-dialog">

	  		<!-- Modal content-->
	  		<div class="modal-content">
	  			<div class="modal-header">
	  				<button type="button" class="close" data-dismiss="modal">&times;</button>
	  				<h4 class="modal-title"><i class="fa fa-user"></i> Quick Add Customer</h4>
	  			</div>
	  			<div class="modal-body">
	  			<form id='formAddCustomer' method="get">
	  			<div class="row">
	  			
	  				<fieldset class="form-group col-md-5">
	  					<span class="label label-default">Firstname</span>
	  					<input type="text" name="firstname"  style="text-transform:uppercase"  class="form-control" placeholder="Firstname">
	  				</fieldset>
	  				<fieldset class="form-group col-md-2">
	  					<span class="label label-default">M.I.</span>
	  					<input type="text" name="middleinitial"   style="text-transform:uppercase"  maxlength="1" required="required" class="form-control"  placeholder="M.I.">
	  				</fieldset>
	  				<fieldset class="form-group col-md-5">
	  					<span class="label label-default">Lastname</span>
	  					<input type="text"   name="lastname"  style="text-transform:uppercase"  required="required" class="form-control" placeholder="Lastname">
	  				</fieldset>


	  			</div>
	  			<div class="row">
	  				<fieldset class="form-group col-md-8">
	  					<span class="label label-default">Address</span>
	  					<input type="text" data-provide="typeahead"  id="searchAddress" style="text-transform:uppercase"  class="form-control"  placeholder="Address">
	  					<input type="hidden" id='quick_address' name='address' >
	  				</fieldset>

	  			</div>
	  			<div class="row">
	  				<div class="form-group col-md-8" id='quickadd_response_save'></div>
	  			</div>


	  			</form>
	  				
	  			</div>
	  			<div class="modal-footer">
	  				<button type="button" id="saveCustomer" class="btn btn-primary">Save</button>
	  				<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
	  			</div>
	  		</div>

	  	</div>
	  </div>

	  