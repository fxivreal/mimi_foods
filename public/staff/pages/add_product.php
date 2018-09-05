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
                            Create Product
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
                        
//                        if(!isset($_GET['id'])){
//                            redirect_to(url_for('staff/pages/add_product.php'));
//                        }
                        
                        $product_id = $_GET['id'] ?? '1';
                        
                       
                        if(is_post_request()){
//                            
                         
                        $product = [];   
                        $product['product_loc_id'] = $_POST['product_loc_id'] ?? '';
                        $product['product_name'] = $_POST['product_name'] ?? '';
                        $product['content'] = $_POST['content'] ?? '';   
                    
                    
                        $product = insert_product($product);
                        if($product){
                            redirect_to(url_for('staff/pages/add_product.php'));
                        }
                            
                        }else{
                            
                            
                        $product = [];
                        $product['product_loc_id'] = ''; 
                        $product['product_name'] = ''; 
                        $product['content'] = '';   
                            
                        }
                            

//                      
//                        $products = find_all_products();
//                        while($product = mysqli_fetch_assoc($products))
//                         
//                        $product_count = mysqli_num_rows($products) + 1;
//                        mysqli_free_result($products);
//                         
                       
                        $product = find_product_by_id($product_id);
                
                      
                                         
                        ?>
                    
                       
                       
                          <?php echo display_errors($errors);?>
                           <a href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to list</a>
                        
                       
                        <form action="<?php echo url_for('/staff/pages/add_product.php'); ?>" method="post">
                          
                          
                         
                           
                            
                             <div class="form-group" class = "col-xs-4">
                               <label for="position">location:</label>
                               <select class="form-control" name="product_loc_id" id="" class="col-xs-6" >
                                    <?php


                                    $locations = find_all_locations();
                                    while($location = mysqli_fetch_assoc($locations))  {
                                    echo "<option value=\"" . h($location['loc_id']) . "\"";
                                    if($product['product_loc_id'] == $location['loc_id']){
                                    echo "selected";
                                    }
                                    echo ">" . h($location['loc_name']) . "</option>";
                                    }  

                                    mysqli_free_result($locations);                         
                                    ?>
                               </select>
                              
                            </div> 
                            
                            <div class="form-group">
                                 <label for="page New">Product Name</label>
                                 <input value="<?php echo h($product['product_name']); ?>" type="text" class="form-control" name="product_name" />
                             </div>
                    
                   
                   
                            <div class="form-group">
                                <label for="">Content:</label>
                                <textarea class="form-control" name="content" id="" cols="5" rows="2" value=""><?php echo h(u($product['content']));?></textarea>
                         
                         
                            </div>
                           
    
                          
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Create Product">
                                
                            </div>
 
                        </form>
                          </div>
                       
                     
                    
                 
            <!--   Form to create Location    -->
                     
           <!--     Table form          -->
                      
                <div class="col-xs-6">
                 
                 <?php 
                    
                 $products = find_all_products();
                 
                
                 ?>

                  
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <td>Id</td>
                              <td>Location</td>
                              <td>Product Name</td>
                              <td>Content</td>
                              <td>View</td>
                              <td>Edit</td>
                              <td>Delete</td>
                          </tr>
                      </thead>
                      <thead>
                         
                         <?php 
                          
                          while($product = mysqli_fetch_assoc($products)) {?>
                      
                          <tr>
                              <td><?php echo h($product['product_id']); ?></td>
                              <?php $location = find_location_by_id($product['product_loc_id']); ?>
                              <td><?php echo h($location['loc_name']); ?></td>
                              <td><?php echo h($product['product_name']); ?></td>
                              <td><?php echo h($product['content']); ?></td>
                              
                      
                              <td><a href="">View</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/edit_product.php?id=' . h(u($product['product_id'])))?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/pages/delete_product.php?id=' . h(u($product['product_id'])));?>">Delete</a></td>
                             
                             
                          </tr>
                          
                    <?php } ?>
                      </thead>
                  </table>
                    
                    
-->
                </div>
                  
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
             