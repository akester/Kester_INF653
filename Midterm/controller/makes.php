<?php
// List vehicle makes
function makes_action($error = '')
{
    $makes = get_makes();

    include('../view/header.php');
    include('../view/makes.php');
    include('../view/footer.php');
}

// Form to add new make
function add_make_form($error = '')
{
    include('../view/header.php');
    include('../view/add_make.php');
    include('../view/footer.php');
}

// Action to add new make
function add_make_action()
{
    $make = filter_input(INPUT_POST, 'make', FILTER_UNSAFE_RAW);

    if (!$make) {
        $error = 'Make not provided.';
        return add_make_form($error);
    }

    add_make($make);

    header("Location: /admin/?action=makes");
}

// Delete vehicle make
function delete_make_action()
{
    $id = filter_input(INPUT_GET, 'id', FILTER_UNSAFE_RAW);

    if (!$id) {
        $error = 'Make ID not provided.';
        return makes_action($error);
    }

    try {
        delete_make($id);
    } catch (Exception $e) {
        $error = 'Cannot delete make with vehicles.';
        return makes_action($error);
    }
    header("Location: /admin/?action=makes");
}
