<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat extends CI_Controller  {

    protected $clients;

    public function __construct() {
        parent::__construct();
        $this->clients = new \SplObjectStorage;
    }

    public function index() {
        // Load the view for the chat
        $this->load->view('chat/index');
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // Send the message to the other clients
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // Remove the connection when closed
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        // Handle errors here
        echo "An error occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
