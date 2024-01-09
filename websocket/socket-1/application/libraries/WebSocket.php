<?php
// application/libraries/WebSocket.php
//require FCPATH . 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocket implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    // public function onMessage(ConnectionInterface $from, $msg) {
    //     foreach ($this->clients as $client) {
    //         if ($client !== $from) {
    //             $client->send($msg);
    //         }
    //     }
    // }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_encode(['sender' => $from->resourceId, 'message' => $msg]);
        foreach ($this->clients as $client) {
            if ($client !== $from) {
                $client->send($data);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
?>
