<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$page_title?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>Assets/style/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>Assets/style/style.css">
		<script src="<?=base_url()?>assets/script/bootstrap.bundle.min.js"></script>
		<script src="<?=base_url()?>assets/script/jquery-3.6.3.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    </head>
    <body>
		<header class="navbar navbar-expand-lg navbar-dark bg-dark px-3 mb-4">
			<a class="navbar-brand" href="<?=base_url()?>">The Chosen Shop</a>
			<a href="<?=base_url()?>" class="link-light mx-3 text-decoration-none">Home</a>
			<a href="<?=base_url()?>catalogs/products" class="link-light mx-3 text-decoration-none">Catalog</a>
			<div class="text-center me-3 right">
				<a href="<?=base_url()?>carts/" class="text-light text-decoration-none">Cart (5)</a>
			</div>
		</header>
		<div class="container-lg px-1">