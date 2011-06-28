<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
    }

    function home() {
        
        $data['products'] = $this->Products_model->getProducts();
        print_r($data);exit;
        $data['content'] = 'pages/home';
        $this->load->view('template', $data);
    }

}

?>
