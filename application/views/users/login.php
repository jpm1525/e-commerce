<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Assets/style/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../Assets/style/style.css">
		<script src="../assets/script/bootstrap.bundle.min.js"></script>
		<script src="../assets/script/jquery-3.6.3.min.js"></script>
    </head>
    <body>
		<header class="navbar navbar-expand-lg navbar-primary bg-primary px-3 mb-4">
			<a class="navbar-brand navbar-dark" href="#">The Chosen Dashboard</a>
        </header>
        <div class="container-lg px-1">
			<?php
   				$errors_login = $this->session->flashdata('errors_login');
			?>
			<div class="row mb-3">
				<div class="col-md-6 p-3 jumbotron center border bg-light ">
					<h1 class="display-6 fw-bold pb-2 ">Login</h1>  
					<form action="<?=base_url()?>users/login_process" method="post">
						<input type="hidden" class="form-label" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
						<label class="form-label " for="email">Email:</label>
						<input class="form-control" type="email" name="email" value="admin@email.com" required/>
						<label class="form-label " for="password">Password:</label>
						<input class="form-control" type="password" name="password" value="adminadmin" required/>
						<div class="text-danger">
							<?=$errors_login?>
						</div>
						<a href="../users/register">Not yet Registered? Click here</a>
						<input class="center btn btn-primary mt-2 right" id="submit" type="submit" value="Login"/>
					</form>
				</div>
			</div>
        </div>
        
    </body>
</html>

            
