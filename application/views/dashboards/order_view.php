		<!-------------Order Info---------------->
			<div class="row gx-4">
				<div class="col-9 col-md-3 m-auto mb-3 p-3 top jumbotron center border bg-light">
					<p class="fs-5">Order ID: <?=$order['id']?></p>
					<!-------------Shipping Info---------------->
					<p class="fw-bold mb-1">Customer Shipping Info:</p>
					<p class="mb-0">Name: <?=$shipping_details['first_name']?> <?=$shipping_details['last_name']?></p>
					<p class="mb-0">Address: <?=$shipping_details['address_one']?> <?=$shipping_details['address_two']?></p>
					<p class="mb-0">City: <?=$shipping_details['city']?></p>
					<p class="mb-0">State: <?=$shipping_details['state']?></p>
					<p>Zip: <?=$shipping_details['zip_code']?></p>
					<!-------------Billing Info---------------->
					<p class="fw-bold mb-1">Customer Billing Info:</p>
					<p class="mb-0">Name: <?=$billing_details['first_name']?> <?=$billing_details['last_name']?></p>
					<p class="mb-0">Address: <?=$billing_details['address_one']?> <?=$billing_details['address_two']?></p>
					<p class="mb-0">City: <?=$billing_details['city']?></p>
					<p class="mb-0">State: <?=$billing_details['state']?></p>
					<p>Zip: <?=$billing_details['zip_code']?></p>
				</div>
				<div class="col gy-0">
					<div class="row h-75">
						<!-------------Ordered Items---------------->
						<div class="table-container col-12 mb-0 h-100 overflow-auto">
							<table class="table table-light table-striped">
								<thead>
									<tr>
										<th scope="col-1">ID</th>
										<th scope="col-1">Item</th>
										<th scope="col-1">Price</th>
										<th scope="col-1">Quantity</th>
										<th scope="col-1">Total</th>
									</tr>
								</thead>
								<tbody>
<?php                  			foreach($order_details as $order_detail)
                       			{
?>                     				<tr>    
                       				    <td><?=$order_detail['product_id']?></td>
                       				    <td><?=$order_detail['name_at_order']?></td>
                       				    <td>$<?=$order_detail['price_at_order']?></td> 
                       				    <td><?=$order_detail['quantity']?></td>  
                       				    <td>$<?=(number_format((float)($order_detail['price_at_order']*$order_detail['quantity']), 2, '.', ''))?></td>                   
                       				</tr>
<?php                  			}
?>								</tbody>
							</table>
						</div>
					</div>
					<!-------------Status---------------->
					<div class="mt-5 row">
						<div class="col-12 col-md-6">
							<p class="bg-success text-light fs-3 text-center w-50 m-auto mb-3">Status: <?=$order['status']?></p>
						</div>
						<!-------------Total---------------->
						<div class="col-12 col-md-6">
							<div class="w-50 m-auto fs-5 jumbotron center border bg-light p-3">
								<p class="mb-0">Subtotal: $<?=(number_format((float)($order['grand_total']-$order['shipping_fee']), 2, '.', ''))?></p>
								<p class="mb-0">Shipping: $<?=$order['shipping_fee']?></p>
								<p class="mb-0">Total Price: $<?=$order['grand_total']?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
