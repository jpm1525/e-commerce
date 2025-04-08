<!-- ------------------------------------------Delete Modal------------------------------------------------------------- -->
<form action="/products/delete_product" method="post">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
    <div class="modal fade" id="delete_product" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="1" />
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Delete" />
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ------------------------------------------Update Modal------------------------------------------------------------- -->
<form action="/products/edit_product" method="post">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
    <div class="modal fade" id="product" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!------Upadte Input field-------->
                    <input type="hidden" name="id" value="1" />
                    <div class="mb-1">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" required class="form-control" id="name" name="name" value="Product 1" />
                    </div>

                    <div class="mb-2">
                        <label for="Description" class="form-label">Description:</label>
                        <textarea class="form-control" required id="Description" name="description" rows="3">Description here</textarea>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-6">
                            <label for="stocks" class="form-label">Stock:</label>
                            <input type="number" required class="form-control" id="stocks" name="stocks" value="800" />
                        </div>

                        <div class="mb-1 col-6">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" required class="form-control" id="price" name="price" value="1" />
                        </div>
                        <!------Category Dropdown-------->
                        <div class="mb-1 col-12">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option selected>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                                <option>Category 4</option>
                            </select>
                        </div>

                        <div class="mb-1 col-12">
                            <label for="add_new_categ" class="form-label">New category:</label>
                            <input type="number" required class="form-control" id="add_new_categ" name="add_new_categ" value="" />
                        </div>
                        <!------Images-------->
                        <p class="mt-2">Images:</p>
                        <div class="row align-items-center">
                            <div class="col-4 center">
                                <div class="img_container">
                                    <img class="img-thumbnail w-50" src="../Assets/img/image.png" alt="image" />
                                </div>
                            </div>
                            <p class="col-3 center">img.png</p>
                            <button class="col-1 btn btn-danger">X</button>
                            <input class="col-1" type="checkbox" />
                            <p class="col-1 m-0 p-0">main</p>
                        </div>
                        <div class="mb-4 col-12">
                            <input type="button" value="Upload Image" class="btn btn-primary right" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="button" class="btn btn-success" value="Preview" />
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ------------------------------------------Add Modal------------------------------------------------------------- -->
<form action="/products/add_product" method="post">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
    <div class="modal fade" id="add_product" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!------Add Input field-------->
                    <input type="hidden" name="id" value="1" />
                    <div class="mb-1">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" required class="form-control" id="name" name="name" placeholder="Product Name" />
                    </div>

                    <div class="mb-2">
                        <label for="Description" class="form-label">Description:</label>
                        <textarea class="form-control" required id="Description" name="description" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="mb-1 col-6">
                            <label for="stocks" class="form-label">Stock:</label>
                            <input type="number" required class="form-control" id="stocks" name="stocks"/>
                        </div>

                        <div class="mb-1 col-6">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" required class="form-control" id="price" name="price" />
                        </div>
                        <!------Category Dropdown-------->
                        <div class="mb-1 col-12">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option selected>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                                <option>Category 4</option>
                            </select>
                        </div>

                        <div class="mb-1 col-12">
                            <label for="add_new_categ" class="form-label">New category:</label>
                            <input type="number" required class="form-control" id="add_new_categ" name="add_new_categ" value="" />
                        </div>
                        <!------Images-------->
                        <p class="mt-2">Images:</p>
                        <div class="row align-items-center">

                        </div>
                        <div class="mb-4 col-12">
                            <input type="button" value="Upload Image" class="btn btn-primary right" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="button" class="btn btn-success" value="Preview" />
                    <input type="submit" class="btn btn-primary" value="Add" />
                </div>
            </div>
        </div>
    </div>
</form>