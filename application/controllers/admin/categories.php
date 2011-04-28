<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Categories extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Categories_model');
        $this->users_library->cekAdminLogin();
    }

    function index() {
        $data['categories'] = $this->Categories_model->getCategories();
        $data['content'] = 'admin/categories/index';
        $this->load->view('admin/admin_template', $data);
    }

    function add() {
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Categories_model->create();
            $this->session->set_flashdata('message', 'Berhasil menambah kategori');
            redirect('admin/categories');
        }
        $data['content'] = 'admin/categories/add';
        $this->load->view('admin/admin_template', $data);
    }

    function edit($id= null) {
        if ($id == null) {
            $id = $this->input->post('id');
        }

        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Categories_model->update($id);
            $this->session->set_flashdata('message', 'Kategori berhasil di edit');
            redirect('admin/categories');
        }
        $data['category'] = $this->Categories_model->getCategoryById($id);
        $data['content'] = 'admin/categories/edit';
        $this->load->view('admin/admin_template', $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('message', 'Kategori tidak ada');
            redirect('admin/categories');
        } else {
            $this->Categories_model->delete($id);
            $this->session->set_flashdata('message', 'Kategori berhasil dihapus');
            redirect('admin/categories');
        }
    }

}

?>
