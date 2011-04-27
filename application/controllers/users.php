<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }

    function login() {
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->Users_model->cekLogin($email, $password);

            if (!empty($user)) {
                $sessionData['email'] = $user['email'];
                $sessionData['full_name'] = $user['full_name'];
                $sessionData['level'] = $user['status'];
                $sessionData['is_login'] = TRUE;

                $this->session->set_userdata($sessionData);
                redirect('users/dashboard');
            }

            $this->session->set_flashdata('message', 'Login Gagal!, email dan password tidak sesuai');
            redirect('users/login');
        }

        $data['content'] = 'users/login';
        $this->load->view('template', $data);
    }

    function dashboard() {
        echo $this->session->userdata('full_name');
    }

    function logout() {

        $this->session->sess_destroy();
        redirect('users/login');
    }

}

?>
