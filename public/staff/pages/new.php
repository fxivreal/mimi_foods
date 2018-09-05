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
                            Create Page
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
                            
                            
                        $page = [];
                        $page['subject_id'] = $_POST['subject_id'] ?? '';
                        $page['menu_name'] = $_POST['menu_name'] ?? '';
                        $page['position']  = $_POST['position'] ?? '';
                        $page['visible'] = $_POST['visible'] ?? '';
                        $page['content'] = $_POST['content'] ?? '';
                    
                        $result = insert_page($page);
                            if($result === true ){
                            $new_id = mysqli_insert_id($db);
                            redirect_to(url_for('/staff/pages/new.php?id=' . $new_id));
                             
                        }  else {
                            
                            $errors = $result;
                                
                        } 
                           
                       
                        }else{
                            
                        $page = [];
                        $page['subject_id'] = ''; 
                        $page['menu_name'] = ''; 
                        $page['position'] = ''; 
                        $page['visible'] = ''; 
                        $page['content'] = ''; 
                            
                       
                        }
                        
                        $page_set = find_all_pages();
                        $page_count = mysqli_num_rows($page_set) + 1;
                        mysqli_free_result($page_set);


                        $id = $_GET['id'] ?? '1';

                        $page =  find_page_by_id($id);
                        
                        ?>
                 
                       
                       
                          <?php echo display_errors($errors);?>
                        
                       
                        <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
                          
                             <a href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to list</a>
                             
                                <div class="form-group" class = "col-xs-4">
                               <label for="position">Subject_id:</label>
                               <select class="form-control" name="subject_id" id="" class="col-xs-6" >
                                   <?php
                                   
                                  $subject_set = find_all_subjects();
                                   while($subject = mysqli_fetch_assoc($subject_set))  {
                                       echo "<option value=\"" . h($subject['id']) . "\"";
                                       if($page['subject_id'] === $subject['id']){
                                           echo "selected";
                                       }
                                       echo ">" . h($subject['menu_name']) . "</option>";
                                   }  
                                       
                                    mysqli_free_result($subject_set);                         
                                   ?>
                               </select>
                              
                            </div> 
                   
                
                          
                           <div class="form-group">
                                 <label for="page New">Menu Name</label>
                                 <input value="<?php echo h($page['menu_name']); ?>" type="text" class="form-control" name="menu_name" />
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
                                 <label for="visible">Visible:</label>
                                 <input value="0" type="hidden" class="form-control" name="visible">
                                 <input value="1"<?php if(h($page['visible']) == 1){echo "checked"; }?> type="checkbox" class="" name="visible"/>
                             </div>
                             
                              
                            <div class="form-group">
                                <label for="">Content:</label>
                                <textarea class="form-control" name="content" id="" cols="5" rows="2" value=""><?php echo h(u($page['content']));?></textarea>
                         
                         
                            </div>
                           
    
                          
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Create Page">
                                
                            </div>
 
                        </form>
                          </div>
                       
                     
                    
                 
            <!--   Form to create Location    -->
                     
           <!--     Table form          -->
                      
                <div class="col-xs-6">
                 
                 <?php 
                    
                 $pages = find_all_pages();
                 
                    
                    
                 ?>
                  
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <td>Id</td>
                              <td>Subject_id</td>
                              <td>Position</td>
                              <td>Visible</td>   
                              <td>Menu Name</td>
                              <td>Content</td>
                              <td>View</td>
                              <td>Edit</td>
                              <td>Delete</td>
                          </tr>
                      </thead>
                      <thead>
                         
                         <?php  while($page = mysqli_fetch_assoc($pages)) {?>
                      
                          <tr>
                              <td><?php echo h($page['id']); ?></td>
                              <?php $subject = find_subject_by_id($page['subject_id']); ?>
                              <td><?php echo h($subject['menu_name']); ?></td>
                              <td><?php echo h($page['position']); ?></td>
                              <td><?php echo h($page['visible']); ?></td>
                              <td><?php echo h($page['menu_name']); ?></td>
                              <td><?php echo h($page['content']); ?></td>
                             
                      
                              <td><a href="">View</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id'])));?>">Delete</a></td>
                             
                             
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
             