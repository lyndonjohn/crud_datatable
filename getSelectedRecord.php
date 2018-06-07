<?php
/*
 *    Date:           2018-06-07 11:40:35
 *    Description:    Fetch data of selected record
 *    Author:         @lyndonjohnv
 */

require_once 'class/Record.class.php';
$app = new Record();

if(isset($_POST['record_id'])) {
    try {
        
        $stmt=$app->query("SELECT firstname, lastname, salary FROM employees WHERE id=?");
        $stmt->execute([$_POST['record_id']]);
        $result = $stmt->fetch();

        echo json_encode($result);

    } catch (PDOExecption $e) {
        echo $e->getMessage();
    }
}