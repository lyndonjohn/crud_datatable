<?php
/*
 *    Date:            2018-06-07 10:22:36
 *    Description:    Process form
 *    Author:            @lyndonjohnv
 */

require_once 'class/Record.class.php';
$app = new Record();

if (isset($_GET['add'])) {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $salary    = $_POST['salary'];

    if (empty($firstname) || empty($lastname) || empty($salary)) {
        echo json_encode("All fields are required.");
        return false;
    }

    try {
        if ($app->create($firstname, $lastname, $salary)) {
            return true;
        }
    } catch (PDOExecption $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['edit'])) {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $salary    = $_POST['salary'];
    $id        = $_POST['record_id'];

    if (empty($firstname) || empty($lastname) || empty($salary)) {
        echo json_encode("All fields are required.");
        return false;
    }

    try {
        if ($app->update($firstname, $lastname, $salary, $id)) {
            return true;
        }
    } catch (PDOExecption $e) {
        echo "Error: " . $e->getMessage();
    }
}
