<?php
    class Product extends CI_Model 
    {
        //get all rows from table
        function fetch_all()
        {
            $rows = $this->db->query("SELECT products.*, images.url FROM products LEFT JOIN images ON products.id = images.id WHERE images.sequence = 1 ORDER BY products.id ASC")->result_array();
            $this->session->set_flashdata('products',$rows);
            return $rows;
        }
        //get rows from table that satisfies the parameters
        function fetch_rows_with_conditions()
        {
            $search = "%" . $this->input->post('search') ."%";
            $query = "SELECT products.*, images.url FROM products LEFT JOIN images ON products.id = images.id 
                WHERE images.sequence = 1 AND (products.id LIKE ? OR products.name LIKE ? OR products.description 
                LIKE ? OR products.stock LIKE ? OR products.sold LIKE ? OR products.price LIKE ?) 
                ORDER BY products.id ASC";
            $values = array($search, $search, $search, $search, $search, $search);
            $rows = $this->db->query($query, $values)->result_array();
            $this->session->set_flashdata('products',$rows);
        }
        // generate table view data for use in view file
        function generate_searches_view_data()
        {
            if(is_null($this->session->flashdata('products')))
            {
                $view_data = array('products' => $this->fetch_all());
            }
            else
            {
                $searches = $this->session->flashdata('products');
                $view_data = array('products' => $searches);
            }
            return $view_data;
        }
        //generate data for pagination
        function generate_pagination($page_num)
        {
            $searches = $this->session->flashdata('products');
            if(is_null($searches))
            {
                $searches=$this->generate_searches_view_data();
            }
            $row_count = 10;
            $max_pages = ceil(count($searches) / $row_count);
            $row_start = $row_count * ($page_num - 1);
            $row_end = ($row_count * $page_num) - 1;
            if($row_end > count($searches))
            {
                $row_end = count($searches)-1;
            }
            if($row_end < 0)
            {
                $row_end = 0;
            }
            if($row_start < 0)
            {
                $row_start = 0;
            }
            $page_data = array('max_pages' => $max_pages,
            'row_start' => $row_start,
            'row_end' => $row_end);
            if($page_num>$max_pages)
            {
                $page_num = 1;
            }
            $this->session->set_flashdata('products_page_data',$page_data);
            $this->session->set_flashdata('products_page_num', $page_num);
        }
        function fetch_order_data_by_id($order_id)
        {
            $order_data ['order'] = $this->db->query("SELECT * FROM orders WHERE orders.id = ?", $order_id)->row_array();
            $order_data ['billing_details'] = $this->db->query("SELECT billing_details.* FROM orders LEFT JOIN billing_details ON orders.billing_detail_id = billing_details.id  WHERE orders.id = ?", $order_id)->row_array();
            $order_data ['shipping_details'] = $this->db->query("SELECT shipping_details.* FROM orders LEFT JOIN shipping_details ON orders.shipping_detail_id = shipping_details.id  WHERE orders.id = ?", $order_id)->row_array();
            $order_data ['order_details'] = $this->db->query("SELECT orders_details.* FROM orders LEFT JOIN orders_details ON orders.id = orders_details.order_id  WHERE orders_details.order_id = ?", $order_id)->result_array();
            return $order_data;
        }
        function change_order_status_by_id($order_id)
        {
            $query = "UPDATE orders SET status = ? WHERE id = ?";
            $values = array($this->input->post('order_status'), $order_id);
            return $this->db->query($query, $values);
        }
    }
?>