<?php
    class Catalog extends CI_Model 
    {
        //get all rows from table
        function fetch_products_home()
        {
            $rows = $this->db->query("SELECT products.id, products.name, products.price, images.url 
                FROM products LEFT JOIN images ON products.id = images.id WHERE images.sequence = 1 
                ORDER BY products.sold DESC LIMIT 8")->result_array();
            return $rows;
        }
        function fetch_product_info($product_id)
        {
            $rows ['info'] = $this->db->query("SELECT * FROM products WHERE id = ?", $product_id)->row_array();
            //retrieve images
            $rows ['images'] = $this->db->query("SELECT * FROM images WHERE product_id = ?", $product_id)->result_array();
            //retrieve similar products
            $rows ['similar'] = $this->db->query("SELECT products.id, products.name, products.price, images.url 
                FROM products LEFT JOIN images ON products.id = images.id WHERE products.product_category_id = ? AND images.sequence = 1 
                AND products.id != ? ORDER BY products.sold DESC LIMIT 5" , array($rows ['info'] ['product_category_id'], $product_id))->result_array();
            return $rows;
        }
        function fetch_products($category,$sort,$search)
        {
            $query = "SELECT products.id, products.name, products.price, images.url 
                FROM products LEFT JOIN images ON products.id = images.id WHERE images.sequence = 1";
            $values = array();
            if($category == 0)
            {     
            }
            else
            {
                $query = $query . " AND products.product_category_id = ?";
                $values [] = $category;
            }
            $query = $query = $query . " AND products.name LIKE ?";
            $search = "%" . $search . "%";
            $values [] = $search;
            if($sort == 1)
            {
                $query = $query . " ORDER BY products.sold DESC";
            }
            else if($sort == 2)
            {
                $query = $query . " ORDER BY products.price ASC";
            }
            else if($sort == 3)
            {
                $query = $query . " ORDER BY products.price DESC";
            }
            $rows = $this->db->query($query,$values)->result_array();
            return $rows;
        }
        function generate_pagination($page_num,$products)
        {
            $row_count = 15;
            $max_pages = ceil(count($products) / $row_count);
            if($page_num>$max_pages)
            {
                $page_num = 1;
            }
            $row_start = $row_count * ($page_num - 1);
            $row_end = ($row_count * $page_num) - 1;
            if($row_end > count($products))
            {
                $row_end = count($products)-1;
            }
            if($row_end < 0)
            {
                $row_end = 0;
            }
            if($row_start < 0)
            {
                $row_start = 0;
            }
            $page_data = array('page_num' => $page_num,
            'max_pages' => $max_pages,
            'row_start' => $row_start,
            'row_end' => $row_end);
            return $page_data;
        }
        function fetch_categories()
        {
            return $this->db->query("SELECT * FROM product_categories")->result_array();
        }
    }
?>