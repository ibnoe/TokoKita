<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->users_library->cekAdminLogin();
        $this->load->model('Pages_model');
    }

    function index() {
        $data['pages'] = $this->Pages_model->getPages();
        $data['status'] = $this->Pages_model->status;
        $data['content'] = 'admin/pages/index';
        $this->load->view('admin/admin_template', $data);
    }

    function add() {
        $this->form_validation->set_rules('title', 'judul', 'required');
        $this->form_validation->set_rules('body', 'isi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Pages_model->create();
            $this->session->set_flashdata('message', 'Berhasil menambah data');
            redirect('admin/pages/index');
        }
        $data['status'] = $this->Pages_model->status;
        $data['content'] = 'admin/pages/add';
        $this->load->view('admin/admin_template', $data);
    }

    function edit($id =null) {
        if ($id == null) {
            $id = $this->input->post('id');
        }
        $this->form_validation->set_rules('title', 'judul', 'required');
        $this->form_validation->set_rules('body', 'isi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Pages_model->update($id);
            $this->session->set_flashdata('message', 'Berhasil mengedit data');
            redirect('admin/pages/index');
        }

        $data['page'] = $this->Pages_model->getPagesById($id);
        $data['status'] = $this->Pages_model->status;
        $data['content'] = 'admin/pages/edit';
        $this->load->view('admin/admin_template', $data);
    }

    function delete($id =null) {
        if ($id == null) {
            $this->session->set_flashdata('message', 'ID tidak valid');
            redirect('admin/pages/index');
        } else {
            $this->Pages_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect('admin/pages/index');
        }
    }

}

?>
