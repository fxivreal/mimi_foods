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
                    <div class="col-lg-12" >
                        <h1 class="page-header">
                           <a href="<?php echo url_for('/staff/index.php')?>">Menu</a>
                            <small>Staff </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
             <div class="cols-xs-x6">
                 
                      <div class="col-xs-6">
                    
                 <h1>Page</h1>
                  
                          <a href="<?php echo url_for('/staff/pages/new.php')?>">Create new page</a><br/>
                  
 <?php


$id = isset($_GET['id']) ? $_GET['id'] : '1' ;


$subject = find_subject_by_id($id);
$page_set = find_pages_by_subject_id($id);

?>
<?php $page_title = 'Show Subject'?>

<?php include(SHARED_PATH . ('/staff_header.php')); ?>

<div id="content">
    
<a class="back-link" href="<?php echo url_for('/staff/subjects/index.php')?>">&laquo;Back to List</a>
    
    <br/>
<div class="subject show">
   <h1>Subject: <?php echo  h($subject['menu_name']);?></h1>
    
   
<div class="attributes">
    <dl>
        <dt>Menu Name</dt>
        <dd><?php echo h($subject['menu_name']); ?></dd>
    </dl>
    <dl>
        <dt>Position</dt>
        <dd><?php echo h($subject['position']); ?></dd>
    </dl>
    <dl>
        <dt>Visible</dt>
        <dd><?php echo $subject['visible']=='1' ? 'true' : 'false'; ?></dd>
    </dl>
</div>
   
    
</div>
    
<hr />

   <div id="pages listing">
    
<h2>Pages</h2>
    
<div class="actons">
 <a class="action" href="<?php echo url_for('/staff/pages/new.php?subject_id=' . h(u($subject['id']))); ?>">Create New Page</a>   
</div>
    
 <table class="list">
    
     <tr>
         <th>ID</th>
         <th>Position</th>
         <th>Visible</th>
         <th>Name</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
         <th>&nbsp;</th>
     </tr>
     
<?php while($page = mysqli_fetch_assoc($page_set)) { ?>
<?php $subject = find_subject_by_id($page['subject_id']); ?>
     <tr>
         <td><?php echo h($page['id']); ?></td>
         <td><?php echo h($page['position']); ?></td>
         <td><?php echo ($page['visible'] ) == 1 ? 'true' : 'false' ; ?></td>
         <td><?php echo h($page['menu_name']); ?></td>
          
         <td><a class="action" href="<?php echo url_for('/staff/pages/show.php? id= ' .  h(u($page['id']))); ?>">View</a></td>
         
         <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
         
         <td><a class="action" href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id'])));?>">Delete</a></td>  
        </tr>    
   <?php  } ?> 
    
 </table>

    <?php mysqli_free_result($page_set); ?> 
</div>  
  
    
</div>

<?php include(SHARED_PATH . ('/staff_footer.php'));?>


                  
                  
                  
                  
                  
                  
                  
                
                </div>
                 
                 
                 
             </div>

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include( SHARED_PATH . '/admin_footer.php');?>
