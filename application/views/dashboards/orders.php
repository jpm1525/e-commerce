<?php
    $page_data = $this->session->flashdata('page_data');
    $page_num = $this->session->flashdata('page_num');
?>
<!-- dynamic viewer -->
<div id="searches">
            <div class="row">
                <div class="col">
                    <table class="table">
					    <thead>
					    	<tr>
					    		<th class="col-1" scope="col-1">Order ID</th>
					    		<th class="col-2" scope="col-1">Name</th>
					    		<th class="col-1" scope="col-1">Date</th>
					    		<th class="col" scope="col-1">Billing Address</th>
					    		<th class="col-1" scope="col-1">Total</th>
					    		<th class="col-2" scope="col-1">Status</th>
					    	</tr>
					    </thead>
                        <tbody>
<?php                   for($index = $page_data['row_start']; $index <= $page_data['row_end'];  $index++)
                        {
                            if(empty($searches[$index]))
                            {
                                break;
                            }
?>                          <tr>    
                                <td><a href="<?=base_url()?>dashboards/order_view/<?=$searches[$index]['id']?>"><?=$searches[$index]['id']?></a></td>
                                <td><?=$searches[$index]['first_name']?> <?=$searches[$index]['last_name']?></td>
                                <td><?=$searches[$index]['date_ordered']?></td> 
                                <td><?=$searches[$index]['address_one']?> <?=$searches[$index]['address_two']?></td>  
                                <td>$<?=$searches[$index]['grand_total']?></td>
                                <td>
                                    <form class="order_status" action="<?=base_url()?>dashboards/status_change/<?=$searches[$index]['id']?>" method="post">
                                        <select class="form-select" name="order_status" aria-label="Default select example">
<?php                               if($searches[$index]['status'] == "Order in Process")
                                        {
?>                                          <option selected><?=$searches[$index]['status']?></option>
<?php                                   }
                                    else
                                        {
?>                                          <option>Order in Process</option>
<?php                                   }
                                        if($searches[$index]['status'] == "Shipped")
                                        {
?>                                          <option selected><?=$searches[$index]['status']?></option>
<?php                                   }
                                    else
                                        {
?>                                          <option>Shipped</option>
<?php                                   }
                                    if($searches[$index]['status'] == "Cancelled")
                                        {
?>								    	            
?>                                          <option selected><?=$searches[$index]['status']?></option>
<?php                                   }
                                    else
                                        {
?>                                          <option>Cancelled</option>
<?php                                   }
?>						                </select>
                                    </form>
                                </td>                     
                            </tr>
<?php                   }
?>                      </tbody>
                    </table>
                </div>
            </div>
            <ul class="center">
<?php       for($index = 1; $index <= $page_data['max_pages']; $index++)
            {
?>              <form class="d-inline pagination" action="<?=base_url()?>dashboards/page/<?=$index?>" method="POST">
<?php           if($index == $page_num)
                {
?>                  <li class="d-inline ms-1"><p class="pt-1 mx-0 my-0 d-inline align-middle"><?=$index?></p></li>
<?php           }
                else
                {
?>                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                    <li class="d-inline ms-1"><input class="btn btn-link px-0" type="submit" name="page" value="<?=$index?>"></li>
<?php           }
?>              </form>
<?php       }
?>          </ul>         
</div>
