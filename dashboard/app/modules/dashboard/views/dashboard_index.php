<!-- <section id="menus">
	<div class="container-fluid">
		<div class="card">
			<div class="card-close d-none">
				<div class="dropdown">
					<button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
					<div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
				</div>
			</div>
			
		</div>
	</div>
</section> -->

<div class="row col-12">
	
</div>
<div id="graphs">
	
	<div class="form-group col-4">
		<label for="compare_status2">Date</label> 
		<input type="date" name="compare_status2" id="compare_status2" class="form-control" data-id="2"  min="2019-07-17" max="2019-07-21" value="2019-07-21" />
	</div>
	<div id="chartContainer1" style="height: 370px; width: 100%;" ></div> <div id="chartContainer5" style="height: 370px; width: 100%; display:none;"></div>
	<div id="chartContainer2" style="height: 370px; width: 100%;"></div><div id="chartContainer6" style="height: 370px; width: 100%; display:none;"></div>

	
	<div id="chartContainer3" style="height: 370px; width: 100%;"></div><div id="chartContainer7" style="height: 370px; width: 100%; display:none;"></div>
	<div id="chartContainer4" style="height: 370px; width: 100%;"></div><div id="chartContainer8" style="height: 370px; width: 100%; display:none;"></div>
</div>
<!-- <div id="summary">
asdadad merchant category gender locations
</div> -->
<div class="tables_wrapper">
	<div id="tables">
		<section id="roles">
			<div class="container-fluid">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h3 class="h6">Transactions</h3>
					</div>
					<div class="card-body">				
						<table class="table table-striped table-bordered table-hover dt-responsive" id="datatables">
							<thead>
								<tr>
									<th class="all">ID</th>
									<th class="all">Date Received</th>	
									<th class="all">Comment</th>				
								</tr>
							</thead>
							<tbody>
							<?php
								foreach ($transactions->result as $transaction) : 
									?>
										<tr>
											<td scope="row"><?php echo $transaction->txid; ?></td>
											<td><?php echo date("M d, Y h:i A", ($transaction->time)); ?></td>
											<td><?php echo isset($transaction->comment)? $transaction->comment : ''; ?></td>
										</tr>
									<?php
								endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>



	</div>
</div>

