<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
//        for
    }

    function login() {

        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Users_model->cekLogin($email, $password);
//            printData($user);exit;
            if (!empty($user)) {
                $sessionData['id'] = $user['id'];
                $sessionData['email'] = $user['email'];
                $sessionData['full_name'] = $user['full_name'];
                $sessionData['level'] = $user['level'];
                $sessionData['is_login'] = TRUE;

                $this->session->set_userdata($sessionData);

//                printData($this->session->userdata('level'));exit;
                if ($this->session->userdata('level') == 1) {
                    redirect('admin/dashboard');
                } else {
                    redirect('users/home');
                }
            }

            $this->session->set_flashdata('message', 'Login Gagal!, email dan password tidak sesuai');
            redirect('users/login');
        }

        $data['content'] = 'users/login';
        $this->load->view($this->template, $data);
    }

    function home() {
        $this->users_library->cekUserLogin();
        $data['content'] = 'users/home';
        $this->load->view($this->template, $data);
    }

    function logout() {

        $this->session->sess_destroy();
        redirect('users/login');
    }

}

?>
