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
                            Create Lounge
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
                            
                            
                        $lounge = [];
                        $lounge['loc_lounge_id'] = $_POST['loc_lounge_id'] ?? '';
                        $lounge['duration'] = $_POST['duration'] ?? '';
                        $lounge['lounge_image']  = $_FILES['image'] ['name'] ?? '';
                        $lounge_image_temp = $_FILES['image'] ['name'] ?? '';
                        $lounge['price'] = $_POST['price'] ?? '';
                        $lounge['content'] = $_POST['content'] ?? '';
                            
                        move_uploaded_file($lounge_image_temp, "../images/$post_image");
                    
                        $result = insert_lounge($lounge);
                            if($result === true ){
                        
                            redirect_to(url_for('/staff/pages/add_lounge.php'));
                             
                        }  else {
                            
                            $errors = $result;
                                
                        } 
                           
                       
                        }else{
                          
                        $lounge = [];
                        $lounge['loc_lounge_id'] = '';
                        $lounge['duration'] =  '';
                        $lounge['lounge_image'] =  '';
                        $lounge['price'] =  '';
                        $lounge['content'] =  '';
                      
                        }
                    

                        
                        ?>
                 
                       
                       
                          <?php echo display_errors($errors);?>
                        
                       
                        <form action="" method="post">
                          
                             <a href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to list</a>
                             
                      
                             <div class="form-group" class = "col-xs-4">
                               <label for="position">location:</label>
                               <select class="form-control" name="brkf_loc_id" id="" class="col-xs-6" >
                                    <?php


                                    $locations = find_all_locations();
                                    while($location = mysqli_fetch_assoc($locations))  {
                                    echo "<option value=\"" . h($location['loc_id']) . "\"";
                                   if($lounge['loc_lounge_id'] == $location['loc_id']){
                                    echo "selected";
                                    }
                                    echo ">" . h($location['loc_name']) . "</option>";
                                    }  
                                   
                                    mysqli_free_result($locations);                         
                                    ?>
                               </select>
                              
                            </div> 
                          
                           <div class="form-group">
                                 <label for="duration">Duration</label>
                                 <input value="<?php echo h($lounge['duration']); ?>" type="text" class="form-control" name="duration" />
                             </div>
                             
                             
                             
                             
                            <div class="form-group">
                                 <label for="Lounge image">Lounge image</label>
                                 <input type="file" name="image" />
                             </div>
                                
                                 
                                  
                                   
                            <div class="form-group">
                                 <label for="price">Price</label>
                                 <input value="<?php echo h($lounge['price']); ?>" type="text" class="form-control" name="price" />
                             </div>
                             
                             
                               <div class="form-group">
                                <label for="">Content:</label>
                                <textarea class="form-control" name="content" id="" cols="10" rows="5" value=""><?php echo h(u($lounge['content']));?></textarea>
                         
                               </div>
                           
                        
                             
                            
                          
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Create Lounge">
                                
                            </div>
 
                        </form>
                          </div>
                       
                     
                    
                 
            <!--   Form to create Location    -->
                     
           <!--     Table form          -->
                      
                <div class="col-xs-6">
                 
                 <?php 
                    
                 $breakfasts = find_all_breakfasts();
                 
                    
                    
                 ?>
                  
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <td>Id</td>
                              <td>Location</td>
                              <td>Product</td>
                              <td>Age Range</td>   
                              <td>Bundle Size</td>
                              <td>Price</td>
                              <td>View</td>
                              <td>Edit</td>
                              <td>Delete</td>
                          </tr>
                      </thead>
                      <thead>
                         
                         <?php  while($breakfast = mysqli_fetch_assoc($breakfasts)) {?>
                      
                          <tr>
                              <td><?php echo h($breakfast['breakfast_id']); ?></td>
                              <?php $location = find_location_by_id($breakfast['brkf_loc_id']); ?>
                              <td><?php echo h($location['loc_name']); ?></td>
                              
                               <?php $product = find_product_by_id($breakfast['brkf_pro_id']); ?>
                              
                              <td><?php echo h($product['product_name']); ?></td>
                              <td><?php echo h($breakfast['age_range']); ?></td>
                              <td><?php echo h($breakfast['bundle_size']); ?></td>
                              <td><?php echo h($breakfast['price']); ?></td>
                             
                              <td><a href="">View</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/edit_breakfast.php?id=' . h(u($breakfast['breakfast_id']))); ?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/delete_breakfast.php?id=' . h(u($breakfast['breakfast_id'])));?>">Delete</a></td>
                             
                             
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
             