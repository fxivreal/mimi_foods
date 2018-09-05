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

                $subject_set = find_all_subjects() ;      

                ?>
                 <h1>Subject</h1>
                  
                  <a href="<?php echo url_for('/staff/subjects/new.php')?>">Create new subjects</a>
                  
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <td>ID</td>
                              <td>Position</td>
                              <td>Visible</td>
                              <td>Name</td>
                              <td>View</td>
                              <td>Edit</td>
                              <td>Delete</td>
                          </tr>
                      </thead>
                      <thead>
                         
                         <?php while($subject = mysqli_fetch_assoc($subject_set)) {?>
                      
                          <tr>
                              <td><?php echo h($subject['id']); ?></td>
                              <td><?php echo h($subject['position']); ?></td>
                              <td><?php echo  $subject['visible'] ==1 ? 'true' : 'false';?></td>
                              <td><?php echo h($subject['menu_name']); ?></td>
                              
                      
                              <td><a href="<?php echo url_for('/staff/subjects/show.php?id=' . h(U($subject['id']))); ?>">View</a></td>
                              <td><a href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
                             
                             
                          </tr>
                          
                    <?php } ?>
                      </thead>
                  </table>
                    
                    
                </div>
                 
                 
                 
             </div>

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
