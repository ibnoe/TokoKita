<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Order_details_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert('order_details', $data);
    }

}

?>
