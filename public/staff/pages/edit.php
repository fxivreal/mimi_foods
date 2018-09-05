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
                            Edit Page
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
                   redirect_to(url_for('/staff/pages/index.php'));  
                  }
                  $id = $_GET['id'] ?? '';
                
              
                  if(is_post_request()) {
                      
                   $page = [];
                   $page['id'] = $id;   
                   $page['subject_id'] = $_POST['subject_id'] ?? '';
                   $page['menu_name'] = $_POST['menu_name'] ?? '';
                   $page['position'] = $_POST['position'] ?? '';
                   $page['visible'] = $_POST['visible'] ?? '';
                   $page['content'] = $_POST['content'] ?? '';
                      
                    $result = update_page($page);
                    if($result === true){ 
                    redirect_to(url_for('/staff/pages/index.php'));

                    } else {

                    $errors = $result;
                      
                    }

                    } else {

                    $page= find_page_by_id($id);  

                    }

                    $page_set = find_all_pages();
                    $page_count = mysqli_num_rows($page_set);
                    mysqli_free_result($page_set);
                
                    ?>

                   <?php echo display_errors($errors); ?>
                 
                    <div class="col-xs-6">
                      
                        <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>" method="post">
                          
                             <a href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to list</a>
                             
                             
                                 <div class="form-group" class = "col-xs-4">
                               <label for="position">Subject:</label>
                               <select class="form-control" name="subject_id" id="" class="col-xs-6" >
                                   <?php
                                   
                                  $subject_set = find_all_subjects();
                                   while($subject = mysqli_fetch_assoc($subject_set))  {
                                       echo "<option value=\"" . h($subject['id']) . "\"";
                                       if($page['subject_id'] == $subject['id']){
                                           echo "selected";
                                       }
                                       echo ">" . h($subject['menu_name']) . "</option>";
                                   }  
                                       
                                    mysqli_free_result($subject_set);                         
                                   ?>
                               </select>
                              
                            </div> 
                   
                
                          
                          <div class="form-group">
                                 <label for="Page New">Menu Name</label>
                                 <input type="text" value="<?php echo h($page['menu_name']); ?>" class="form-control" name="menu_name" />
                             </div>
                           
                           
                      
                            <div class="form-group" class = "col-xs-4">
                               <label for="position">Position:</label>
                               <select class="form-control" name="position" id="" class="col-xs-6" >

                                  <?php
                                   
                                   for($i=1; $i <= $page_count; $i++){
                                       
                                       echo "<option value=\"{$i}\"";
                                 if($page["position"] == $i) {
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
                                 <input type="checkbox" value="1"<?php if($page['visible'] == 1){echo "checked"; } ?>  class="" name="visible">
                             </div>
    
                          
                           <div class="form-group">
                                <label for="">Content:</label>
                                <textarea class="form-control" name="content" id="" cols="5" rows="2" value=""><?php echo h(u($page['content']));?></textarea>
                         
                         
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
             