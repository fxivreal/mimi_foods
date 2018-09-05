<?php require_once('../../../private/initialize.php')?>


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
                    <div class="col-lg-12" >
                        <h1 class="page-header">
                           <a href="<?php echo url_for('/staff/index.php')?>">Menu</a>
                            <small>Staff </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
             <div class="cols-xs-x6">
                 
                      <div class="col-xs-6">
                      
                      
                      
                      <?php
                       
                       $page_set = find_all_pages();
                          
                          
                          
                          
                       ?>
                 
                
                 <h1>Page</h1>
                  
                  <a href="<?php echo url_for('/staff/pages/new.php')?>">Create new page</a>
                  
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <td>ID</td>
                              <td>Subject_id</td>
                              <td>Position</td>
                              <td>Visible</td>
                              <td>Name</td>
                              <td>Content</td>
                              <td>View</td>
                              <td>Edit</td>
                              <td>Delete</td>
                          </tr>
                      </thead>
                      <thead>
                         
                         <?php  while($page = mysqli_fetch_assoc($page_set)) {?>
                      
                          <tr>
                              <td><?php echo $page['id']; ?></td>
                              <?php $subject = find_subject_by_id($page['subject_id']);?>
                              <td><?php echo h($subject['menu_name']); ?></td>
                              <td><?php echo $page['position']; ?></td>
                              <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                              <td><?php echo $page['menu_name']; ?></td>
                              <td><?php echo h($page['content']); ?></td>
                              
                      
                              <td><a href="<?php echo url_for('/staff/pages/show.php?id=' . $page['id'])?>">View</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/edit.php?id=' . $page['id'])?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/delete.php?id=' . $page['id'])?>">Delete</a></td>
                             
                             
                          </tr>
                          
                    <?php } ?>
                      </thead>
                  </table>
                    
                   <?php mysqli_free_result($page_set)?> 
                </div>
                 
                 
                 
             </div>

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
