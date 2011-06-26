<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->users_library->cekAdminLogin();
        $this->load->model('Products_model');
        $this->load->model('Categories_model');
    }

    function index() {
        $data['products'] = $this->Products_model->getProducts();
        $data['status'] = $this->Products_model->status;
        $data['content'] = 'admin/products/index';
        $this->load->view('admin/admin_template', $data);
    }

    function add() {
        $this->form_validation->set_rules('sku', 'sku', 'required');
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('price', 'harga', 'required');
        $this->form_validation->set_rules('description', 'deskripsi', '');
        $this->form_validation->set_rules('stock', 'stok', 'required|numeric');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('category_id', 'kategory', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Products_model->create();
            $this->session->set_flashdata('message', 'Berhasil menambah produk');
            redirect('admin/products/index');
        }

        $data['title'] = 'Tambah Produk';
        $data['status'] = $this->Products_model->status;
        $data['categories'] = $this->Categories_model->getDropDown();
        $data['content'] = 'admin/products/add';
        $this->load->view('admin/admin_template', $data);
    }

    function edit($id = null) {

        if ($id == null) {
            $id = $this->input->post('id');
        }
        $this->form_validation->set_rules('sku', 'sku', 'required');
        $this->form_validation->set_rules('name', 'nama', 'required');
        $this->form_validation->set_rules('price', 'harga', 'required');
        $this->form_validation->set_rules('description', 'deskripsi', '');
        $this->form_validation->set_rules('stock', 'stok', 'required|numeric');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('category_id', 'kategory', 'required');
        $this->form_validation->set_error_delimiters('', '<br/>');

        if ($this->form_validation->run() == TRUE) {
            $this->Products_model->update($id);
            $this->session->set_flashdata('message', 'Berhasil menambah produk');
            redirect('admin/products/index');
        }
        $data['product'] = $this->Products_model->getProductsById($id);
        $data['status'] = $this->Products_model->status;
        $data['categories'] = $this->Categories_model->getDropDown();
        $data['content'] = 'admin/products/edit';
        $this->load->view('admin/admin_template', $data);
    }

    function delete($id = null) {

    }

}

?>
