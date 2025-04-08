<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Products extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Product");
            if($this->session->userdata('user_level') != 9)
            {
                redirect(base_url());
            }
        }
        public function index()
        {
            $header_data = array('page_title' => "Products");
            $this->load->view('partials/header_admin', $header_data);
            $this->Product->generate_pagination(1);
            $this->load->view('products/products_index');
            $this->load->view('products/products_modals');
            $this->load->view('partials/footer');
        }
        public function index_html()
        {
            $view_data = $this->Product->generate_searches_view_data();
            $this->session->keep_flashdata('searches_products');
            $this->Product->generate_pagination($this->session->flashdata('products_page_num'));
            $this->load->view('products/products', $view_data);
        }
        public function update_rows()
        {
            $this->Product->fetch_rows_with_conditions($this->input->post(NULL, TRUE));
            $this->index_html();
        }
        public function page($page_num)
        {
            $this->Product->generate_pagination($page_num);
            $this->index_html();
        }
        public function product_view($product_id)
        {
            $header_data = array('page_title' => "Product #$product_id");
            $product_data = $this->Product->fetch_product_data_by_id($product_id);
            $this->load->view('partials/header_admin', $header_data);
            $this->load->view('products/product_view', $product_data);
            $this->load->view('partials/footer');
        }
        public function status_change($product_id)
        {
            $this->Product->change_product_status_by_id($product_id,$this->input->post());
        }
        public function products()
        {
            $header_data = array('page_title' => "Products");
            $this->load->view('partials/header_admin', $header_data);
            $this->load->view('products/products');
            $this->load->view('partials/footer');
        }
    }
?>