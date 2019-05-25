<?php defined('BASEPATH') OR exit('No direct script access allowed');

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;

class Queue extends CI_Controller {

    public function index () {

        $this->load->view ('queue_view');
    }

    public function elephantio_client () {

        $client = new Client(new Version1X('http://localhost:1337'));

        $client->initialize();

        $client->emit('broadcast', ['queuetype' => (@$_REQUEST['queuetype'])?$_REQUEST['queuetype']:'requestqueue', 'point_id' => (@$_REQUEST['point_id'])?$_REQUEST['point_id']:5, 'queue_id' => (@$_REQUEST['queue_id'])?$_REQUEST['queue_id']:'10221']);

        $read = $client->readJson();

        $client->close();

        //$read = substr($read, 2);

        print_r($read);
    }

    public function elephantio_client_screening () {

        $client = new Client(new Version1X('http://localhost:1337'));

        $client->initialize();

        $client->emit('screening', ['queuetype' => (@$_REQUEST['queuetype'])?$_REQUEST['queuetype']:'requestqueue', 'point_id' => (@$_REQUEST['point_id'])?$_REQUEST['point_id']:5, 'queue_id' => (@$_REQUEST['queue_id'])?$_REQUEST['queue_id']:'10221']);

        $read = $client->read();

        $client->close();

        $read = substr($read, 2);

        print_r($read);
    }


}
