<?php
/*
 *    Date:            2018-06-07 09:25:48
 *    Description:    Handles records class
 *    Author:            @lyndonjohnv
 */

require_once 'Database.class.php';

class Record
{
    private $conn;

    public function __construct()
    {
        $database = new Database();

        $db         = $database->dbConnection();
        $this->conn = $db;
    }

    public function query($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function create($firstname, $lastname, $salary)
    {
        try {

            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare("INSERT INTO employees (firstname, lastname, salary) VALUES (?, ?, ?)");
            $stmt->execute([$firstname, $lastname, $salary]);

            $this->conn->commit();

            echo json_encode("Record added!");

            return true;

        } catch (PDOException $e) {

            $this->conn->rollback();
            echo $e->getMessage();

        }
    }

    public function update($firstname, $lastname, $salary, $id)
    {
        try {

            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare("UPDATE employees SET firstname=?, lastname=?, salary=? WHERE id=?");
            $stmt->execute([$firstname, $lastname, $salary, $id]);

            $this->conn->commit();

            echo json_encode("Record updated!");

            return true;

        } catch (PDOException $e) {

            $this->conn->rollback();
            echo $e->getMessage();

        }
    }

    public function delete($id)
    {
        try {
            $this->conn->beginTransaction();

            $stmt = $this->conn->prepare("DELETE FROM employees WHERE id=?");
            $stmt->execute([$id]);

            $this->conn->commit();

            echo json_encode("Record deleted!");
            
            return true;

        } catch (PDOExeption $e) {
            $this->conn->rollback();
            echo $e->getMessage();
        }
    }

}
