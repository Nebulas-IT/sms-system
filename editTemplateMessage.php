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

if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    echo "<script>window.location = 'template_message.php'; </script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $topic_name = $_POST['topic_name'];
    $message = $_POST['message'];


    $updateTMessage = $msg->updateTemplateMessage($id, $topic_name, $message);
}
?>

<?php
if (isset($updateTMessage)) {
    echo $updateTMessage;
}
?>


<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i> Edit Template Message</h3>

            <div class="row mt">
                <div class="form-panel">
                    <form class="form-horizontal style-form" method="POST" action="">
                        <?php

                        $tid = $_GET['id'];

                        $templateMessage = $msg->getTemplateMessageByID($tid);
                        if ($templateMessage) {
                            while ($result = $templateMessage->fetch_assoc()) {

                                ?>

                                <div class="form-group">
                                    <div class="col-sm-10" hidden="true">
                                        <input type="text" class="form-control" name="id" value="<?php echo $result['id']; ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Topic Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="topic_name" value="<?php echo $result['topic_name']; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea class="sms-text-area form-control" name="message"><?php echo $result['message']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="submit" value="Save Message"
                                               style="align-content: center; float:inherit;margin-left: 10px;font-size: 20px;">
                                    </div>
                                </div>

                            <?php }
                        } ?>


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
