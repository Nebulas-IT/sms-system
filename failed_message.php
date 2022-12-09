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
    if (isset($_GET['deleteFailedMessage'])){
        $id = $_GET['deleteFailedMessage'];
        $deleteFailedM = $msg->deleteFailedMessageById($id);
    }
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i> Failed Log</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>Failed Message</h4>
                            <?php
                                if (isset($deleteFailedM)){
                                    echo $deleteFailedM;
                                }
                            ?>
                            <form method="POST" action="searchFailedMessage.php">
                                <input type="text" placeholder="Search.."
                                       style="margin-right: 0px;float: right;margin-top: -30px; margin-right: 15px;"
                                       name="search">
                                <input type="submit" style="visibility: hidden;">

                            </form>
                            <hr>
                            <thead>
                            <tr>
                                <th> Recipient</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?php

                            $getFailedMessage = $msg->failedMessage();

                            if ($getFailedMessage) {
                                while ($result = $getFailedMessage->fetch_assoc()) { ?>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="desc">
                                                <div class="thumb">
                                                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                                <div class="details">
                                                    <p>
                                                        <muted>2 Minutes Ago</muted>
                                                        <br/>
                                                        By:<a><?php echo $result['recipient']; ?></a> on <?php echo $result['date_time']; ?><br/>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden-phone"><?php echo $result['message']; ?></td>
                                        <?php
                                        $checkStatus = Session::get("sendMessage");
                                        if ($checkStatus == true) { ?>

                                            <td><span class="label label-info label-mini">Delivered</span></td>
                                        <?php } else { ?>
                                            <td><span class="label label-info label-mini">Failed</span></td><?php
                                        }
                                        ?>
                                        <td>
                                            <a href="?deleteFailedMessage=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to delete the data!')">
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                <?php }
                            } ?>
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
