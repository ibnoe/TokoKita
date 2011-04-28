<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->users_library->cekAdminLogin();
    }

    function index() {

        $data['content'] = 'admin/dashboard/index';
        $this->load->view('admin/admin_template', $data);
    }

}

?>
