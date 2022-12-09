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
    if (isset($_GET['deleteScheduledMessage'])){
        $id = $_GET['deleteScheduledMessage'];
        $deleteScheduleM = $msg->deleteScheduleMessageById($id);
    }
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i> Schedule Message</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>Schedule and Reminder Message</h4>
                            <?php
                                if (isset($deleteScheduleM)){
                                    echo $deleteScheduleM;
                                }
                            ?>
                            <form method="POST" action="searchScheduleMessage.php">
                                <input type="text" placeholder="Search.."
                                       style="margin-right: 0px;float: right;margin-top: -30px; margin-right: 15px;"
                                       name="search">
                                <input type="submit" style="visibility: hidden;">

                            </form>
                            <hr>
                            <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th> Recipient</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $scheduleMessage = $msg->getScheduledMessage();

                            if ($scheduleMessage) {
                                while ($result = $scheduleMessage->fetch_assoc()) { ?>
                                    <tr>
                                        <td>
                                            <div class="desc">
                                                <div class="thumb">
                                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <div class="details">
                                                    <p>
<!--                                                        <muted>2 Minutes Ago</muted>-->
                                                        <br/>
                                                        On <?php echo $result['date_time']; ?><br/>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden-phone">By:<a href="#"><?php echo $result['mobile']; ?></a></td>
                                        <td class="hidden-phone"><?php echo $result['message']; ?>
                                        </td>
                                        <td>
                                            <a href="?deleteScheduledMessage=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to delete the data!')">
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
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
