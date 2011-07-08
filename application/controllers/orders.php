<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Orders extends CI_Controller {

    var $template = 'template';

    function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Users_model');
        $this->load->model('Orders_model');
        $this->load->model('Order_details_model');
    }

    function checkout() {
        if ($this->users_library->isLogin() == FALSE) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu!');
            redirect('users/login');
        } else {

            $data['content'] = 'orders/checkout';
            $this->load->view($this->template, $data);
        }
    }

    function proceed() {
        if ($this->users_library->isLogin() == FALSE) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu!');
            redirect('users/login');
        } else {
            $orderCode = $this->front_library->generateRandomCode(8);
            $user = $this->Users_model->getUserById($this->session->userdata('id'));

            $order['order_code'] = $orderCode;
            $order['full_name'] = $user['full_name'];
            $order['email'] = $user['email'];
            $order['address'] = $user['address'];
            $order['zip'] = $user['zip'];
            $order['total_order'] = $this->cart->total();
            $order['user_id'] = $user['id'];

            $this->Orders_model->create($order);

            $orderId = $this->db->insert_id();

            $carts = $this->cart->contents();

            foreach ($carts as $item) {
                $detail['sku'] = $item['id'];
                $detail['name'] = $item['name'];
                $detail['price'] = $item['price'];
                $detail['qty'] = $item['qty'];
                $detail['discount_percent'] = $item['options']['discount_percent'];
                $detail['order_id'] = $orderId;

                $this->Order_details_model->create($detail);
            }

            $this->cart->destroy();
            $this->session->set_flashdata('message', 'Pemesanan berhasil, tunggu informasi email dari kami dalam waktu maks. 2x24 jam');
            redirect('orders/complete');
        }
    }

    function complete() {
        $data['content'] = 'orders/complete';
        $this->load->view($this->template, $data);
    }

}

?>
