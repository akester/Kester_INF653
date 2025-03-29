<?php
// Show vehicle types
function types_action($error = '')
{
    $types = get_types();

    include('../view/header.php');
    include('../view/types.php');
    include('../view/footer.php');
}

// Form to add vehicle type
function add_type_form($error = '')
{
    include('../view/header.php');
    include('../view/add_type.php');
    include('../view/footer.php');
}

// Action to add new type
function add_type_action()
{
    $type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);

    if (!$type) {
        $error = 'type not provided.';
        return add_type_form($error);
    }

    add_type($type);

    header("Location: /admin/?action=types");
}

// Delete vehicle type
function delete_type_action()
{
    $id = filter_input(INPUT_GET, 'id', FILTER_UNSAFE_RAW);

    if (!$id) {
        $error = 'Make ID not provided.';
        return types_action($error);
    }

    try {
        delete_type($id);
    } catch (Exception $e) {
        $error = 'Cannot delete type with vehicles';
        return types_action($error);
    }
    header("Location: /admin/?action=types");
}
