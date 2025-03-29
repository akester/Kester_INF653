<?php

// Public homepage
function home_action() {
    $sort = filter_input(INPUT_GET, 'sort', FILTER_UNSAFE_RAW);
    $order = filter_input(INPUT_GET, 'order', FILTER_UNSAFE_RAW);
    $make = filter_input(INPUT_GET, 'make', FILTER_UNSAFE_RAW);
    $type = filter_input(INPUT_GET, 'type', FILTER_UNSAFE_RAW);
    $class = filter_input(INPUT_GET, 'class', FILTER_UNSAFE_RAW);

    $vehicles = get_vehicles($sort, $order, $make, $type, $class);
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();

    include('view/header.php');
    include('view/home.php');
    include('view/footer.php');
}