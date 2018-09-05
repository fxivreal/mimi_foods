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
                            Create Subject
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
                  
                
                   
                    <div class="col-xs-6">
                    

                       <?php
                        
                       
                        if(is_post_request()){
                            
                            
                        $subject = [];
                        $subject['menu_name'] = $_POST['menu_name'] ?? '';
                        $subject['position'] = $_POST['position'] ?? '';
                        $subject['visible'] = $_POST['visible'] ?? '';
                            
                        $result = insert_subject($subject);
                            
                        if($result === true) {
                        $new_id = mysqli_insert_id($db);
                        redirect_to(url_for('/staff/subjects/new.php?id=' . $new_id));

                            
                        }else{
                         $errors = $result;   
                            
                        }
                       
                        
                        }else{
                           // display the blank form.  
                                
                        }
                        
                        $subject = [];
                        $subject['subject_id'] = ''; 
                        $subject['menu_name'] = ''; 
                        $subject['position'] = ''; 
                        $subject['visible'] = ''; 
                        $subject['content'] = ''; 

                        $subject_set = find_all_subjects();
                        $subject_count = mysqli_num_rows( $subject_set) + 1;
                        mysqli_free_result($subject_set);

                        $subject = [];
                        $subject['position'] = $subject_count;

                        $id = $_GET['id'] ?? '1';

                        $subject =  find_subject_by_id($id);
                         

                        ?>
                 
                       
                       
                        
                        <?php echo display_errors($errors);?>
                        
                        <form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="post">
                          
                             <a href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo; Back to list</a>
                
                          
                           <div class="form-group">
                                 <label for="Subject New">Menu Name</label>
                                 <input value="<?php echo h($subject['menu_name']); ?>" type="text" class="form-control" name="menu_name" />
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
                                 <label for="location name">Visible:</label>
                                 <input value="0" type="hidden" class="form-control" name="visible">
                                 <input value="1"<?php  if( h($subject['visible']) == 1){echo "checked"; }?> type="checkbox" class="" name="visible">
                             </div>
    
                          
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Create Subject">
                                
                            </div>
 
                        </form>
                          </div>
                       
                     
                    
                 
            <!--   Form to create Location    -->
                     
           <!--     Table form          -->
                      
                <div class="col-xs-6">
                 
                 <?php 
                    
                 $subjects = find_all_subjects();
                 
                    
                    
                 ?>
                  
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <td>Id</td>
                              <td>Position</td>
                              <td>Visible</td>   
                              <td>Menu Name</td>
                              <td>View</td>
                              <td>Edit</td>
                              <td>Delete</td>
                          </tr>
                      </thead>
                      <thead>
                         
                         <?php  while($subject = mysqli_fetch_assoc($subjects)) {?>
                      
                          <tr>
                              <td><?php echo h($subject['id']); ?></td>
                              <td><?php echo h($subject['position']); ?></td>
                              <td><?php echo h($subject['visible']); ?></td>
                              <td><?php echo h($subject['menu_name']); ?></td>
                             
                      
                              <td><a href="">View</a></td>
                              <td><a href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id'])));?>">Delete</a></td>
                             
                             
                          </tr>
                          
                    <?php } ?>
                      </thead>
                  </table>
                    
                    
                </div>
                  
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
             