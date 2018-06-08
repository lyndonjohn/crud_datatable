$(document).ready(function () {
    var tableID = $("#example").DataTable({
        "ajax": {
            url: "getData.php",
            type: "POST"
        }
    });

    $("#form_add").unbind('submit').bind('submit', function () {
        if(confirm("check form before you submit.")) {
            var form = $(this);
    
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    tableID.ajax.reload();
                    document.getElementById('form_add').reset();
                    alert(response);
                }
            });
        }
        return false;
    });
});

var addbtn = document.getElementById("addbtn");
addbtn.addEventListener("click", function(){
    // show add form
    document.getElementById('form_add').classList.remove('hideme');
        
    // hide edit form
    document.getElementById('form_edit').classList.add('hideme');
});

function edit(id) {
    if (id) {
        // remove record id
        $("#record_id").remove();

        // hide add form
        document.getElementById('form_add').classList.add('hideme');
        
        // show edit form
        document.getElementById('form_edit').classList.remove('hideme');
        
        // fetch the member data
        $.ajax({
            url: 'getSelectedRecord.php',
            type: 'POST',
            data: { record_id: id },
            dataType: 'json',
            success: function (response) {
                document.getElementById("firstname_edit").value = response.firstname;
                document.getElementById("lastname_edit").value = response.lastname;
                document.getElementById("salary_edit").value = response.salary;
                // include record id
                $("#form_edit").append('<input type="hidden" name="record_id" id="record_id" value="' + id + '"/>');
            
                $("#form_edit").unbind('submit').bind('submit', function () {
                    if(confirm("check form before you submit.")) {
                        var form = $(this);
                        var table = $('#example').DataTable();
                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'json',
                            success: function (response) {
                                alert(response);
                                table.ajax.reload(null, false);
                            }
                        });
                    }
                    return false;
                });
            }
        });
    } else {
        alert("Error : Refresh the page again");
    }
}

function remove(id) {
    if(id) {
        if(confirm("are you sure?")) {
            var table = $('#example').DataTable();
            $.ajax({
                url: "process.php",
                type: 'POST',
                data: { record_id: id },
                dataType: 'json',
                success: function (response) {
                    alert(response);
                    table.ajax.reload(null, false);
                }
            });
        }
        return false;
    }
}

// money value
function isNumberKey(evt, obj) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    var value = obj.value;
    var dotcontains = value.indexOf(".") != -1;
    if (dotcontains)
        if (charCode == 46) return false;
    if (charCode == 46) return true;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}