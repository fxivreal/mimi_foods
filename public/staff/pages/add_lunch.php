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
                            Create Lunch
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
                            
                            
                        $lunch = [];
                        $lunch['lunch_pro_id'] = $_POST['lunch_pro_id'] ?? '';
                        $lunch['lunch_loc_id'] = $_POST['lunch_loc_id'] ?? '';
                        $lunch['age_range']  = $_POST['age_range'] ?? '';
                        $lunch['bundle_size'] = $_POST['bundle_size'] ?? '';
                        $lunch['price'] = $_POST['price'] ?? '';
                    
                        $result = insert_lunch($lunch);
                            if($result === true ){
                        
                            redirect_to(url_for('/staff/pages/add_lunch.php'));
                             
                        }  else {
                            
                            $errors = $result;
                                
                        } 
                           
                       
                        }else{
                          
                        $lunch = [];
                        $lunch['lunch_pro_id'] = '';
                        $lunch['lunch_loc_id'] =  '';
                        $lunch['age_range']  =  '';
                        $lunch['bundle_size'] = '';
                        $lunch['price'] =  '';
                    
                        }
                    

                        ?>
                 
                       
                       
                          <?php echo display_errors($errors);?>
                        
                       
                        <form action="" method="post">
                          
                             <a href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to list</a>
                             
                      
                             <div class="form-group" class = "col-xs-4">
                               <label for="position">location:</label>
                               <select class="form-control" name="lunch_loc_id" id="" class="col-xs-6" >
                                    <?php


                                    $locations = find_all_locations();
                                    while($location = mysqli_fetch_assoc($locations))  {
                                    echo "<option value=\"" . h($location['loc_id']) . "\"";
                                   if($lunch['lunch_loc_id'] == $location['loc_id']){
                                    echo "selected";
                                    }
                                    echo ">" . h($location['loc_name']) . "</option>";
                                    }  
                                   
                                    mysqli_free_result($locations);                         
                                    ?>
                               </select>
                              
                            </div> 
                            
                            
                        <div class="form-group" class = "col-xs-4">
                               <label for="position">Products:</label>
                               <select class="form-control" name="lunch_pro_id" id="" class="col-xs-6" >
                                   <?php
                                   
                                  $product_set =  find_all_products();
                                   while($product = mysqli_fetch_assoc($product_set))  {
                                       echo "<option value=\"" . h($product['product_id']) . "\"";
                                       if($lunch['lunch_pro_id'] === $product['product_id']){
                                           echo "selected";
                                       }
                                       echo ">" . h($product['product_name']) . "</option>";
                                   }  
                                       
                                    mysqli_free_result($product_set);                         
                                   ?>
                               </select>
                              
                            </div> 
                   
                
                          
                           <div class="form-group">
                                 <label for="lunch New">Age Range</label>
                                 <input value="<?php echo h($lunch['age_range']); ?>" type="text" class="form-control" name="age_range" />
                             </div>
                             
                             
                             
                             
                            <div class="form-group">
                                 <label for="page New">Bundle Size</label>
                                 <input value="<?php echo h($lunch['bundle_size']); ?>" type="text" class="form-control" name="bundle_size" />
                             </div>
                                
                                 
                                  
                                   
                            <div class="form-group">
                                 <label for="page New">Price</label>
                                 <input value="<?php echo h($lunch['price']); ?>" type="text" class="form-control" name="price" />
                             </div>
                           
                        
                             
                            
                          
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Create Lunch">
                                
                            </div>
 
                        </form>
                          </div>
                       
                     
                    
                 
            <!--   Form to create Location    -->
                     
           <!--     Table form          -->
                      
                <div class="col-xs-6">
<!--
                 
                 <?php 
                    
                 $lunches = find_all_lunches();
                 
                    
                   
                 ?>
                  
-->
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
                         
                         <?php  while($lunch = mysqli_fetch_assoc($lunches)) {?>
                      
                          <tr>
                              <td><?php echo h($lunch['lunch_id']); ?></td>
                              <?php $location = find_location_by_id($lunch['lunch_loc_id']); ?>
                              <td><?php echo h($location['loc_name']); ?></td>
                              
                               <?php $product = find_product_by_id($lunch['lunch_pro_id']); ?>
                              
                              <td><?php echo h($product['product_name']); ?></td>
                              <td><?php echo h($lunch['age_range']); ?></td>
                              <td><?php echo h($lunch['bundle_size']); ?></td>
                              <td><?php echo h($lunch['price']); ?></td>
                             
                              <td><a href="">View</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/edit_lunch.php?id=' . h(u($lunch['lunch_id']))); ?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/delete_lunch.php?id=' . h(u($lunch['lunch_id'])));?>">Delete</a></td>
                             
                             
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
             