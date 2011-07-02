<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Products extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Categories_model');
        $this->load->library('pagination');
        $this->load->library('cart');
    }

    function detail($permalink) {

        $data['product'] = $this->Products_model->getProductByPermalink($permalink);
        $data['content'] = 'products/detail';
        $this->load->view($this->template, $data);
    }

    function category($permalink, $page = null) {
        $data['category'] = $this->Categories_model->getCategoryByPermalink($permalink);
        $products = $this->Products_model->getProductsByCategoryId($data['category']['id']);

        $config['uri_segment'] = 4;
        $config['total_rows'] = count($products);
        $config['per_page'] = 9;
        $config['base_url'] = base_url() . 'index.php/products/category/' . $permalink . '/';
        $this->pagination->initialize($config);
        $pages_count = ceil($config['total_rows'] / $config['per_page']);
        $page = ($page == 0) ? 1 : $page;
        $offset = $config['per_page'] * ($page - 1);

        $data['products'] = $this->Products_model->getProductsByCategoryId($data['category']['id'], $config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['content'] = 'products/category';
        $this->load->view($this->template, $data);
    }

    function add_cart($permalink) {
        $product = $this->Products_model->getProductByPermalink($permalink);
        $data = array(
            'id' => $product['sku'],
            'qty' => 1,
            'price' => $product['price'],
            'name' => $product['name'],
            'options' => array('pic' => $product['thumb'])
        );

        if ($this->cart->insert($data)) {
            $this->session->set_flashdata('message', ' Produk sudah ditambahkan di keranjang belanja');
            redirect('products/detail/' . $permalink);
        }
    }

}

?>
