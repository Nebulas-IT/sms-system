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
if (isset($_GET['deleteTemplateMessage'])){
    $id = $_GET['deleteTemplateMessage'];
    $deleteTemplateM = $msg->deleteTMessage($id);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $getSearchMessage = $search->searchTemplateMessage($_POST);
} else {
    $getSearchMessage = NULL;
}

?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i> Template Message</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i>Template Message</h4>
                            <?php
                            if (isset($deleteTemplateM)){
                                echo $deleteTemplateM;
                            }
                            ?>
                            <form method="POST" action="searchTemplateMessage.php">
                                <input type="text" placeholder="Search.."
                                       style="margin-right: 0px;float: right;margin-top: -30px; margin-right: 15px;"
                                       name="search">
                                <input type="submit" style="visibility: hidden;">

                            </form>
                            <hr>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?php
                            if ($getSearchMessage) {
                                while ($result = $getSearchMessage->fetch_assoc()) { ?>
                                    <tbody>
                                    <tr>
                                        <td class="hidden-phone"><?php echo $result['topic_name']; ?></td>
                                        </td>
                                        <td class="hidden-phone"><?php echo $result['message']; ?>
                                        </td>
                                        <td><span class="label label-info label-mini">Active</span></td>
                                        <td>
                                            <a href="editTemplateMessage.php?id=<?php echo $result['id'];?>">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil "></i>
                                                </button>
                                            </a>
                                            <a href="?deleteTemplateMessage=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure to delete the data!')">
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>


                                    </tbody>
                                <?php }
                            } ?>

                        </table>
                        <a href="addTemplateMessage.php">
                            <button class="btn btn-danger" style="align-content: center; margin-left:350px;"> Add New Template Message
                            </button>
                        </a>
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
