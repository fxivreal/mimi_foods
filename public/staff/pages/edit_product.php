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
                          Edit Product
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
                            redirect_to(url_for('/staff/pages/add_product.php'));
                        }
                        
                        $product_id = $_GET['id'];
                       
                        if(is_post_request()){
                            
                         
                        $product = [];  
                        $product['product_id'] = $product_id;
                        $product['product_loc_id'] = $_POST['product_loc_id'] ?? '';
                        $product['product_name'] = $_POST['product_name'] ?? '';
                        $product['content'] = $_POST['content'] ?? '';   
                    
                    
                        $product = update_product($product);
                            if($product === true){
                                redirect_to(url_for('/staff/pages/add_product.php'));
                            }else{
                                $errors = $product;
                            }
                              
                        }else {

                          $product = find_product_by_id($product_id);

                            
                        }
                     
                                         
                        ?>
                    
                       
                          <?php //echo display_errors($errors);?>
                           <a href="<?php echo url_for('/staff/pages/index.php');?>">&laquo; Back to list</a>
                        
                       
                        <form action="" method="post">
                          
                            
                             <div class="form-group" class = "col-xs-4">
                               <label for="position">location:</label>
                               <select class="form-control" name="product_loc_id" id="" class="col-xs-6" >
                                    <?php


                                    $locations = find_all_locations();
                                    while($location = mysqli_fetch_assoc($locations))  {
                                    echo "<option value=\"" . h($location['loc_id']) . "\"";
                                    if($product['product_loc_id'] === $location['loc_id']){
                                    echo "selected";
                                    }
                                    echo ">" . h($location['loc_name']) . "</option>";
                                    }  

                                    mysqli_free_result($locations);                         
                                    ?>
                               </select>
                              
                            </div> 
                   
                   
                
                          
                           <div class="form-group">
                                 <label for="product_name">Product Name</label>
                                 <input value="<?php echo h($product['product_name']); ?>" type="text" class="form-control" name="product_name" >
                             </div>
                    

                              
                            <div class="form-group">
                                <label for="">Content:</label>
                                <textarea class="form-control" name="content" id="" cols="5" rows="2" value=""><?php echo h(u($product['content']));?></textarea>
                         
                         
                            </div>
                           
    
                          
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Edit Product">
                                
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
             