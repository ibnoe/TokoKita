<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Categories_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'permalink' => url_title(strtolower($this->input->post('name')))
        );

        $this->db->insert('categories', $data);
    }

    function getCategories() {
        $this->db->select('*');
        $query = $this->db->get('categories');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getCategoryById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('categories', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getCategoryByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get('categories', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'permalink' => url_title(strtolower($this->input->post('name')))
        );

        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }

}

?>
