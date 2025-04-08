<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$page_title?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/style/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>/Assets/style/style.css">
		<script src="<?=base_url();?>/assets/script/bootstrap.bundle.min.js"></script>
		<script src="<?=base_url();?>/assets/script/jquery-3.6.3.min.js"></script>
    </head>
    <body>
		<header class="navbar navbar-expand-lg navbar-primary bg-primary px-3 mb-4">
			<a class="navbar-brand navbar-dark" href="<?=base_url();?>dashboards">The Chosen Dashboard</a>
			<a href="<?=base_url();?>dashboards" class="link-light mx-3 text-decoration-none">Orders</a>
			<a href="<?=base_url();?>products" class="link-light mx-3 text-decoration-none">Product</a>
			<div class="text-center me-3 right">
				<a href="<?=base_url();?>/users/logout" class="text-light text-decoration-none">Logout</a>
			</div>
		</header>
		<div class="container-lg px-1">