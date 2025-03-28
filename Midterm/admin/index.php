<?php

// Include controllers
require_once('../controller/classes.php');
require_once('../controller/makes.php');
require_once('../controller/vehicles.php');

// Include Models
require_once('../model/db.php');
require_once('../model/class.php');
require_once('../model/make.php');
require_once('../model/type.php');
require_once('../model/vehicle.php');

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?: filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?: 'list_assignments';

switch ($action) {
    case 'makes':
        return makes_action();
    case 'add_make_form':
        return add_make_form();
    case 'add_make':
        return add_make_action();
    case 'delete_make':
        return delete_make_action();

    case 'classes':
        return classes_action();
    case 'add_class_form':
        return add_class_form();
    case 'add_class':
        return add_class_action();
    case 'delete_class':
        return delete_class_action();
    
    case 'delete_vehicle':
        return delete_vehicle_action();
    case 'home':
    default:
        return home_action();
}
