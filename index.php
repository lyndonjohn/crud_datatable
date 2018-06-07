<?php
/*
 *    Date:            2018-06-07 08:42:46
 *    Description:    Basic CRUD with Datatable
 *    Author:            @lyndonjohnv
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD with DataTable</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Salary</th>
                    <th>Date</th>
                    <th style="width:100px;"></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Salary</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div id="addform">
        <form id="form_edit" class="edit-form hideme" method="POST" action="process.php?edit">
            <b>Edit Form</b>
            <div class="form-item">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname_edit" placeholder="enter firstname">
            </div>
            <div class="form-item">
                <label for="firstname">Lastname</label>
                <input type="text" name="lastname" id="lastname_edit" placeholder="enter lastname">
            </div>
            <div class="form-item">
                <label for="firstname">Salary</label>
                <input type="text" name="salary" id="salary_edit" onkeypress="return isNumberKey(event,this)" placeholder="enter salary">
            </div>
            <div class="form-item">
                <button type="reset">Reset</button>
                <button type="submit">Submit</button>
            </div>
        </form>

        <form id="form_add" class="add-form" method="POST" action="process.php?add">
            <b>Add Form</b>
            <div class="form-item">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname" placeholder="enter firstname">
            </div>
            <div class="form-item">
                <label for="firstname">Lastname</label>
                <input type="text" name="lastname" id="lastname" placeholder="enter lastname">
            </div>
            <div class="form-item">
                <label for="firstname">Salary</label>
                <input type="text" name="salary" id="salary" onkeypress="return isNumberKey(event,this)" placeholder="enter salary">
            </div>
            <div class="form-item">
                <button type="reset">Reset</button>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
