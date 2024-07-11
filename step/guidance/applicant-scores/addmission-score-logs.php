<?php
include '../inc/head.php';

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Addmission Score Logs</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var allDataArray = localStorage.getItem('allDataArray');
    var allDataArray = JSON.parse(allDataArray);
    var allDataArray = JSON.parse(allDataArray);
  
    $.each(allDataArray, function(index, value) {
        $('.card-body').append('<table class="table table-bordered table-striped"><tbody id=' + index + '><th>'+ index +'</th></tbody></table>');

        $('#thead-tr').append('<th class=' + index + '>' + index + '</th>');

        $.each(value, function(index2, value2) {
            $('#' + index).append('<tr><td>' + value2 + '</td></tr>');
        });
    });
    console.log(allDataArray);
    
</script>