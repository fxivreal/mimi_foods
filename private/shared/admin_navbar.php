

               <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Mimi Foods Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
               <li><a href="<?php echo url_for('index.php')?>">Home</a></li>
               
               
               
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                       
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#location_dropdown"><i class="fa fa-fw fa-arrows-v"></i>locations<i class="fa fa-fw fa-caret-down"></i></a>
                        
                        <ul id="location_dropdown" class="collapse">
                            <li>
                                <a href="#"></a>
                            </li>
                            <li>
                                <a href="<?php echo url_for('../public/staff/subjects/locations.php'); ?>">Create Location</a>
                            </li>
                            <li>
                                <a href="#">View Locations</a>
                            </li>
                            
                        </ul>
                    </li> <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#product_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Products<i class="fa fa-fw fa-caret-down"></i></a>
                        
                        <ul id="product_dropdown" class="collapse">
                            <li>
                                <a href="#"></a>
                            </li>
                            <li>
                                <a href="<?php echo url_for('/staff/pages/add_product.php')?>">Create Product</a>
                            </li>
                            <li>
                                <a href="#">View Products</a>
                            </li>
                           
                        </ul>
                    </li>
                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#meal_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Meals <i class="fa fa-fw fa-caret-down"></i></a>
                        
                        <ul id="meal_dropdown" class="collapse">
                            <li>
                                <a href="<?php echo url_for('/staff/pages/add_breakfast.php')?>">Breakfast</a>
                            </li>
                            <li>
                                <a href="<?php echo url_for('/staff/pages/add_lunch.php')?>">Launch</a>
                            </li>
                            <li>
                                <a href="<?php echo url_for('/staff/pages/add_dinner.php')?>">Dinner</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#facility"><i class="fa fa-fw fa-arrows-v"></i> Facilities<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="facility" class="collapse">
                            <li>
                                <a href="#">lounge</a>
                            </li>
                            <li>
                                <a href="#">meeting rooms</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"> </i>Users</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"> </i>Birthdays</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i>Staffs</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i>Orders</a>
                    </li>
                   
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-wrench"></i> Sales</a>
                    </li>s
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-wrench"></i> Sales Report</a>
                    </li>
                  
                     <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Settings</a>
                    </li>
                    
                    
                   
                </ul>
            </div>
             </nav>