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
                          Edit Dinner
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
                        
                        if(!isset($_GET['id'])){
                            redirect_to(url_for('/staff/pages/add_dinner.php'));
                        }
                        
                        $dinner_id = $_GET['id'];
                       
                        if(is_post_request()){
                            
                           
                        $dinner = [];
                        $dinner['dinner_id'] = $dinner_id;
                        $dinner['dinner_pro_id'] = $_POST['dinner_pro_id'] ?? '';
                        $dinner['dinner_loc_id'] = $_POST['dinner_loc_id'] ?? '';
                        $dinner['age_range']  = $_POST['age_range'] ?? '';
                        $dinner['bundle_size'] = $_POST['bundle_size'] ?? '';
                        $dinner['price'] = $_POST['price'] ?? '';
                    
                        $dinner = update_dinners($dinner);
                            if($dinner === true){
                                redirect_to(url_for('/staff/pages/add_dinner.php'));
                            }else{
                                $errors = $dinner;
                            }
                              
                        }else {

                          $dinner = find_dinner_by_id($dinner_id);

                            
                        }
                     
                                         
                        ?>
                    
                       
                          <?php //echo display_errors($errors);?>
                           
                        
                      <form action="" method="post">
                          
                             <a href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to list</a>
                             
                      
                             <div class="form-group" class = "col-xs-4">
                               <label for="position">location:</label>
                               <select class="form-control" name="dinner_loc_id" id="" class="col-xs-6" >
                                    <?php


                                    $locations = find_all_locations();
                                    while($location = mysqli_fetch_assoc($locations))  {
                                    echo "<option value=\"" . h($location['loc_id']) . "\"";
                                   if($dinner['dinner_loc_id'] == $location['loc_id']){
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
                               <select class="form-control" name="brkf_pro_id" id="" class="col-xs-6" >
                                   <?php
                                   
                                  $product_set =  find_all_products();
                                   while($product = mysqli_fetch_assoc($product_set))  {
                                       echo "<option value=\"" . h($product['product_id']) . "\"";
                                       if($dinner['dinner_pro_id'] === $product['product_id']){
                                           echo "selected";
                                       }
                                       echo ">" . h($product['product_name']) . "</option>";
                                   }  
                                       
                                    mysqli_free_result($product_set);                         
                                   ?>
                               </select>
                              
                            </div> 
                   
                
                          
                           <div class="form-group">
                                 <label for="page New">Age Range</label>
                                 <input value="<?php echo h($dinner['age_range']); ?>" type="text" class="form-control" name="age_range" />
                             </div>
                             
                             
                             
                             
                            <div class="form-group">
                                 <label for="page New">Bundle Size</label>
                                 <input value="<?php echo h($dinner['bundle_size']); ?>" type="text" class="form-control" name="bundle_size" />
                             </div>
                                
                                 
                                  
                                   
                            <div class="form-group">
                                 <label for="page New">Price</label>
                                 <input value="<?php echo h($dinner['price']); ?>" type="text" class="form-control" name="price" />
                             </div>
                           
                        
                             
                            
                          
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Create Breakfast">
                                
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
             