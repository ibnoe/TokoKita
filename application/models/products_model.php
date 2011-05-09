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
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id')
        );

        $this->db->insert('products', $data);
    }

    function getProducts() {
        $this->db->select('p.id, p.name, p.sku, p.price, p.stock, p.status, c.name as categoryName');
        $this->db->join('categories c', 'c.id = p.category_id');
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
            'description' => $this->input->post('description'),
            'stock' => $this->input->post('stock'),
            'status' => $this->input->post('status'),
            'category_id' => $this->input->post('category_id')
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
