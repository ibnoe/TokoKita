<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Products_model extends CI_Model {

    var $status = array(
        0 => 'draft',
        1 => 'published'
    );

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'sku' => $this->input->post('sku'),
            'name' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'price' => $this->input->post('price'),
            'discount_percent' => $this->input->post('discount_percent'),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'is_new_product' => $this->input->post('is_new_product'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id')
        );

        $this->db->insert('products', $data);
    }

    function createImage($real, $medium, $thumb) {
        $data = array(
            'sku' => $this->input->post('sku'),
            'name' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'price' => $this->input->post('price'),
            'discount_percent' => $this->input->post('discount_percent'),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'is_new_product' => $this->input->post('is_new_product'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id'),
            'real' => $real,
            'medium' => $medium,
            'thumb' => $thumb
        );

        $this->db->insert('products', $data);
    }

    function getProducts() {
        $this->db->select('p.id, p.name,p.description, p.sku,p.thumb,p.medium,p.real, p.price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $query = $this->db->get('products p');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getProductsPublished() {
        $this->db->select('p.id, p.name,p.description,p.permalink, p.sku,p.thumb,p.medium,p.real, p.price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('status', 1);
        $query = $this->db->get('products p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getNewProducts() {
        $this->db->select('p.id, p.name,p.description,p.permalink, p.sku,p.thumb,p.medium,p.real, p.price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('status', 1);
        $this->db->where('is_new_product', 1);
        $query = $this->db->get('products p');


        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getDiscountedProducts() {
        $this->db->select('p.id, p.name,p.description,p.permalink, p.sku,p.thumb,p.medium,p.real, p.price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
        $this->db->where('status', 1);
        $this->db->where('discount_percent !=', 0);
        $query = $this->db->get('products p');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getProductsById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);

        $query = $this->db->get('products', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getProductByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get('products', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function update($id) {
        $data = array(
            'sku' => $this->input->post('sku'),
            'name' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'price' => $this->input->post('price'),
            'discount_percent' => $this->input->post('discount_percent'),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'is_new_product' => $this->input->post('is_new_product'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id')
        );

        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    function updateImage($id, $real, $medium, $thumb) {
        $data = array(
            'sku' => $this->input->post('sku'),
            'name' => $this->input->post('name'),
            'permalink' => url_title(strtolower($this->input->post('name'))),
            'price' => $this->input->post('price'),
            'discount_percent' => $this->input->post('discount_percent'),
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'is_new_product' => $this->input->post('is_new_product'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id'),
            'real' => $real,
            'medium' => $medium,
            'thumb' => $thumb
        );
        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

}

?>
