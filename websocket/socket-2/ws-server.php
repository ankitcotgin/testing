<?php

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
//use App\Chat; 

require_once('vendor/autoload.php');
require 'application/controllers/Chat.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080
);

$server->run();
