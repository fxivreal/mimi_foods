<?php require_once('../../../private/initialize.php')?>
  
          
                    
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
                            Edit Location
                            <small>FELIX</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            
                        </ol>
                    </div>
                    </div>
                  <!--   Form to create Location    -->
                  
                  
                     
                  
                
                    <div class="col-xs-6">
                       
                       <?php
                        
                        if(!isset($_GET['loc_id'])){
                            
                           redirect_to(url_for('staff/subjects/locations.php'));;
                            
                        }
                        
                        $loc_id = $_GET['loc_id'] ?? '';
                       
                    
                            
                        if(is_post_request()) {
                        
                       $location = []; 
                       $location['loc_id'] = $loc_id;
                       $location['country'] = $_POST['country'] ?? '';
                       $location['state'] = $_POST['state'] ?? '';
                       $location['address'] = $_POST['address'] ?? '';
                       $location['loc_name'] = $_POST['loc_name'] ?? '';
                            
                       $location = update_location($location);
                          
                             if($result === true) {
                       redirect_to(url_for('staff/subjects/locations.php')) ; 
                      
                       } else {
                    
                      // $errors = $result;
                    // var_dump($errors);
                       }
                  
                
                       }else{
                        $location = find_location_by_id($loc_id);
                        

                        }
                        
                    
                        ?>
                        
                      
                        <form action="<?php echo url_for('/staff/subjects/edit_location.php?loc_id=' . h(u($location['loc_id']))); ?>" method="post">
                       
                           
                          <div class="form-group">
                                 <label for="Country">Country</label>
                                 <input type="text" value="<?php echo h($location['country']); ?>" class="form-control" name="country">
                             </div>
                
                   
                           
                            <div class="form-group" class ="col-xs-4">
                               
                                 <label for="state">State:</label>
                                 <input value="<?php echo h($location['state']); ?>" type="text" class="form-control" name="state">
                             </div>
                           
                             
                          
                             <div class="form-group">
                                 <label for="location name">Location Name:</label>
                                 <input value="<?php echo h(u($location['loc_name']));?>" type="text" class="form-control" name="loc_name">
                             </div>
                           
                            
                            <div class="form-group">
                                <label for="">Address:</label>
                                <textarea class="form-control" name="address" id="" cols="5" rows="2" value=""><?php echo h(u( $location['address']));?></textarea>
                         
                         
                            </div>
                           
                            
                         
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Update Location">
                                
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
             