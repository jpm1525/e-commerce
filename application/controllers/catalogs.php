<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Catalogs extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Catalog");
        }
        public function index()
        {
            $header_data = array('page_title' => "Home");
            $this->load->view('partials/header', $header_data);
            $products = array('products' => $this->Catalog->fetch_products_home());
            $this->load->view('catalogs/index',$products);
            $this->load->view('partials/footer');
        }
        public function products($page_num=1,$category=0,$sort=1,$search='')
        {
            $header_data = array('page_title' => "Products");
            $this->load->view('partials/header', $header_data);
            $products = $this->Catalog->fetch_products($category,$sort,$search);
            $view_data = array('page_num' => $page_num,
                'category' => $category,
                'sort' => $sort,
                'search' => $search,
                'products' => $products,
                'page_data' => $this->Catalog->generate_pagination($page_num,$products),
                'categories' => $this->Catalog->fetch_categories());
            $this->load->view('catalogs/catalogs',$view_data);
            $this->load->view('partials/footer');
        }
        public function product_conditions_process($page_num=1,$category=0,$sort=1,$search='')
        {
            if(!empty($this->input->post('page')))
            {
                $page_num = $this->input->post('page');
            }
            if(!empty($this->input->post('search')))
            {
                $search = $this->input->post('search');
            }
            if(!empty($this->input->post('sort')))
            {
                $sort = $this->input->post('sort');
            }
            redirect(base_url() . "catalogs/products/$page_num/$category/$sort/$search");
        }
        public function show($product_id)
        {
            $header_data = array('page_title' => "Product $product_id");
            $this->load->view('partials/header', $header_data);
            $product_data = array('product_data' => $this->Catalog->fetch_product_info($product_id));
            $this->load->view('catalogs/show_product',$product_data);
            $this->load->view('partials/footer');
        }
    }
?>