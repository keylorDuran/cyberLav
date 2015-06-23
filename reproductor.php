<?php

//include(__DIR__ . '/config.php');
require_once '/home/keylor/cyberLav/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;

$exchange = 'router';
$queue = 'msgs';
$consumer_tag = 'consumer';

$conn = new AMQPConnection('localhost', '5672', 'guest', 'guest', '/');
$ch = $conn->channel();


$ch->queue_declare($queue, false, true, false, false);

$ch->exchange_declare($exchange, 'direct', false, true, false);

$ch->queue_bind($queue, $exchange);

/**
 * @param \PhpAmqpLib\Message\AMQPMessage $msg
 */
function process_message($msg)
{
    echo "Sonando en este momento: \n";

    $file = $msg->body;
    $comm = "play ".$file;
            
    echo shell_exec($comm);


    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);

    
    if ($msg->body === 'quit') {
        $msg->delivery_info['channel']->basic_cancel($msg->delivery_info['consumer_tag']);
    }
}



$ch->basic_consume($queue, $consumer_tag, false, false, false, false, 'process_message');

/**
 * @param \PhpAmqpLib\Channel\AMQPChannel $ch
 * @param \PhpAmqpLib\Connection\AbstractConnection $conn
 */
function shutdown($ch, $conn)
{
    $ch->close();
    $conn->close();
}

register_shutdown_function('shutdown', $ch, $conn);

// Loop as long as the channel has callbacks registered
while (count($ch->callbacks)) {
    $ch->wait();
}
