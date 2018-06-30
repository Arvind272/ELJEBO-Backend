<style type="text/css">
body {font-family: Arial;}
/* Style the tab */
.tab {overflow: hidden;border: 1px solid #ccc;background-color: #f1f1f1;}
/* Style the buttons inside the tab */
.tab button {background-color: inherit;float: left;border: none;outline: none;cursor: pointer;padding: 14px 16px;transition: 0.3s;font-size: 17px;}
/* Change background color of buttons on hover */
.tab button:hover {background-color: #ddd;}
/* Create an active/current tablink class */
.tab button.active {background-color: #ccc;}
/* Style the tab content */
.tabcontent {display: none;border: 1px solid #ccc;border-top: none;}
</style>

<?php $referalID = $this->uri->segment(3) ?>

<div class="page page-tables-datatables">
	<div class="pageheader">
		<h2>View Referral <span> Referral ELJEBO</span></h2>
	</div>
	<!-- row -->
	<div class="row">
		<!-- col -->
		<div class="col-md-12">
			<section class="tile">
				<!-- tile header -->
				<div class="tile-header dvd dvd-btm">
					<h1 class="custom-font"><strong>View Referral</strong></h1>
					<?php echo $this->session->flashdata('message'); ?>
				</div>
				<!-- /tile header -->
				<!-- tile body -->
				<div class="tile-body">
					<div class="container-fluid">

						<div class="col-md-12">
							<h3><?php echo ucfirst($referralName); ?> </h3>
							<?php if(!empty($final_data)){ ?>
								<div class="tab">
									<button class="tablinks" onclick="openCity(event, 'London')">Referral Orders</button>
									<button class="tablinks" onclick="openCity(event, 'Paris')">Settlement Orders</button>
								</div>
								<form method="post" action="<?php echo site_url(); ?>admin/add_settlement">
									<div class="tabcontent" id="London" style="display: block;">
										<table class="table table-striped table-bordered" width="100%"> 
											<thead>
												<tr>
													<th>Order ID</th>
													<th>Stylist Name</th>
													<th>Customer Name</th>
													<th>Oder Date</th>
													<th>Amount</th>
													<th>Referral Amount</th>
												</tr>
											</thead>

											<tbody>
												<?php
												$orderID = $customer_id = '';
												$amount = $mainamountTotal = '0';
												$order_id = $referalAmount = $cust_id = array();
												if (!empty($referral_orders)) {
													foreach ($referral_orders as $key => $data) {
														
														$order_id = $data->id;
														//$orderID = implode(",",$order_id);
														$cust_id[] = $data->customer_id;
														$customer_id = implode(", ", $cust_id);

														$referalAmount[] = $data->actual_amount;
														$refeAmount = implode(",",$referalAmount);
														?>
														<tr>
															<td><?php echo $data->id; ?></td>
															<td><?php echo ucwords($data->styler_firstname); ?> <?php echo ucwords($data->styler_lastname); ?></td>
															<td><?php echo ucfirst($data->firstname); ?> <?php echo ucfirst($data->lastname); ?></td>
															<td><?php echo date("Y-m-d", strtotime($data->appointment_date)); ?></td>
															<td>£<span id="amount1"><?php echo $data->actual_amount; ?></span></td>
															<td>£<?php $ref_amount = 10*$data->actual_amount/100;  echo number_format($ref_amount, 2); ?></td>
															<input type="hidden" name="settle[<?php echo $order_id; ?>][referral_id]" value="<?php echo $referalID; ?>">
															<input type="hidden" name="settle[<?php echo $order_id; ?>][customer_id]" value="<?php echo $data->customer_id; ?>">
															<input type="hidden" name="settle[<?php echo $order_id; ?>][order_id]" value="<?php echo $data->id; ?>">
															<input type="hidden" name="settle[<?php echo $order_id; ?>][amount]" value="<?php echo $ref_amount; ?>">
														</tr>
														<?php
														$mainamountTotal  +=$ref_amount;
														$amount  +=$data->actual_amount;
													}
												}
												?>
												<tr>
													<td colspan="3"></td>

													<td>Total</td>
													<td>£<?php echo $amount; ?>.00</td>
													<td>£<?php echo $mainamountTotal; ?></td>
												</tr>
											</tbody>
										</table>

										<?php if (!empty($referral_orders)) { ?>
											<div class="col-md-12">
												<br/>
												<p>Referral Amount : £<?php echo $mainamountTotal; ?></p>
												<p>Date :<?php echo date("Y-m-d") ?></p>
												<br/>
											</div>
											<div class="row">
												<div class="col-md-12">
													<input type="submit" name="" class="btn btn-info" value="Settle Now" style="margin: 15px;">
												</div>
											</div>
										<?php } ?>
									</div>
								</form>
								<div class="tabcontent" id="Paris">
									<table class="table table-striped table-bordered" width="100%"> 
										<thead>
											<tr>
												<th>Order ID</th>
												<th>Stylist Name</th>
												<th>Customer Name</th>
												<th>Settlement Date</th>
												<th>Settlement Amount</th>

											</tr>
										</thead>

										<tbody>

											<?php foreach ($final_data1 as $data) {  ?>

												<tr>
													<td><?php echo $data->orderID; ?></td>
													<td><?php echo ucfirst($data->styler_Fname); ?> <?php echo ucfirst($data->styler_Lname); ?></td>
													<td><?php echo ucfirst($data->customer_Fname); ?> <?php echo ucfirst($data->customer_Lname); ?></td>

													<td> <?php    $date1 = $data->settlement_date;
													echo $newDate = date("Y-m-d", strtotime($date1)); ?></td>


													<td>£<?php echo $data->settlementAmount; ?></td>

												</tr>

											<?php } ?>
										</tbody>
									</table>
								</div>

							<?php }else{ ?>


								<h4 style="text-align: center;"> No Referral Order</h4>

							<?php   } ?>

						</div>
					</div>


					<!-- /tile body -->
				</section>
			</div>
			<!-- /col -->
		</div>
		<!-- /row -->
	</div>  



	<script>
		var elements = Object.keys(amount1).innerHTML;
//alert(elements);
// var elements = document.getElementsByClassName("amount1");
var elementlength = elements.length;

var data = elementlength - 1;


var names = 0;

for(var i=0; i<data; i++) {

	names +=  +elements[i].innerHTML;

}
console.log(names)
var totalservice = parseFloat(names);

//  alert(totalservice);

document.getElementById("total").innerHTML = a;

</script>

<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
</script>