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
                           Create Location
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
                        <form action="" method="post">
                           
                           
                           
                           <?php
                            
                             $country = '';  
                              $state = '';  
                              $address = '';  
                              $loc_name  = '';
                            
                            if(is_post_request()){
                                
                            $location = [];   
                            $location['country'] = $_POST['country'] ?? '';
                            $location['state'] = $_POST['state'] ?? '';
                            $location['address'] = $_POST['address'] ?? '';
                            $location['loc_name']= $_POST['loc_name'] ?? '';
                            
                            
                            $result = insert_location($location);
                            
                                
                            }
                           
                            ?>
                            
                            <div class="form-group">
                                 <label for="Country">Country</label>
                                 <input type="text" value="<?php echo h($country); ?>" class="form-control" name="country" >
                             </div>
                   
                           
                            <div class="form-group" class ="col-xs-4">
                               <label for="state">State:</label>
                              <select class="form-control" name="state" id="" class="col-xs-6" >
                                   <option value="">Select State</option>
                                   <option value="lagos">Lagos</option>
                                   <option value="ibadan">Ibadan</option>
                                   <option value="kano">Kano</option>
                                   <option value="abia">Abia</option>
                                 
                               
                              </select>
                            </div> 
                           
                             <div class="form-group">
                                 <label for="location name">Location Name:</label>
                                 <input value="<?php echo h(u($loc_name)); ?>" type="text" class="form-control" name="loc_name">
                             </div>
                             
                            
                            <div class="form-group">
                                <label for="">Address:</label>
                                <textarea class="form-control" name="address" id="" cols="5" rows="2" value=""><?php echo h(u($address)); ?></textarea>
                                
                            </div>
                            
                             
                         
                            
                            <div class="form-group">
                               <input class="btn btn-success" type="submit" name="submit" value="Create Location">
                                
                            </div>
 
                        </form>
                          </div>
                    
                 
            <!--   Form to create Location    -->
                     
           <!--     Table form          -->
                      
                <div class="col-xs-6">
                 
                 <?php 
                    
                 $locations = find_all_locations();
                 
                    
                    
                 ?>
                  
                  <table class="table table-bordered table-hover">
                      <thead>
                          <tr>
                              <td>Id</td>
                              <td>Country</td>
                              <td>State</td>
                              <td>Address</td>
                              <td>Location Name</td>
                              <td>View</td>
                              <td>Edit</td>
                              <td>Delete</td>
                          </tr>
                      </thead>
                      <thead>
                         
                         <?php  while($location = mysqli_fetch_assoc($locations)) {?>
                      
                          <tr>
                              <td><?php echo h($location['loc_id']); ?></td>
                              <td><?php echo h($location['country']); ?></td>
                              <td><?php echo h($location['state']); ?></td>
                              <td><?php echo h($location['address']); ?></td>
                              <td><?php echo h($location['loc_name']); ?></td>
                              
                      
                              <td><a href="">View</a></td>
                              <td><a href="<?php echo url_for('/staff/subjects/edit_location.php?loc_id=' . h(u($location['loc_id']))); ?>">Edit</a></td>
                              <td><a href="<?php echo url_for('/staff/subjects/loc_delete.php?loc_id=' . h(u($location['loc_id']))); ?>">Delete</a></td>
                             
                             
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
             