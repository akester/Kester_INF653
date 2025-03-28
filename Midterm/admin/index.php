<?php

// Include controllers
require_once('../controller/admin.php');

// Include Models


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?: filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?: 'list_assignments';

switch ($action) {
    case 'home':
    default:
        return home_action();
}
