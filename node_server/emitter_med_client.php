<?php
/**
 * This file is part of the Elephant.io package
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 *
 * @copyright Wisembly
 * @license   http://www.opensource.org/licenses/MIT-License MIT License
 */

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;

require __DIR__ . '/../vendor/autoload.php';

$client = new Client(new Version1X('http://localhost:1337'));

$client->initialize();

$client->emit('broadcast', ['queuetype' => (@$_REQUEST['queuetype'])?$_REQUEST['queuetype']:'reuest', 'point_id' => (@$_REQUEST['point_id'])?$_REQUEST['point_id']:9, 'queue_id' => (@$_REQUEST['queue_id'])?$_REQUEST['queue_id']:'9770']);

$read = $client->read();

$client->close();

print_r($read);
