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
                <div class="welcome-page">
                    <h3><i class="fa fa-angle-right"></i>Home</h3>
                    <div class="note">
                        <h3>Welcome to Texus Spinal & Wellness</h3>
                        <p><?=$user_id = Session::get("admin_id");?></p>
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



