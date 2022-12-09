<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/left_sidebar.php'; ?>
<?php
Session::checkSession();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $contactInfo = $ci->addContact($_POST);

}
?>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <?php

            if (isset($contactInfo)) {
                echo $contactInfo;
            }

            ?>
            <h3><i class="fa fa-angle-right"></i>Add Contact</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <form class="form-horizontal style-form" method="POST">

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Mobile</label>
                                <input type="text" name="ccode" style="width: 100px;
    margin-left: 15px;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;"
                                >-<input type="text" name="mobile" style="width: 67%;

    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;">
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Birth Date</label>
                                <input type="date" name="birth_day" style="  margin-left: 15px;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;">
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="submit" name="submit" value="Add Contact"
                                           style="align-content: center; float:inherit;margin-left: 10px;font-size: 20px;">
                                </div>
                            </div>
                        </form>
                        <!-- Add contact From File-->
                        <h1 align="center" style="color: #3FBA0C;">Add Contact Info From Text File</h1>
                        <form action="add_contact.php" name="readfile" method="post" enctype="multipart/form-data">
                            <table cellpadding="10" align="center" rules="all" frame="box">
                                <tr>
                                    <td colspan="2">
                                        <h3>
                                            Contact Info upload
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="txt-file">Open File(*.txt):</label>
                                    </td>
                                    <td>
                                        <input type="file" name="file1[]" multiple="multiple">
                                        <!--file to read, we attribute name as blank array to store multiple file and multiple='multiple' to enable multiple select file-->
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right">
                                        <input type="submit" name="read" value="Insert">
                                        <!--button to submit the form to read data from the file-->
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <?php
                        //check if we have click submit form with button name read
                        if (isset($_POST['read'])) {
                            //now we need to connect to database
                            $conn = new  mysqli('localhost', 'root', '', 'message_db');
                            //mysqli_connect('localhost','root','') or die('could not connect to database'.mysqli_error());//connection to database server
                            //mysql_connect(servername,username,password)
                            //mysqli_select_db('sms_db');//select database
                            //mysql_select_db(databasename);
                            //now start test file upload
                            //we need to get total count of selected file
                            $total = count($_FILES['file1']['name']);
                            //echo $total;
                            //now i will use for loop to get file from selected
                            for ($i = 0; $i < $total; $i++) {
                                //now we need to upload only text file with ".txt" wo we must check the extention of file by
                                $file_type = $_FILES['file1']['type'][$i];//get file type of selected file to read
                                $allow_type = array('text/plain');//allow only file that have extesion with .txt
                                if (in_array($file_type, $allow_type)) {//check if selected file type is match to the allow file type we have defined
                                    //let read content of each file
                                    //before do this we need to move file from tmp dir to our dir by
                                    move_uploaded_file($_FILES['file1']['tmp_name'][$i], 'files/' . $_FILES['file1']['name'][$i]);
                                    $read = fopen('files/' . $_FILES['file1']['name'][$i], "r");
                                    while (!feof($read)) {//check if not yet end of file
                                        //echo str_replace(",","','",fgets($read));//in my text file i have comma to terminated for each word
                                        //so i will replace comma to ',' to match mysql syntax for values to insert to table
                                        //eg: insert into table_name values('val1','val2')
                                        //now i just add "'" around it is done for values to insert to table
                                        $content = fgets($read);
                                        $carray = explode(",", $content);

                                        list($first_name, $last_name, $ccode, $mobile, $birth_day) = $carray;

                                        // $values = "'".str_replace(",","','",fgets($read))."'";
                                        $sql = "INSERT INTO `contact_info` (`first_name`, `last_name`, `ccode`, `mobile`, `birth_day`) VALUES ('$first_name',
                      '$last_name', '$ccode', '$mobile', '$birth_day')";
                                        //now i will insert data from my form
                                        //mysql_query($sql);//execute sql string
                                        $result = $conn->query($sql);
                                    }
                                    if ($result == true) {
                                        echo "<span class='success'> Contact Info inserted Successfully. </span>";
                                    } else {
                                        echo "<span class='error'> Contact Info not inserted Successfully. </span>";
                                    }
                                    fclose($read);

                                }

                            }
                        }

                        ?>

                        <br><br><br>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->
            </div>
        </div><!-- /col-lg-9 -->
        <?php include "inc/right_sidebar.php"; ?>
    </section>
    <! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<?php include('inc/footer.php') ?>
<?php include('inc/javascripts.php') ?>


