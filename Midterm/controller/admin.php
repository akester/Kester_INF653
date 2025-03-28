<?php
function home_action($error = '') {
    $sort = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    $order = filter_input(INPUT_GET, 'order', FILTER_UNSAFE_RAW);
    $make = filter_input(INPUT_GET, 'make', FILTER_UNSAFE_RAW);
    $type = filter_input(INPUT_GET, 'type', FILTER_UNSAFE_RAW);
    $class = filter_input(INPUT_GET, 'class', FILTER_UNSAFE_RAW);

    $vehicles = get_vehicles($sort, $order, $make, $type, $class);
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();

    include('../view/header.php');
    include('../view/admin_home.php');
    include('../view/footer.php');
}

function delete_vehicle_action() {
    $id = filter_input(INPUT_GET, 'id', FILTER_UNSAFE_RAW);

    if (!$id) {
        $error = 'Vehicle ID not provided.';
        return home_action($error);
    }

    $vehicle = get_vehicle($id);
    if (!$vehicle) {
        $error = 'Vehicle not found.';
        return home_action($error);
    }

    delete_vehicle($id);
    header("Location: /admin/?action=home");
}