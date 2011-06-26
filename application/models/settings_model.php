<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Settings_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create() {
        $data = array(
            'key' => $this->input->post('key'),
            'value' => $this->input->post('value'),
            'description' => $this->input->post('description')
        );

        $this->db->insert('settings', $data);
    }

    function update($id) {
        $data = array(
            'key' => $this->input->post('key'),
            'value' => $this->input->post('value'),
            'description' => $this->input->post('description')
        );

        $this->db->where('id', $id);
        $this->db->update('settings', $data);
    }

    function getSettingsByKey($key) {
        $this->db->select('*');
        $this->db->where('key', $key);
        $query = $this->db->get('settings', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getSettings() {
        $this->db->select('*');
        $query = $this->db->get('settings');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('settings');
    }

}

?>
