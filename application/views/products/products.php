<?php
    $page_data = $this->session->flashdata('products_page_data');
    $page_num = $this->session->flashdata('products_page_num');
?>
<!-- dynamic viewer -->
<div id="products">
	<!------Product Table-------->
	<div class="table-container">
		<table class="table table-light table-striped align-middle">
			<thead>
				<tr>
					<th class="col-2" scope="col-1">Picture</th>
					<th class="col-1" scope="col-1">ID</th>
					<th class="col-4" scope="col-1">Name</th>
					<th class="col-1" scope="col-1">Price</th>
					<th class="col-1" scope="col-1">Stock</th>
					<th class="col-1" scope="col-1">Sold</th>
					<th class="col-2" scope="col-1">Action</th>
				</tr>
			</thead>
			<tbody>
<?php       for($index = $page_data['row_start']; $index <= $page_data['row_end'];  $index++)
            {
                if(empty($products[$index]))
                {
                    break;
                }
?>              <tr>    
                    <td><img src="<?=base_url()?>../Assets/img/<?=$products[$index]['url']?>" alt="<?=base_url()?>../Assets/img/image.png" class="img-thumbnail w-25"></td>
                    <td><?=$products[$index]['id']?></td>
                    <td><?=$products[$index]['name']?></td> 
                    <td>$ <?=$products[$index]['price']?></td>  
                    <td><?=$products[$index]['stock']?></td>
                    <td><?=$products[$index]['sold']?></td>
                    <td>
                        <button class="btn btn-primary" data-product_id="<?=$products[$index]['id']?>" data-bs-toggle="modal" data-bs-target="#product">Edit</button>
					    <button class="btn btn-danger" data-product_id="<?=$products[$index]['id']?>" data-bs-toggle="modal" data-bs-target="#delete_product">Delete</button>
                    </td>                     
                </tr>
<?php       }
?>          </tbody>
		</table>
	</div>
	<!------Page-------->
        <ul class="center">
<?php   for($index = 1; $index <= $page_data['max_pages']; $index++)
        {
?>          <form class="d-inline pagination" action="<?=base_url()?>products/page/<?=$index?>" method="POST">
<?php       if($index == $page_num)
            {
?>              <li class="d-inline ms-1"><p class="pt-1 mx-0 my-0 d-inline align-middle"><?=$index?></p></li>
<?php       }
            else
            {
?>              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                <li class="d-inline ms-1"><input class="btn btn-link px-0" type="submit" name="page" value="<?=$index?>"></li>
<?php       }
?>          </form>
<?php       }
?>      </ul>
</div>
