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
    session_start();
    $admin = new AdminLogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $newUser = $admin->addNewUser($_POST);
}
?>


<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i>Change Workstation Password</h3>
            <div style="border:1px solid #00c5de; border-radius: 4px;">
                <p style="margin-right: 5px; margin-left: 5px; margin-top: 5px;">
                    This Workstation can be setup to require a workstation-specific Username
                    and Password that is different from your administrator Username/password.
                </p>
                <p style="margin-right: 5px; margin-left: 5px; margin-top: 5px; color: blue">
                    please enter a username and password that you would like use for your login.
                </p>
                <p style="margin-right: 5px; margin-left: 5px; margin-top: 5px; color: red; font-style: italic;">
                    * Your password must be 6 character long and have a minimum of one letter and one number. *
                </p>
            </div>
            <br><br><br>
            <?php
                if (isset($newUser)){
                    echo $newUser;
                }
            ?>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <form class="form-horizontal style-form" method="POST" action="">

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">New WorkStation Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="workshop_username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password2" class="form-control">
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


