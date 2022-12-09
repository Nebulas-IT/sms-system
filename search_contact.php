<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/left_sidebar.php'; ?>
<?php
Session::checkSession();
?>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $getSearchContact = $search->searchContact($_POST);
} else {
    $getSearchContact = NULL;
}

?>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i> Contact Details</h3>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> All Contact</h4>
                            <form method="POST" action="search_contact.php">
                                <input type="text" placeholder="Search.."
                                       style="margin-right: 0px;float: right;margin-top: -30px; margin-right: 15px;"
                                       name="search">
                                <input type="submit" style="visibility: hidden;">

                            </form>
                            <hr>

                            <thead>
                            <tr>
                                <th> First Name</th>
                                <th class="hidden-phone">Last Name</th>
                                <th>Mobile No.</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?php
                            if ($getSearchContact) {
                                while ($result = $getSearchContact->fetch_assoc()) { ?>
                                    <tbody>

                                    <tr>
                                        <td><a><?php echo $result['first_name']; ?></a></td>
                                        <td class="hidden-phone"><?php echo $result['last_name']; ?></td>
                                        <td><?php echo $result['ccode'] . $result['mobile']; ?></td>
                                        <td>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                                            </button>
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
