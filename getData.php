<?php
/*
*	Date:			2018-06-07 09:46:13
*	Description:	Fetches data from DB
*	Author:			@lyndonjohnv
*/

require_once 'class/Record.class.php';
$app = new Record();

try {
    
    $output   = ['data' => []];

    $stmt=$app->query("SELECT id, firstname, lastname, salary, date_ FROM employees");
    $stmt->execute();
    while ($row=$stmt->fetch()) {

        $actionbutton = '<button onclick="edit(' . $row['id'] . ')">Edit</button> <button onclick="remove(' . $row['id'] . ')">Delete</button>';

        $output['data'][] = [
            $row['firstname'],
            $row['lastname'],
            number_format($row['salary'],2),
            $row['date_'],
            $actionbutton
        ];

    }

    $app = null;
    echo json_encode($output);

    return true;

} catch (PDOExecption $e) {
    echo "Error: " . $e->getMessage();
}