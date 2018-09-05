

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
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           <a href="">Show Subject</a>
                            <small></small>
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
                    <h2></h2>
               
                  <a href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo; Back to list</a>
                  
                  
                  <?php
                
                  $id = $_GET['id'] ?? '1';
                
                $subject = find_subject_by_id($id);
                
            
                  ?>
                  
                  
                    <div class="col-xs-6">
                        <form action="" method="post">
                          
                             <a href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo; Back to list</a>
                
                          
                           <div class="form-group">
                                 <label for="Subject New">Menu Name</label>
                                 <input value="<?php echo h($subject['menu_name']); ?>" type="text" class="form-control" name="menu_name" />
                             </div>
                           
                           
                      
                            <div class="form-group" class = "col-xs-4">
                               <label for="location">Position:</label>
                               <select class="form-control" name="position" id="" class="col-xs-6" >
                                   <option value="1"<?php if($subject['position'] ==1 ){echo "selected";}?>>1</option>
                                  
                               </select>
                              
                            </div> 
                   
                           
                           
                             <div class="form-group">
                                 <label for="location name">Visible:</label>
                                 
                                 <?php echo $subject['visible'] == '1' ? 'true' : 'false';?>
                             </div>
    
                          
                     
 
                        </form>
                          </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
