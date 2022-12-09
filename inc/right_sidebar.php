<!-- **********************************************************************************************************************************************************
     RIGHT SIDEBAR CONTENT
     *********************************************************************************************************************************************************** -->

<style>
    .sms-details1 {
        margin-top: 10px;
        padding: 10px;
    }
</style>

<div class="col-lg-3 ds">
    <!--COMPLETED ACTIONS DONUTS CHART-->
    <h3>Message Inbox</h3>

    <?php

    $getAllMessage = $msg->getMessage();

    if ($getAllMessage) {
        while ($result = $getAllMessage->fetch_assoc()) { ?>

            <!-- First Action -->
            <div class="desc">
<!--                <div class="thumb">-->
<!--                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>-->
<!--                </div>-->
                <div class="details sms-details1">
                    <p>
<!--                        <muted>2 Minutes Ago</muted>-->
                        <br/>
                        By:<a href="#"><?php echo $result['mobile']; ?></a> on <?php echo $result['date_time']; ?><br/>
                    <p><?php echo $result['message']; ?></p>
                    </p>
                    <a class="btn btn-success btn-sm"
                       href="chatbox.php?no=<?= $result['mobile'] ?>">Reply</a>

                </div>

            </div>
        <?php }
    } ?>
</div><!-- /col-lg-3 -->