            <script>
					$(document).on('input','.sort', function()
                    {
                        this.form.submit();
                    });
            </script>	           
            <div class="row">
                <div class="col">
                    <h1 class="mb-2 display-4 fw-bold left">All Products</h1>
                </div>
                <!------Sort By-------->
                <div class="col-3 pt-4">
                    <form action ="<?=base_url()?>catalogs/product_conditions_process/<?=$page_num?>/<?=$category?>/<?=$sort?>/<?=$search?>" method="post" class="row align-content-end">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                        <div class="col-3 m-0 pt-2">
                            <label class="form-check-label" for="sort">Sort By:</label>
                        </div>
                        <div class="col-9 m-0 p-0">
                            <select class="form-select d-inline-block sort" name="sort">
<?php                       if($sort == 1)
                            {
?>                              <option value = '1' selected>Most Popular</option>
<?php                       }
                            else
                            {
?>                              <option value = '1'>Most Popular</option>
<?php                       }
                            if($sort == 2)
                            {
?>                              <option value = '2' selected>Price: Low to High</option>
<?php                       }
                            else
                            {
?>                              <option value = '2'>Price: Low to High</option>
<?php                       }
                            if($sort == 3)
                            {
?>                              <option value = '3' selected>Price: High to Low</option>
<?php                       }
                            else
                            {
?>                              <option value = '3'>Price: High to Low</option>
<?php                       }                                                                 
?>                          </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <!------Search-------->
                    <form action="<?=base_url()?>catalogs/product_conditions_process/<?=$page_num?>/<?=$category?>/<?=$sort?>/<?=$search?>" method="post" class="row gy-1">
                        <input type="hidden" class="form-label" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                        <input class="col-12 mt-3 form-control" type="text" placeholder="Search" name="search" value="<?=$search?>">
                        <!------Categories-------->
                        <p class="text-dark fs-5 fw-bold m-0 mb-2 mt-3">Categories</p>
                        <a href="<?=base_url()?>catalogs/product_conditions_process/<?=$page_num?>/0/<?=$sort?>/<?=$search?>" class="text-dark text-decoration-none">All Categories</a>
<?php               foreach($categories as $cat)
                    {
?>                      <a href="<?=base_url()?>catalogs/product_conditions_process/<?=$page_num?>/<?=$cat['id']?>/<?=$sort?>/<?=$search?>" class="text-dark text-decoration-none"><?=$cat['name']?></a>
<?php               }
?>                  </form>
                </div>
                <div class="col-10">
                    <!------Products-------->
                    <div class="row justify-content-center">
<?php               for($index = $page_data['row_start']; $index <= $page_data['row_end'];  $index++)
                    {
                        if(empty($products[$index]))
                        {
                            break;
                        }
?>                      <div class="col col-2_4">
                            <a class="text-dark text-decoration-none" href="<?=base_url()?>catalogs/show/<?=$products[$index]['id']?>">
                                <div class="p-3 mx-1 mb-3 border bg-light">
                                    <img src="<?=base_url()?>assets/img/<?=$products[$index]['url']?>" class="img-thumbnail center" alt="<?=base_url()?>assets/img/image.png">
                                    <p class="fs-5 fw-bold mb-0"><?=$products[$index]['name']?></p>
                                    <p class="fs-6 mb-0">$<?=$products[$index]['price']?></p>
                                </div>
                            </a>
                        </div>
<?php               }
?>                  </div>
                    <!------Pagination-------->
                    <ul class="center">
<?php               for($index = 1; $index <= $page_data['max_pages']; $index++)
                    {
?>                      <form class="d-inline pagination" action="<?=base_url()?>catalogs/product_conditions_process/<?=$page_num?>/<?=$category?>/<?=$sort?>/<?=$search?>" method="POST">
<?php                   if($index == $page_data['page_num'])
                        {
?>                          <li class="d-inline ms-1"><p class="pt-1 mx-0 my-0 d-inline align-middle"><?=$index?></p></li>
<?php                   }
                        else
                        {
?>                          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                            <li class="d-inline ms-1"><input class="btn btn-link px-0" type="submit" name="page" value="<?=$index?>"></li>
<?php                   }
?>                      </form>
<?php               }
?>                  </ul>   
                </div>
            </div>