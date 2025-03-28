<?php
function home_action($error = '') {
    $sort = filter_input(INPUT_GET, 'sort', FILTER_UNSAFE_RAW);
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

function add_vehicle_form($error = '') {
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();

    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_UNSAFE_RAW);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_UNSAFE_RAW);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_UNSAFE_RAW);
    $model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
    $price = filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW);
    $year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);

    include('../view/header.php');
    include('../view/add_vehicle.php');
    include('../view/footer.php');
}

function add_vehicle_action() {
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_UNSAFE_RAW);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_UNSAFE_RAW);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_UNSAFE_RAW);
    $model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
    $price = filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW);
    $year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);

    if (!$make_id) {
        $error = 'Make not provided';
        return add_vehicle_form($error);
    }
    if (!$type_id) {
        $error = 'Type not provided';
        return add_vehicle_form($error);
    }
    if (!$class_id) {
        $error = 'Class not provided';
        return add_vehicle_form($error);
    }
    if (!$year) {
        $error = 'Year not provided';
        return add_vehicle_form($error);
    }
    if (!$model) {
        $error = 'Model not provided';
        return add_vehicle_form($error);
    }
    if (!$price) {
        $error = 'Price not provided';
        return add_vehicle_form($error);
    }

    add_vehicle([
        'make_id' => $make_id,
        'type_id' => $type_id,
        'class_id' => $class_id,
        'year' => $year,
        'model' => $model,
        'price' => $price,
    ]);

    header("Location: /admin/?action=home");
}