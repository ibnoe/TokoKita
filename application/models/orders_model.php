<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Orders_model extends CI_Model {

    var $status = array(
        0 => 'Pending',
        1 => 'Approved',
        2 => 'Order Sent',
        3 => 'Cancelled'
    );

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert('orders', $data);
    }
    
    function getOrders(){
        
    }
    
    

}

?>
