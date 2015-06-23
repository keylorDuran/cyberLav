<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use Illuminate\Queue\InteractsWithQueue;*/

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Song;

use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;


class RocolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $songs = \App\Song::paginate(15);
        return view('rock.index', compact('songs'));
    }

    public function push($data){
        $exchange = 'router';
        $queue = 'msgs';

        $conn = new AMQPConnection('localhost', '5672', 'guest', 'guest', '/');
        $ch = $conn->channel();
        $ch->queue_declare($queue, false, true, false, false);

        $ch->exchange_declare($exchange, 'direct', false, true, false);

        $ch->queue_bind($queue, $exchange);

        $msg_body = $data;//implode(' ', array_slice($argv, 1));
        $msg = new AMQPMessage($msg_body, array('content_type' => 'text/plain', 'delivery_mode' => 2));
        $ch->basic_publish($msg, $exchange);

        $ch->close();
        $conn->close();

    }


    public function send($id)
    {
        $song = \App\Song::find($id);
        //\Queue::push($song->url_source);
        $this->push($song->url_source);
        return redirect('rocks');
    }

   
}
