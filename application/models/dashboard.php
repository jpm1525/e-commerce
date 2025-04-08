<?php
    class Dashboard extends CI_Model 
    {
        //get all rows from table
        function fetch_all()
        {
            $rows = $this->db->query("SELECT orders.id, billing_details.first_name, billing_details.last_name, DATE_FORMAT(orders.created_at, '%m/%d/%Y') as date_ordered, billing_details.address_one, billing_details.address_two, orders.grand_total, orders.status
                                    FROM orders LEFT JOIN billing_details ON orders.billing_detail_id = billing_details.id ORDER BY orders.id DESC")->result_array();
            $this->session->set_flashdata('searches',$rows);
            return $rows;
        }
        //get rows from table that satisfies the parameters
        function fetch_rows_with_conditions()
        {
            if($this->input->post('status') == 'Show All')
            {
                $status = "%%";
            }
            else
            {
                $status = $this->input->post('status');
            }
            $search = "%" . $this->input->post('search') ."%";
            $query =  "SELECT orders.id, billing_details.first_name, billing_details.last_name, DATE_FORMAT(orders.created_at, '%m/%d/%Y') as date_ordered, billing_details.address_one, billing_details.address_two, orders.grand_total, orders.status
                FROM orders LEFT JOIN billing_details ON orders.billing_detail_id = billing_details.id 
                WHERE (orders.id LIKE ? OR billing_details.first_name LIKE ? OR billing_details.last_name LIKE ? OR DATE_FORMAT(orders.created_at, '%m/%d/%Y') LIKE ? OR billing_details.address_one LIKE ? OR billing_details.address_two LIKE ? OR orders.grand_total LIKE ?) AND orders.status LIKE ?
                ORDER BY orders.id DESC";
            $values = array($search, $search, $search, $search, $search, $search, $search, $status);
            $rows = $this->db->query($query, $values)->result_array();
            $this->session->set_flashdata('searches',$rows);
        }
        // generate table view data for use in view file
        function generate_searches_view_data()
        {
            if(is_null($this->session->flashdata('searches')))
            {
                $view_data = array('searches' => $this->fetch_all());
            }
            else
            {
                $searches = $this->session->flashdata('searches');
                $view_data = array('searches' => $searches);
            }
            return $view_data;
        }
        //generate data for pagination
        function generate_pagination($page_num)
        {
            $searches = $this->session->flashdata('searches');
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
            $this->session->set_flashdata('page_data',$page_data);
            $this->session->set_flashdata('page_num', $page_num);
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