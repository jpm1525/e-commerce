<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboards extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Dashboard");
            if($this->session->userdata('user_level') != 9)
            {
                redirect(base_url());
            }
        }
        public function orders()
        {
            $header_data = array('page_title' => "Orders");
            $this->load->view('partials/header_admin', $header_data);
            $this->Dashboard->generate_pagination(1);
            $this->load->view('dashboards/orders_index');
            $this->load->view('partials/footer');
        }
        public function index_html()
        {
            $view_data = $this->Dashboard->generate_searches_view_data();
            $this->session->keep_flashdata('searches');
            $this->Dashboard->generate_pagination($this->session->flashdata('page_num'));
            $this->load->view('dashboards/orders', $view_data);
        }
        public function update_rows()
        {
            $this->Dashboard->fetch_rows_with_conditions($this->input->post(NULL, TRUE));
            $this->index_html();
        }
        public function page($page_num)
        {
            $this->Dashboard->generate_pagination($page_num);
            $this->index_html();
        }
        public function order_view($order_id)
        {
            $header_data = array('page_title' => "Order #$order_id");
            $order_data = $this->Dashboard->fetch_order_data_by_id($order_id);
            $this->load->view('partials/header_admin', $header_data);
            $this->load->view('dashboards/order_view', $order_data);
            $this->load->view('partials/footer');
        }
        public function status_change($order_id)
        {
            $this->Dashboard->change_order_status_by_id($order_id,$this->input->post());
        }
        public function products()
        {
            $header_data = array('page_title' => "Products");
            $this->load->view('partials/header_admin', $header_data);
            $this->load->view('dashboards/products');
            $this->load->view('partials/footer');
        }
    }
?>