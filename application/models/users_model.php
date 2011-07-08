<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function cekLogin($username, $password) {
        $this->db->select('*');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);
        $query = $this->db->get('users', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function create() {
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'zip' => $this->input->post('zip'),
            'level' => 0,
            'status' => 1
        );

        $this->db->insert('users', $data);
    }

    function update($id) {
        if ($this->input->post('password')) {
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'zip' => $this->input->post('zip')
            );
        } else {
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'zip' => $this->input->post('zip')
            );
        }
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function getUserById($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('users', 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

}

?>
