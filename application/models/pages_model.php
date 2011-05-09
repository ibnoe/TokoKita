<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages_model extends CI_Model {

    var $status = array(
        0 => 'draft',
        1 => 'published'
    );

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'title' => $this->input->post('title'),
            'permalink' => url_title(strtolower($this->input->post('title'))),
            'body' => $this->input->post('body'),
            'status' => $this->input->post('status')
        );

        $this->db->insert('pages', $data);
    }

    function getPages() {
        $this->db->select('*');
        $query = $this->db->get('pages');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function getPagesById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('pages', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getPagesByPermalink($permalink) {
        $this->db->select('*');
        $this->db->where('permalink', $permalink);
        $query = $this->db->get('pages', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function update($id) {
        $data = array(
            'title' => $this->input->post('title'),
            'permalink' => url_title(strtolower($this->input->post('title'))),
            'body' => $this->input->post('body'),
            'status' => $this->input->post('status')
        );
        $this->db->where('id', $id);
        $this->db->update('pages', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('pages');
    }

}

?>
