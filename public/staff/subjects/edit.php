<?php require_once('../../../private/initialize.php'); ?>
  
          
                    
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
                            Edit Subject
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
                  
                  if(!isset($_GET['id'])){
                      
                   redirect_to(url_for('/staff/subjects/index.php'));  
                  }
                  $id = $_GET['id'] ?? '';
                
              
                  if(is_post_request()) {
                      
                  $subject = [];
                  $subject['id'] = $id;   
                  $subject['menu_name'] = $_POST['menu_name'] ?? '';
                  $subject['position'] = $_POST['position'] ?? '';
                  $subject['visible'] = $_POST['visible'] ?? '';
                      
                  $result = update_subject($subject);
                  if($result === true) {
                  redirect_to(url_for('staff/subjects/index.php')) ; 
                      
                  } else {
                    
                  $errors = $result;
//                      var_dump($errors);
                  }
                  
                
                  }else{
                      
                  $subject = find_subject_by_id($id);
                 
                  }
             
                   $subject_set = find_all_subjects();
                  $subject_count = mysqli_num_rows( $subject_set);
                  mysqli_free_result($subject_set);
                  ?>
                  
                  <?php echo display_errors($errors);?>
                 
                    <div class="col-xs-6">
                        <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>" method="post">
                          
                             <a href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo; Back to list</a>
                
                          
                          <div class="form-group">
                                 <label for="Subject New">Menu Name</label>
                                 <input type="text" value="<?php echo h($subject['menu_name']); ?>" class="form-control" name="menu_name" />
                             </div>
                           
                           
                      
                            <div class="form-group" class = "col-xs-4">
                               <label for="location">Position:</label>
                               <select class="form-control" name="position" id="" class="col-xs-6" >

                                  <?php
                                   
                                   for($i=1; $i <= $subject_count; $i++){
                                       
                                       echo "<option value=\"{$i}\"";
                                 if($subject["position"] == $i) {
                                       echo "selected";
                                   }
                                                                                  
                                echo ">{$i}</option>";     
                                                                                           
                                  }
                                     
                                   ?>
                               </select>
                              
                            </div> 
                   
                           
                        
                             <div class="form-group">
                                 <label for="Visible">Visible:</label>
                                 <input type="hidden" value="0"  class="form-control" name="visible">
                                 <input type="checkbox" value="1"<?php if($subject['visible'] == 1){echo "checked"; } ?>  class="" name="visible">
                             </div>
    
                          
                           
                            
                            
                            
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Edit Subject">
                                
                            </div>
 
                        </form>
                          </div>
                    
                
            <!--   Form to create Location    -->
                     
        
                  
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
             