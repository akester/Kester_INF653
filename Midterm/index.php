<?php

// Include controllers
require_once('controller/home.php');

// Include Models
require_once('model/db.php');
require_once('model/class.php');
require_once('model/make.php');
require_once('model/type.php');
require_once('model/vehicle.php');

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?: filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?: 'list_assignments';

switch ($action) {
    case 'home':
    default:
        return home_action();
}
