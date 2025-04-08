<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Carts extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            //$this->load->model("Cart");
        }
        public function index()
        {
            $header_data = array('page_title' => "Cart");
            $this->load->view('partials/header', $header_data);
            $this->load->view('carts/cart');
            $this->load->view('partials/footer');
        }
    }
?>