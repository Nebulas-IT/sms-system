<!DOCTYPE html>
<html>
<!--<head>-->
<!--    <title>Webslesson Tutorial | How to Use Bootstrap Select Plugin with PHP JQuery</title>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>-->
<!---->
<!--</head>-->
<?php include 'inc/header.php'; ?>
<body>
<style type="text/css">
    .no-results{
        cursor: pointer;
    }
</style>
<?php
$numbers = '';
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $numbers = $_POST['hidden_framework'];
}
?>
<br /><br />
<div class="container">
    <br />
    <h2 align="center">How to Use Bootstrap Select Plugin with PHP JQuery</h2>
    <br />
    <div class="col-md-4" style="margin-left:200px;">
        <?php
            if ($numbers) echo $numbers;
        ?>
        <form method="post" action="" id="multiple_select_form">
            <select name="framework" id="framework" class="form-control selectpicker" data-live-search="true" multiple>
                <?php

                $getTMFSend = $ci->getAllContact();

                if ($getTMFSend) {
                    $i = 0;
                    while ($result = $getTMFSend->fetch_assoc()) {
                        $i++;
                        ?>
                        <option value="<?php echo $result['ccode'].$result['mobile']; ?>"><?php echo $result['first_name']. " " .$result['last_name']; ?></option>
                    <?php }
                } ?>
            </select>
            <br /><br />
            <input type="hidden" name="hidden_framework" id="hidden_framework" />
            <input type="submit" name="submit" class="btn btn-info" value="Submit" />
        </form>
        <br />

    </div>
</div>
<script>
    $(document).ready(function(){
        $('.selectpicker').selectpicker({
            noneResultsText: 'Send To Number {0}'
        });
        $(document).on('click', 'li.no-results', function () {
            var new_option = $(this).text().split('"')[1];
            $(".selectpicker")
                .append('<option value="'+ new_option +'" selected>'+ new_option +'</option>')
                .selectpicker('refresh');
            //You can also call AJAX here to add the value in DB
            $('#hidden_framework').val($('#framework').val());
        });
        $('#framework').change(function(){
            $('#hidden_framework').val($('#framework').val());
        });
    });
</script>