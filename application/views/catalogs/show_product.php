			<div class="row justify-content-center">
				<div class="col-4">
            	    <!------------------------Product Images--------------------------->
					<div class="slider">
						<div class="fotorama" data-width="100%" data-autoplay="2000" data-nav="thumbs">
<?php					foreach($product_data['images'] as $image)
						{
?>							<img src="<?=base_url()?>assets/img/<?=$image['url']?>" class="img-fluid" alt="image">							
<?php					}
?>						</div>
					</div>
				</div>
				<div class="col-1"></div>
            	<!------------------------Product Info--------------------------->
				<div class="col-6">
					<div class="row gy-2">
						<h1 class="display-5 fw-bold"><?=$product_data['info']['name']?></h1>
						<p class="fs-5 mb-0">Sold: <?=$product_data['info']['sold']?>pc(s)</p>
						<p class="fs-5 mb-0">Stock: <?=$product_data['info']['stock']?>pc(s)</p>
						<p class="fs-5 mb-0">Price: $<?=$product_data['info']['price']?></p>
						<p class="mb-2"><?=$product_data['info']['description']?></p>
						<form action ="<?=$product_data['info']['id']?>" method="post" class="row align-content-end">
							<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
							<label class="form-check-label" for="quantity">Quantity:</label>
							<div class="row justify-content-start">
								<div class="col-2">
									<input type="number" class="form-control" name ="quantity" min='1' value='1'/>
								</div>
								<div class="col-1 align-self-center">
								<p class="mb-0">($<?=($product_data['info']['price'])?>)</p>
								</div>
							</div>
							<input type="button" class="btn btn-success w-100 mt-2 fs-4" value="Add to cart">
						</form>
					</div>
				</div>
			</div>
			<h2 class="display-6 fw-bold mt-5">Similar Products</h2>
			<div class="row mt-4">
<?php		foreach($product_data['similar'] as $similar)
			{				
?>				<div class="col col-2_4">
					<a class="text-dark text-decoration-none" href="<?=base_url()?>catalogs/show/<?=$similar['id']?>">
						<div class="p-3 mx-1 mb-4 border bg-light">
							<img src="<?=base_url()?>assets/img/<?=$similar['url']?>" class="img-thumbnail center" alt="image">
							<p class="fs-5 fw-bold mb-0"><?=$similar['name']?></p>
							<p class="fs-6 mb-0">$<?=$similar['price']?></p>
						</div>
					</a>
				</div>
<?php		}
?>			</div>
