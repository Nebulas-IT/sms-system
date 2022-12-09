<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/left_sidebar.php'; ?>
<?php
Session::checkSession();
?>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $addTemplateM = $msg->addTemplateMessage($_POST);
    }
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i>Add New Template Message</h3>
            <?php
                if (isset($addTemplateM)){
                    echo $addTemplateM;
                }
            ?>

            <div class="row mt">
                <div class="form-panel">
                    <form class="form-horizontal style-form" method="POST" action="addTemplateMessage.php">

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Topic Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="topic_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea class="sms-text-area form-control"
                                          name="message"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" value="Submit" name="submit"
                                       style="align-content: center; float:inherit;margin-left: 10px;font-size: 20px;">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div><!-- /col-lg-9 -->
        <?php include "inc/right_sidebar.php"; ?>
    </section>
    <! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<?php include('inc/footer.php') ?>
<?php include('inc/javascripts.php') ?>
