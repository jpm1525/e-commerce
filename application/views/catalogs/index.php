            <h1 class="center mb-4 display-4 fw-bold">Featured Products</h1>
            <div class="row justify-content-center">
<?php       foreach($products as $product)
            {
?>              <div class="col-3">
                    <a class="text-dark text-decoration-none" href="<?=base_url()?>catalogs/show/<?=$product['id']?>">
                        <div class="p-3 mx-1 mb-4 border bg-light">
                            <img src="<?=base_url()?>assets/img/<?=$product['url']?>" class="img-thumbnail center" alt="<?=base_url()?>assets/img/image.png">
                            <p class="fs-3 fw-bold mb-0"><?=$product['name']?></p>
                            <p class="fs-5 mb-0">$<?=$product['price']?></p>
                        </div>
                    </a>
                </div>
<?php       }
?>          </div>
            <a class="right fs-4 btn btn-primary" href="<?=base_url()?>catalogs/products">Show more</a>