<?php
function classes_action($error = '')
{
    $classes = get_classes();

    include('../view/header.php');
    include('../view/classes.php');
    include('../view/footer.php');
}

function add_class_form($error = '')
{
    include('../view/header.php');
    include('../view/add_class.php');
    include('../view/footer.php');
}

function add_class_action()
{
    $class = filter_input(INPUT_POST, 'class', FILTER_UNSAFE_RAW);

    if (!$class) {
        $error = 'Class not provided.';
        return add_class_form($error);
    }

    add_class($class);

    header("Location: /admin/?action=classes");
}

function delete_class_action()
{
    $id = filter_input(INPUT_GET, 'id', FILTER_UNSAFE_RAW);

    if (!$id) {
        $error = 'Make ID not provided.';
        return classes_action($error);
    }

    try {
        delete_class($id);
    } catch (Exception $e) {
        $error = 'Cannot delete class with vehicles';
        return classes_action($error);
    }
    header("Location: /admin/?action=classes");
}
