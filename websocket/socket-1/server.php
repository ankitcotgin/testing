<?php 

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require 'vendor/autoload.php';
require 'application/libraries/WebSocket.php';

// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// ini_set('error_log', 'error.log');

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new WebSocket()
        )
    ),
    8080
);

$server->run();
