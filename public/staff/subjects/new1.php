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

                        $menu_name = $_POST['menu_name'];
                        $position = $_POST['position'];
                        $visible = $_POST['visible'];
                        
                        $result = insert_subject($menu_name, $position, $visible);
                        $new_id = mysqli_insert_id($db);
                        redirect_to(url_for('/staff/subjects/new1.php?id=' . $new_id));
                        
                        
                        }else{
                         
                        }
                        
                      $id = $_GET['id'] ?? '1';
                    
                     $subject =  find_subject_by_id($id);
                        
                        ?>
                 
                       
                        
                       
                        <form action="" method="post">
                          
                             <a href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo; Back to list</a>
                
                          
                           <div class="form-group">
                                 <label for="Subject New">Menu Name</label>
                                 <input value="<?php echo h($subject['menu_name']); ?>" type="text" class="form-control" name="menu_name" />
                             </div>
                           
                           
                      
                            <div class="form-group" class = "col-xs-4">
                               <label for="location">Position:</label>
                               <select class="form-control" name="position" id="" class="col-xs-6" >
                                   <option value="1"<?php  if(h($subject['position']) ==1 ){echo "selected";}?>>1</option>
                                  
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
                      
           
                  
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
             