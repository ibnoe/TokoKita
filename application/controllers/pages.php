<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Pages_model');
    }

    function home() {
        $data['content'] = 'pages/home';
        $this->load->view($this->template, $data);
    }

    function read($permalink = null) {
        if ($permalink == null) {
            $this->session->set_flashdata('message', 'Halaman tidak ditemukan');
            redirect('pages/home');
        }

        $data['page'] = $this->Pages_model->getPagesByPermalink($permalink);
        $data['content'] = 'pages/read';
        $this->load->view($this->template, $data);
    }

}

?>
