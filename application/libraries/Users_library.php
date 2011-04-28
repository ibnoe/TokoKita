<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users_library {

    var $CI;

    function __construct() {
        $this->CI = &get_instance();
//        $this->isLogin();
    }

    function isLogin() {
        if ($this->CI->session->userdata('is_login') == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function cekUserLogin() {
        if ($this->isLogin() != TRUE) {
            $this->CI->session->set_flashdata('message', 'Anda tidak memiliki hak akses');
            redirect('users/login');
        }
    }

    function cekAdminLogin() {
        if ($this->isLogin() == TRUE) {
            if ($this->CI->session->userdata('level') != 1) {
                $this->CI->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
                redirect('users/login');
            }
        } else {
            $this->CI->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
            redirect('users/login');
        }
    }

}

?>
