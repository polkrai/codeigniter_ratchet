<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Queuedata extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->methods['users_get']['limit'] = 500;
    }

    public function queues_get()
    {
        // Users from a data store e.g. database
        $date_serv = (@$_REQUEST['date_serv'])?$_REQUEST['date_serv']:date ('Y-m-d');

        $department_id = (@$_REQUEST['department_id'])?$_REQUEST['department_id']:35;

        $sql = "SELECT queue_id AS id, point_id, queue_number, point_name, mark_pending, is_completed FROM queue_view WHERE date_serv = '{$date_serv}'";

        $sql.= (@$_REQUEST['point_id'])?" AND point_id = '{$_REQUEST['point_id']}'":NULL;

        $sql.= " AND mark_pending = 'N' AND (is_completed = 'N' OR is_completed = 'Y')";

        $sql.= " AND department_id = '{$department_id}'";

        $sql.= " ORDER BY point_id, queue_id ASC LIMIT 5";

        $query = $this->db->query($sql);

        $users = $query->result_array();

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL) {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users) {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else {
                // Set the response and exit
                $this->response($users, REST_Controller::HTTP_OK);
                //$this->response(['status' => FALSE, 'message' => 'No users were found'], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int)$id;

        // Validate the id.
        if ($id <= 0) {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = NULL;

        if (!empty($users)) {

            foreach ($users as $key => $value) {

                if (isset($value['id']) && $value['id'] === $id) {

                    $user = $value;
                }
            }
        }

        if (!empty($user)) {

            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else {

            $this->set_response(['status' => FALSE, 'message' => 'User could not be found' ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
}
