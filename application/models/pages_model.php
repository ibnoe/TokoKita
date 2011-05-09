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

}

?>
