<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends CI_Controller {

    var $real = './public/products/real/';
    var $medium = "./public/products/medium/";
    var $thumb = "./public/products/thumb/";

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
        $data['thumb'] = $this->thumb;
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
            if ($_FILES['image']['error'] != 4) {
                $config['upload_path'] = $this->real;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);


                if ($this->upload->do_upload("image")) {
                    $data = $this->upload->data();
                    $real = $data['orig_name'];
                    $medium = $data['raw_name'] . '_medium' . $data['file_ext'];
                    $thumb = $data['raw_name'] . '_thumb' . $data['file_ext'];

                    $this->Products_model->createImage($real, $medium, $thumb);

                    $this->__resizeImage($data);
                }
            } else {
                $this->Products_model->create();
            }
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
            if ($_FILES['image']['error'] != 4) {
                $config['upload_path'] = $this->real;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);


                if ($this->upload->do_upload("image")) {
                    $data = $this->upload->data();
                    $real = $data['orig_name'];
                    $medium = $data['raw_name'] . '_medium' . $data['file_ext'];
                    $thumb = $data['raw_name'] . '_thumb' . $data['file_ext'];

                    $this->Products_model->updateImage($id, $real, $medium, $thumb);

                    $this->__resizeImage($data);
                }
            } else {
                $this->Products_model->update($id);
            }
            $this->session->set_flashdata('message', 'Berhasil merubah data produk');
            redirect('admin/products/index');
        }
        $data['product'] = $this->Products_model->getProductsById($id);
        $data['status'] = $this->Products_model->status;
        $data['categories'] = $this->Categories_model->getDropDown();
        $data['content'] = 'admin/products/edit';
        $this->load->view('admin/admin_template', $data);
    }

    function delete($id = null) {
        if ($id == null) {
            $this->session->set_flashdata('message', 'ID produk tidak valid');
            redirect('admin/products/index');
        } else {
            $this->Products_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil menghapus produk');
            redirect('admin/products/index');
        }
    }

    function __resizeImage($data) {
        /* PATH */
        $source = $this->real . $data['file_name'];
        $destination_thumb = $this->thumb;
        $destination_medium = $this->medium;


// Permission Configuration
        chmod($source, 0777);

        /* Resizing Processing */
// Configuration Of Image Manipulation :: Static
        $this->load->library('image_lib');
        $img['image_library'] = 'GD2';
        $img['create_thumb'] = TRUE;
        $img['maintain_ratio'] = TRUE;

/// Limit Width Resize
        $limit_medium = 250;
        $limit_thumb = 100;
        $limit_large = 600;

// Size Image Limit was using (LIMIT TOP)
        $limit_use = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'];

// Percentase Resize
        if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
//$percent_large  = $limit_large/$limit_use ;

            $percent_medium = $limit_medium / $limit_use;

            $percent_thumb = $limit_thumb / $limit_use;
        }

//// Making THUMBNAIL ///////
        $img['width'] = $limit_use > $limit_thumb ? $data['image_width'] * $percent_thumb : $data['image_width'];
        $img['height'] = $limit_use > $limit_thumb ? $data['image_height'] * $percent_thumb : $data['image_height'];

// Configuration Of Image Manipulation :: Dynamic
        $img['thumb_marker'] = '_thumb';
        $img['quality'] = '100%';
        $img['source_image'] = $source;
        $img['new_image'] = $destination_thumb;

// Do Resizing
        $this->image_lib->initialize($img);
        $this->image_lib->resize();
        $this->image_lib->clear();

////// Making MEDIUM /////////////
        $img['width'] = $limit_use > $limit_medium ? $data['image_width'] * $percent_medium : $data['image_width'];
        $img['height'] = $limit_use > $limit_medium ? $data['image_height'] * $percent_medium : $data['image_height'];

// Configuration Of Image Manipulation :: Dynamic
        $img['thumb_marker'] = '_medium';
        $img['quality'] = '100%';
        $img['source_image'] = $source;
        $img['new_image'] = $destination_medium;

// Do Resizing
        $this->image_lib->initialize($img);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

}

?>
