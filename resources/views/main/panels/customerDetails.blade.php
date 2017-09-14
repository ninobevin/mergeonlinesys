

					


	

 	
							<div>
						
							<strong>Fullname</strong>
							<p class="text-muted">
								{{ $Customer->getFullName() }}
							</p>
						
						
							<strong>Address </strong>
							<p class="text-muted">
								{{ $Customer->address->getAddress() }}
							</p>
					
					
							<strong>Contact</strong>
							<p class="text-muted">
								{{ $Customer->contact }}
							</p>

							</div>

							<div class="no-print">
								<button type="button" data-toggle="modal" data-target="#confirmClaim" class="btn btn-primary pull-right"><i class="fa fa-handshake-o"></i> PAYOUT</button>
							</div>



