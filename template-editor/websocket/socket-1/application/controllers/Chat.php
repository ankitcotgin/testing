<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

class Chat extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('WebSocket');
        $this->load->model('Chat_model');
    }

    public function index() {
        $this->load->view('chat/index');
    }

    public function sendMessage() {
        $senderId = '1';
        $receiverId = $this->input->post('receiverId');
        $message = $this->input->post('message');

        $this->Chat_model->saveMessage($senderId, $receiverId, $message);

        // You can broadcast the message to other users using WebSocket here

        echo json_encode(['status' => 'success']);
    }
}

