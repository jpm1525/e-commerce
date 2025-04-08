		<script>
            $(document).ready(function()
            {
                // First load of the searches data
                $.get('<?=base_url()?>/products/index_html', function(res) 
                {
                    $('#products').html(res);
                });
                //Update conditions on input change
                $(document).on('input submit','.pagination,.conditions', function()
                {
                    $.post($(this).attr('action'), $(this).serialize(), function(data) 
                    {
                        $('#products').html(data);
                    });
                    return false;
                });
            });
        </script>			
		<div class="mb-3 row">
			<div class="col-6 col-md-3">
				<!------Search-------->
				<form class="conditions" action="<?=base_url()?>/products/update_rows" method="post">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
					<input type="text" class="form-control" name="search" placeholder="Search" aria-label="search" aria-describedby="basic-addon1" />
				</form>
			</div>
			<div class="col-0 col-md-7 space"></div>
			<!------Add product-------->
			<div class="col-6 col-md-2">
                <button class="btn btn-primary center" data-bs-toggle="modal" data-bs-target="#add_product">Add New Product</button>
			</div>
		</div>
		<!-----Product List----------------------------------->
		<div id="products">
        </div>