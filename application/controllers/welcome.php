<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function cek_login($username, $password) {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));


        $query = $this->db->get('users', 1);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

}

?>