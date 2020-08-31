<?php 
include_once '../../../autoload.php';
include_once '../components/header.php';
include_once './process_edit_cohort.php';

use \Library\Form as Form;
use \Library\Validator as Validator;
$comments = array();
$error = false;
try{
$comment_id = isset($_GET['comment_id']) ? Form::sanitise($_GET['comment_id']) :null;
$commentError = Validator::validateNumber('Comment', $comment_id);
if ($commentError !=null){
    throw new \Exception($commentError);
}

    $comment = Controller\Comment::get($comment_id);
    if($comment == null) {
        throw new \Exception("Comment does not exist");
    }

}catch(\Exception $e){
    $error = $e->getMessage();
}

include_once '../components/sidebar.php';?>
        
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Comments</h3>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="view-comments.php">All Comments</a></li>
                            <li class="breadcrumb-item active">Comment</li>
                        </ol>
                    </div>                
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Comment</h4>
                                <h6 class="card-subtitle">All Comments</h6>
                                <div >
                                <form action="../view/edit-comment.php?comment_id=<?= $comment_id?>" method="POST">
                                    <div>
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" value="<?= $comment['name'];?>">
                                    </div>
                                    <div>
                                        <label for="status">Status</label>
                                        <select name="status" id="status">
                                            <option value="">Select a status</option>
                                            <option <?= $cohort['status'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                                            <option <?= $cohort['status'] == 2 ? 'selected' : '' ?> value="2">Inactive</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="comment_id" id="comment_id" value="<?= $comment_id ?>">
                                    <div>
                                        <input type="submit" name="edit_comment" value="Edit">
                                    </div>

                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include_once '../components/footer.php';?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
