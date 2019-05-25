<?php

require __DIR__ . '/../dhtmlx/codebase/connector/data_connector.php';

require __DIR__ . '/../common/db_config.php';

$view = new JSONDataConnector($dbconn);

$date_serv = (@$_REQUEST['date_serv'])?$_REQUEST['date_serv']:date ('Y-m-d');

$sql = "SELECT * FROM queue_view WHERE date_serv = '{$date_serv}'";

$sql.= (@$_REQUEST['point_id'])?" AND point_id = '{$_REQUEST['point_id']}'":NULL; 

$sql.= " AND mark_pending = 'N' AND (is_completed = 'N' OR is_completed = 'Y')";

$sql.= " ORDER BY point_id, queue_id ASC";
	
//echo $sql;exit();

$view->set_limit(5);

$view->render_sql($sql, "queue_id", "point_id, queue_number, point_name, mark_pending, is_completed");