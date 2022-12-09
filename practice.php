<h4><i class="fa fa-angle-right"></i> Message Inbox</h4>
<form method="POST" action="inbox.php">
    <input type="text" placeholder="Search.."
           style="margin-right: 0px;float: right;margin-top: -30px; margin-right: 15px;" name="search">
    <input type="submit" style="visibility: hidden;">

</form>

<style>
    .sms-details {
        margin-bottom: 10px;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid darkred;
    }
</style>
<?php

$getRecentMessage = $msg->getRecentMessageByUser();

if ($getRecentMessage) {
    while ($result = $getRecentMessage->fetch_assoc()) { ?>

        <!-- First Action -->
        <div class="desc sms-details">
            <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
            </div>
            <div class="details">
                <p>
                    <muted>2 Minutes Ago</muted>
                    <br/>
                    By:<a href="#"><?php echo $result['mobile']; ?></a>
                    on <?php echo $result['date_time']; ?><br/>
                <p><?php echo $result['message']; ?></p>
                </p>
                <a class="btn btn-success btn-sm"
                   href="chatbox.php?no=<?= $result['mobile'] ?>">Reply</a>
            </div>
        </div>
    <?php }
} ?>
<hr>