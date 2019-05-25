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

//$client->emit('broadcast', ['foo' => 'bar']);
$group = (@$_REQUEST['group'])?$_REQUEST['group']:'broadcast';

$client->emit($group, ['queuetype' => 'reuest', 'point_id' => 10, 'queue_id' => rand()]);

$read = $client->read();

$client->close();

print_r($read);