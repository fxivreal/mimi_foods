<?php require_once('../../../private/initialize.php');?>


                    
<!DOCTYPE html>
<html lang="en">
<?php include(  SHARED_PATH . '/admin_header.php');?>

    <div id="wrapper">

        <!-- Navigation -->
      
           
           <?php include( SHARED_PATH . '/admin_navbar.php');?>

           
           
            <!-- /.navbar-collapse -->
       

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Delete Subject
                            <small>FELIX</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            
                        </ol>
                    </div>
                    </div>
                  <!--   Form to create Subject   -->
                  






<?php

//require_login();

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}
$id = $_GET['id'];
 
   
if(is_post_request()){
    
$result = delete_subject($id);
//      $_SESSION['message'] = "The Subject was Deleted Successfully.";
// redirect_to(url_for('/staff/subjects/index.php'));   

}else{
    $subject = find_subject_by_id($id);
}
?>


<?php $page_title = 'Delete Subject';?>
<?php include(SHARED_PATH . '/admin_header.php');?>

<div id="content">

 <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo;Back to List</a> 
 
<div class="Subject delete">
   <h1>Delete Subject</h1>
   <p>Are you sure you want to delete this subject?</p>
   <p class="item"><?php echo h($subject['menu_name']); ?></p>
   
   <form action="<?php echo url_for('/staff/subjects/delete.php?id= ' . h(u($subject['id'])));?>" method="post">
    

    <div class="form-group">
    <input class="btn btn-success" type="submit" name="submit" value="Delete Subject">

    </div>

     
    </form>  
    
</div>
        </div>

<?php include(SHARED_PATH . '/admin_footer.php'); ?>
