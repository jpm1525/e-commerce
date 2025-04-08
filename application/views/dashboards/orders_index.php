			<script>
                    $(document).ready(function()
                    {
                        // First load of the searches data
                        $.get('<?=base_url()?>/dashboards/index_html', function(res) 
                        {
                            $('#searches').html(res);
                        });
						//Update conditions on input change without page update
						$(document).on('input','.order_status', function()
                        {
                            $.post($(this).attr('action'), $(this).serialize(), function() 
                            {
                            });
                            return false;
                        });
                        //Update conditions on input change
                        $(document).on('input submit','.pagination,.conditions', function()
                        {
                            $.post($(this).attr('action'), $(this).serialize(), function(data) 
                            {
                                $('#searches').html(data);
                            });
                            return false;
                        });
                    });
            </script>			
			<form class="conditions" action="<?=base_url()?>/dashboards/update_rows" method="post">
				<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
				<div class="mb-3 row">
        		    <!-----Search------------------------------------>
					<div class="col-6 col-md-3">
						<input type="text" class="form-control" name="search" placeholder="Search" aria-label="search" aria-describedby="basic-addon1" />
					</div>
					<div class="col-0 col-md-7 space"></div>
					<div class="col-6 col-md-2">
        		    <!-----Status Sort----------------------------------->
						<select class="form-select right" name="status" aria-label="Default select example">
							<option selected>Show All</option>
							<option>Order in Process</option>
							<option>Shipped</option>
							<option>Cancelled</option>
						</select>
					</div>
				</div>
			</form>
        	<!-----Order List----------------------------------->
			<div id="searches">
            </div>
			