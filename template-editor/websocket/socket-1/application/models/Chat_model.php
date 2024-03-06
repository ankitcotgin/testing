<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {
    public function saveMessage($senderId, $receiverId, $message) {
        $data = array(
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message' => $message
        );

        $this->db->insert('messages', $data);
    }
}
