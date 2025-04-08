            <h1 class="mb-4 display-4 fw-bold">Cart</h1>
            <div class="table-container">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th class="col text-center">Item</th>
                            <th class="col-2">Price</th>
                            <th class="col-3">Quantity</th>
                            <th class="col-2">Total</th>
                            <th class="col-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <td class="text-center">The Product</td>
                            <td>$1.00</td>
                            <td class="row">
                                <form class="col" action="" method="post">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                                    <input class="w-50 form-control" type="number" name="quantity" value="3" min="1" max="1000"/>
                                </form>
                            </td>
                            <td>$3.00</td>
                            <td>
                                <form class="col" action="" method="post">
                                    <input class="btn btn-danger d-inline-block" type="button" name="remove" value="X">
                                </form>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-center">The Product 2</td>
                            <td>$4.00</td>
                            <td class="row">
                                <form class="col" action="" method="post">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                                    <input class="w-50 form-control" type="number" name="quantity" value="2" min="1" max="1000"/>
                                </form>
                            </td>
                            <td>$8.00</td>
                            <td>
                                <form class="col" action="" method="post">
                                    <input class="btn btn-danger d-inline-block" type="button" name="remove" value="X">
                                </form>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-center">The Product 3</td>
                            <td>$5.00</td>
                            <td class="row">
                                <form class="col" action="" method="post">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                                    <input class="w-50 form-control" type="number" name="quantity" value="1" min="1" max="1000"/>
                                </form>
                            </td>
                            <td>$5.00</td>
                            <td>
                                <form class="col" action="" method="post">
                                    <input class="btn btn-danger d-inline-block" type="button" name="remove" value="X">
                                </form>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-center">The Product 4</td>
                            <td>$3.00</td>
                            <td class="row">
                                <form class="col" action="" method="post">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                                    <input class="w-50 form-control" type="number" name="quantity" value="2" min="1" max="1000"/>
                                </form>
                            </td>
                            <td>$6.00</td>
                            <td>
                                <form class="col" action="" method="post">
                                    <input class="btn btn-danger d-inline-block" type="button" name="remove" value="X">
                                </form>
                            </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-center">The Product 5</td>
                            <td>$1.00</td>
                            <td class="row">
                                <form class="col" action="" method="post">
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                                    <input class="w-50 form-control" type="number" name="quantity" value="4" min="1" max="1000"/>
                                </form>
                            </td>
                            <td>$4.00</td>
                            <td>
                                <form class="col" action="" method="post">
                                    <input class="btn btn-danger d-inline-block" type="button" name="remove" value="X">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="fs-4 fw-bold">Grand Total: $25.00</p>
            <a href="../products/catalog.html" class="btn btn-success">Continue Shopping</a>
            <h2 class="mt-4 display-6 fw-bold">Check Out</h2>
            <form action="" method="post">
                <input type="hidden" class="form-label" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                <div class="row mb-3">
			    	<div class="col-md-6 p-3 jumbotron center border bg-light ">  
			    		<h3 class="fs-4 fw-bold pb-2">Shipping Details</h3>
			    			<label class="form-label " for="first_name">First Name:</label>
			    			<input class="form-control" type="text" name="first_name"/ required>
			    			<label class="form-label " for="last_name">Last Name:</label>
			    			<input class="form-control" type="text" name="last_name"/ required>
			    			<label class="form-label " for="address_1">Address:</label>
			    			<input class="form-control" type="text" name="address_1"/ required>
			    			<label class="form-label " for="address_2">Address 2:</label>
			    			<input class="form-control" type="text" name="address_2"/ required>
			    			<label class="form-label " for="city">City:</label>
			    			<input class="form-control" type="text" name="city"/ required>
			    			<label class="form-label " for="state">State:</label>
			    			<input class="form-control" type="text" name="state"/ required>
			    			<label class="form-label " for="zipcode">Zipcode:</label>
			    			<input class="form-control" type="number" name="zipcode"/ required>
			    			<div class="text-danger">
			    				
			    			</div>
			    			<div class="text-success">
			    				
			    			</div>
			    	</div>
			    	<div class="col-md-6 p-3 jumbotron center border bg-light ">
			    		<h3 class="fs-4 fw-bold pb-2">Billing Details</h3>
                            <input class="form-check-input" type="checkbox" value="true" name="same">
                            <label class="form-check-label ms-2 " for="same"> Same as Shipping </label>
			    			<label class="form-label d-block" for="first_name">First Name:</label>
			    			<input class="form-control" type="text" name="first_name"/>
			    			<label class="form-label " for="last_name">Last Name:</label>
			    			<input class="form-control" type="text" name="last_name"/>
			    			<label class="form-label " for="address_1">Address:</label>
			    			<input class="form-control" type="text" name="address_1"/>
			    			<label class="form-label " for="address_2">Address 2:</label>
			    			<input class="form-control" type="text" name="address_2"/>
			    			<label class="form-label " for="city">City:</label>
			    			<input class="form-control" type="text" name="city"/>
			    			<label class="form-label " for="state">State:</label>
			    			<input class="form-control" type="text" name="state"/>
			    			<label class="form-label " for="zipcode">Zipcode:</label>
			    			<input class="form-control" type="number" name="zipcode"/>
			    			<div class="text-danger">
			    				
			    			</div>
			    			<div class="text-success">
			    				
			    			</div>
			    	</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 p-3 mt-2 jumbotron border bg-light">
                        <h3 class="fs-4 fw-bold pb-2">Card Details</h3>
                            <label class="form-label " for="card_number">Card Number:</label>
                            <input class="form-control" type="number" name="card_number"/>
                            <label class="form-label " for="security_code">Security Code:</label>
                            <input class="form-control" type="password" name="security_code"/>
                            <label class="form-label " for="expiration">Expiration:</label>
                            <input class="form-control" type="month" name="expiration"/>
                            <input class="center btn btn-primary mt-2 right" id="submit" type="submit" value="Pay"/>
                    </div>
                </div>
            </form>
