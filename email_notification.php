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

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i>Email Notification</h3>
            <div>
                <p>
                    A work Station can be setup with up to 5 E-mail addresses for notification when a contact respond to
                    a message.
                </p>
            </div>
            <br><br><br>

            <h3><i class="fa fa-angle-right"></i>Turn On E-mail Notifications for the following E-mail Address</h3>
            <div class="email-notification">
                <form method="POST" class="check">
                    <input type="radio" name="active">
                    <label>Active</label>
                    <input type="radio" name="not_active">
                    <label>Not Active</label>
                </form>
            </div>
            <br><br>
            <h3><i class="fa fa-angle-right"></i>Also Send E-mail For Keyword Text</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <form class="form-horizontal style-form" method="POST">

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email Address 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email Address 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email Address 3</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email Address 4</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email Address 5</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="alternate" style="border:1px solid whitesmoke;">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Alternate from E-mail Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Alternate from E-mail Address</label>
                                    <div class="col-sm-10">
                                        <input type="radio" id="optionsRadios2" value="option2">
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="submit" name="submit" value="Update"
                                           style="align-content: center; float:inherit;margin-left: 10px;font-size: 20px;">
                                </div>
                            </div>
                        </form>
                        <!-- Add contact From File-->
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


