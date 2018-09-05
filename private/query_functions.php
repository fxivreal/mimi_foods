<?php

function insert_location($location){
    global $db;

        $sql = "INSERT INTO locations ";
        $sql .= "(country, state, address, loc_name) ";
        $sql .= "VALUES(";
        $sql .= "'" . $location['country'] . "',";
        $sql .= "'" . $location['state'] . "',";
        $sql .= "'" . $location['address'] . "',";
        $sql .= "'" . $location['loc_name'] . "'";
        $sql .= ")";

        $location = mysqli_query($db, $sql);
        // For INSERT statement, $result is true/false
        if($location) {
            $new_id = mysqli_insert_id($db);
            
        //    redirect_to(url_for('/staff/subjects/locations.php'));
  return true;
        } else {
        // insert failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
        }
        }

function find_all_locations(){
    global $db;
    

        $sql = "SELECT * FROM locations ";
        $sql .= "ORDER BY loc_id ASC";
        $locations = mysqli_query($db, $sql);
        if(!$locations){
        die("QUERY FAILED" . mysqli_error($db));
        } else {
        return $locations;
        }
}

function find_location_by_id($loc_id){
   global $db;

      
        $sql = "SELECT * FROM locations ";
        $sql .= "WHERE loc_id='" . db_escape($db, $loc_id) . "' ";
       // $sql .= "LIMIT 1";  
        $result = mysqli_query($db, $sql);
        comfirm_result_set($result);
    
        $location = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $location;// Returns an assoc array
}

function update_location($location){
    global $db; 
    
    $sql = "UPDATE locations SET ";
    $sql .= "country='" . $location['country'] . "', ";
    $sql .= "state='" . $location['state'] . "', ";
    $sql .= "address='" . $location['address'] . "', ";
    $sql .= "loc_name='" . $location['loc_name'] . "' ";
    
    $sql .= "WHERE loc_id='" . db_escape($db, $location['loc_id']) . "' ";
    $sql .="LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result){

    redirect_to(url_for('staff/subjects/locations.php'));

    }else{

    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
}

function delete_location($loc_id){
    global $db;
    
    $sql = "DELETE FROM locations ";
    $sql .= "WHERE loc_id='" . db_escape($db, $loc_id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
  redirect_to(url_for('staff/subjects/locations.php'));
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }

function insert_product($product){
    global $db;

//    $errors = validate_page($page);
//    if(!empty($errors)){
//        return $errors;
//    }
    
    $sql  = "INSERT INTO products ";
    $sql .= "(product_loc_id, product_name, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $product['product_loc_id']) . "', ";
    $sql .= "'" . db_escape($db, $product['product_name']) . "', ";
    $sql .= "'" . db_escape($db, $product['content']) . "' ";
    $sql .= ")"; 
    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

    }

function insert_breakfast($breakfast){
    global $db;

//    $errors = validate_page($page);
//    if(!empty($errors)){
//        return $errors;
//    }
    
    $sql  = "INSERT INTO breakfasts ";
    $sql .= "(brkf_loc_id, brkf_pro_id, age_range, bundle_size, price) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $breakfast['brkf_loc_id']) . "', ";
    $sql .= "'" . db_escape($db, $breakfast['brkf_pro_id']) . "', ";
    $sql .= "'" . db_escape($db, $breakfast['age_range']) . "', ";
    $sql .= "'" . db_escape($db, $breakfast['bundle_size']) . "', ";
    $sql .= "'" . db_escape($db, $breakfast['price']) . "' ";
    $sql .= ")"; 
    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

    }

function find_all_breakfasts(){
    global $db;
    

        $sql = "SELECT * FROM breakfasts ";
        $sql .= "ORDER BY breakfast_id ASC ";
        $breakfasts = mysqli_query($db, $sql);
        comfirm_result_set($breakfasts);
        return $breakfasts;
        }

function find_breakfast_by_id($id){
    global $db;
    
    $sql = "SELECT * FROM breakfasts ";
    $sql .= "WHERE breakfast_id='" . db_escape($db, $id ) . "'";
    $result = mysqli_query($db, $sql);
    comfirm_result_set($result);

    $breakfast = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $breakfast;
}

function update_breakfasts($breakfast){
    global $db;
    
//    $errors = validate_page($products);
//    if (!empty($errors)){
//        return $errors;
//    }
    
  $sql = "UPDATE breakfasts SET "; 
  $sql .= "brkf_loc_id='" . db_escape($db, $breakfast['brkf_loc_id']) . "', ";
  $sql .= "brkf_pro_id='" . db_escape($db, $breakfast['brkf_pro_id']) . "', ";  
  $sql .= "age_range='" . db_escape($db, $breakfast['age_range']) . "', ";
  $sql .= "bundle_size='" . db_escape($db, $breakfast['bundle_size']) . "', ";
  $sql .= "price='" . db_escape($db, $breakfast['price']) . "' ";
  $sql .= "WHERE breakfast_id='" . db_escape($db, $breakfast['breakfast_id']) . "' ";
  
  $sql .= "LIMIT 1"; 

  $result = mysqli_query($db, $sql); 
 if ($result){
   return true;
}else{
    echo mysqli_error($db);
   db_disconnect($db);
    exit;         

}
}

function delete_breakfast($id){
    global $db;
    
    $sql = "DELETE FROM breakfasts ";
    $sql .= "WHERE breakfast_id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
  redirect_to(url_for('staff/pages/add_breakfast.php'));
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }


function insert_lunch($lunch){
    global $db;

//    $errors = validate_page($page);
//    if(!empty($errors)){
//        return $errors;
//    }
    
    $sql  = "INSERT INTO lunches ";
    $sql .= "(lunch_loc_id, lunch_pro_id, age_range, bundle_size, price) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $lunch['lunch_loc_id']) . "', ";
    $sql .= "'" . db_escape($db, $lunch['lunch_pro_id']) . "', ";
    $sql .= "'" . db_escape($db, $lunch['age_range']) . "', ";
    $sql .= "'" . db_escape($db, $lunch['bundle_size']) . "', ";
    $sql .= "'" . db_escape($db, $lunch['price']) . "' ";
    $sql .= ")"; 
    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

    }

function find_all_lunches(){
    global $db;
    

        $sql = "SELECT * FROM lunches ";
        $sql .= "ORDER BY lunch_id ASC ";
        $lunches = mysqli_query($db, $sql);
        comfirm_result_set($lunches);
        return $lunches;
        }

function find_lunch_by_id($id){
    global $db;
    
    $sql = "SELECT * FROM lunches ";
    $sql .= "WHERE lunch_id='" . db_escape($db, $id ) . "'";
    $result = mysqli_query($db, $sql);
    comfirm_result_set($result);

    $lunch = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $lunch;
}

function update_lunch($lunch){
    global $db;
    
//    $errors = validate_page($products);
//    if (!empty($errors)){
//        return $errors;
//    }
    
  $sql = "UPDATE lunches SET "; 
  $sql .= "lunch_loc_id='" . db_escape($db, $lunch['lunch_loc_id']) . "', ";
  $sql .= "lunch_pro_id='" . db_escape($db, $lunch['lunch_pro_id']) . "', ";  
  $sql .= "age_range='" . db_escape($db, $lunch['age_range']) . "', ";
  $sql .= "bundle_size='" . db_escape($db, $lunch['bundle_size']) . "', ";
  $sql .= "price='" . db_escape($db, $lunch['price']) . "' ";
  $sql .= "WHERE lunch_id='" . db_escape($db, $lunch['lunch_id']) . "' ";
  
  $sql .= "LIMIT 1"; 

  $result = mysqli_query($db, $sql); 
 if ($result){
   return true;
}else{
    echo mysqli_error($db);
   db_disconnect($db);
    exit;         

}
}

function delete_lunch($lunch_id){
    global $db;
    
    $sql = "DELETE FROM lunches ";
    $sql .= "WHERE lunch_id='" . db_escape($db, $brkf_id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
  redirect_to(url_for('staff/pages/add_lunch.php'));
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }


function insert_lounge($lounge){
    global $db;

//    $errors = validate_page($page);
//    if(!empty($errors)){
//        return $errors;
//    }
    
    $sql  = "INSERT INTO lounges ";
    $sql .= "(loc_lounge_id, duration,lounge_image, price, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $lounge['loc_lounge_id']) . "', ";
    $sql .= "'" . db_escape($db, $lounge['duration']) . "', ";
    $sql .= "'" . db_escape($db, $lounge['lounge_image']) . "', ";
    $sql .= "'" . db_escape($db, $lounge['price']) . "', ";
    $sql .= "'" . db_escape($db, $lounge['content']) . "' ";
    $sql .= ")"; 
    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

    }

function find_all_lounges(){
    global $db;
    

        $sql = "SELECT * FROM lounges ";
        $sql .= "ORDER BY lounge_id ASC ";
        $lounges = mysqli_query($db, $sql);
        comfirm_result_set($lounges);
        return $lounges;
        }

function find_lounge_by_id($id){
    global $db;
    
    $sql = "SELECT * FROM lounges ";
    $sql .= "WHERE lounge_id='" . db_escape($db, $id ) . "'";
    $result = mysqli_query($db, $sql);
    comfirm_result_set($result);

    $lounge = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $lunch;
}

function update_lounge($lounge){
    global $db;
    
//    $errors = validate_page($products);
//    if (!empty($errors)){
//        return $errors;
//    }
    
  $sql = "UPDATE lounges SET "; 
  $sql .= "loc_lounge_id='" . db_escape($db, $lounge['loc_lounge_id']) . "', ";
  $sql .= "duration='" . db_escape($db, $lounge['duration']) . "', ";  
  $sql .= "lounge_image='" . db_escape($db, $lounge['lounge_image']) . "', ";  
  $sql .= "price='" . db_escape($db, $lounge['price']) . "' ";
  $sql .= "content='" . db_escape($db, $lounge['content']) . "' ";
  $sql .= "WHERE lounge_id='" . db_escape($db, $lounge['lounge_id']) . "' ";
  
  $sql .= "LIMIT 1"; 

  $result = mysqli_query($db, $sql); 
 if ($result){
   return true;
}else{
    echo mysqli_error($db);
   db_disconnect($db);
    exit;         

}
}

function delete_lounge($lounge_id){
    global $db;
    
    $sql = "DELETE FROM lounges ";
    $sql .= "WHERE lounge_id='" . db_escape($db, $lounge_id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
  redirect_to(url_for('staff/pages/add_lounge.php'));
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }


function insert_dinner($dinner){
    global $db;

//    $errors = validate_page($page);
//    if(!empty($errors)){
//        return $errors;
//    }
    
    $sql  = "INSERT INTO dinners ";
    $sql .= "(dinner_loc_id, dinner_pro_id, age_range, bundle_size, price) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $dinner['dinner_loc_id']) . "', ";
    $sql .= "'" . db_escape($db, $dinner['dinner_pro_id']) . "', ";
    $sql .= "'" . db_escape($db, $dinner['age_range']) . "', ";
    $sql .= "'" . db_escape($db, $dinner['bundle_size']) . "', ";
    $sql .= "'" . db_escape($db, $dinner['price']) . "' ";
    $sql .= ")"; 
    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

    }

function find_all_dinners(){
    global $db;
    

        $sql = "SELECT * FROM dinners ";
        $sql .= "ORDER BY dinner_id ASC ";
        $dinners = mysqli_query($db, $sql);
        comfirm_result_set($dinners);
        return $dinners;
        }

function find_dinner_by_id($id){
    global $db;
    
    $sql = "SELECT * FROM dinners ";
    $sql .= "WHERE dinner_id='" . db_escape($db, $id ) . "'";
    $result = mysqli_query($db, $sql);
    comfirm_result_set($result);

    $dinner = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $dinner;
}

function update_dinners($dinner){
    global $db;
    
//    $errors = validate_page($products);
//    if (!empty($errors)){
//        return $errors;
//    }
    
  $sql = "UPDATE dinners SET "; 
  $sql .= "dinner_loc_id='" . db_escape($db, $dinner['dinner_loc_id']) . "', ";
  $sql .= "dinner_pro_id='" . db_escape($db, $dinner['dinner_pro_id']) . "', ";  
  $sql .= "age_range='" . db_escape($db, $dinner['age_range']) . "', ";
  $sql .= "bundle_size='" . db_escape($db, $dinner['bundle_size']) . "', ";
  $sql .= "price='" . db_escape($db, $dinner['price']) . "' ";
  $sql .= "WHERE dinner_id='" . db_escape($db, $dinner['dinner_id']) . "' ";
  
  $sql .= "LIMIT 1"; 

  $result = mysqli_query($db, $sql); 
 if ($result){
   return true;
}else{
    echo mysqli_error($db);
   db_disconnect($db);
    exit;         

}
}

function delete_dinner($dinner_id){
    global $db;
    
    $sql = "DELETE FROM dinners ";
    $sql .= "WHERE dinner_id='" . db_escape($db, $dinner_id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
  redirect_to(url_for('staff/pages/add_dinner.php'));
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }


function update_product($product){
    global $db;
    
//    $errors = validate_page($products);
//    if (!empty($errors)){
//        return $errors;
//    }
    
  $sql = "UPDATE products SET "; 
  $sql .= "product_loc_id='" . db_escape($db, $product['product_loc_id']) . "', ";//
  $sql .= "product_name='" . db_escape($db, $product['product_name']) . "', "; 
  
  $sql .= "content='" . db_escape($db, $product['content']) . "' ";
  $sql .= "WHERE product_id='" . db_escape($db, $product['product_id']) . "' ";
  $sql .= "LIMIT 1"; 

  $result = mysqli_query($db, $sql); 
 if ($result){
   return true;
}else{
    echo mysqli_error($db);
   db_disconnect($db);
    exit;         

}
}

function find_product_by_id($product_id){
   global $db;

      
        $sql = "SELECT * FROM products ";
        $sql .= "WHERE product_id='" . db_escape($db, $product_id) . "' "; 
        $result = mysqli_query($db, $sql);
        comfirm_result_set($result);
    
        $product = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $product;// Returns an assoc array
}

function find_all_products(){
    global $db;
    

        $sql = "SELECT * FROM products ";
        $sql .= "ORDER BY product_id ASC ";
        $products = mysqli_query($db, $sql);
        comfirm_result_set($products);
        return $products;
        }

function delete_product($id){
    global $db;
    
    $sql = "DELETE FROM products ";
    $sql .= "WHERE product_id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
  return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }


function find_all_subjects(){
    global $db;
   

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC ";
    $result_set = mysqli_query($db, $sql);
    comfirm_result_set($result_set);
     return $result_set;
}

function validate_subject($subject){    
   $errors = [];
    
    // menu_name
    if(is_blank($subject['menu_name'])) {
        $errors[] = "Name cannot be blank."; 
    }elseif(!has_length($subject['menu_name'], ['min' => 2, 'max'=> 255])){
        $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // make sure weare working with an integer
    $position_int = (int) $subject['position'];
    if($position_int <= 0) {
        $errors[] = "Position must be greater than zero.";
    }
    if($position_int > 999) {
        $errors[] = "Position must be less than 999.";
    }
    
    // visible
    // make sure we are working with a string
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
        $errors[] = "visible must be true or false.";
    }
   return $errors; 
    
}

function find_subject_by_id($id){
    global $db;
    
    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $result = mysqli_query($db, $sql);
    comfirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function delete_subject($id){
    global $db;
    
    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
    redirect_to(url_for('/staff/subjects/index.php'));
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }

function insert_subject($subject){
    global $db;

     $errors = validate_subject($subject);
     if(!empty($errors)){
        return $errors;
    }
   

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "'" . db_escape($db, $subject['position']) . "', ";
    $sql .= "'" . db_escape($db, $subject['visible']) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

    }

function update_subject($subject){
    global $db;
    
    $errors = validate_subject($subject);
    if(!empty($errors)){
        return $errors;
    }
   
    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    if($result){
   return true;
    }else{

    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }
    }

function update_page($page){
    global $db;
    
    $errors = validate_page($page);
    if (!empty($errors)){
        return $errors;
    }
    
  $sql = "UPDATE pages SET "; 
  $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";//
  $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', "; 
  $sql .= "position='" . db_escape($db, $page['position']) . "', "; 
  $sql .= "visible='" . db_escape($db, $page['visible']) . "', "; 
  $sql .= "content='" . db_escape($db, $page['content']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
  $sql .= "LIMIT 1"; 

  $result = mysqli_query($db, $sql); 
 if ($result){
   return true;
}else{
    echo mysqli_error($db);
   db_disconnect($db);
    exit;         

}
}

function find_all_pages(){
    global $db;
   

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    comfirm_result_set($result);
     return $result;
}

function find_page_by_id($id){
    global $db;
    
    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id ) . "'";
    $result = mysqli_query($db, $sql);
    comfirm_result_set($result);

    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;
}

function find_pages_by_subject_id($subject_id, $options=[]) {
    global $db;
    
        
$visible =  isset($options['visible']) ? $options['visible'] : false;  
    
        
$sql = "SELECT * FROM pages ";
$sql .= "WHERE subject_id='" . db_escape($db, $subject_id) . "' ";
if($visible) {
    $sql .= "AND visible =true ";
}
$sql .= "ORDER BY position ASC";
$result = mysqli_query($db, $sql);
    
comfirm_result_set($result);
 return $result;

} 

function insert_page($page){
    global $db;

    $errors = validate_page($page);
    if(!empty($errors)){
        return $errors;
    }
    
    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "'" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "'" . db_escape($db, $page['position']) . "', ";
    $sql .= "'" . db_escape($db, $page['visible']) . "', ";
    $sql .= "'" . db_escape($db, $page['content']) . "' ";
    $sql .= ")"; 
    $result = mysqli_query($db, $sql);

    if($result){
    return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
    }

    }

function delete_page($id){
    global $db;
    
    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result){
  return true;
    }else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;  
    }

    }

function validate_page($page){
    $errors  = [];
    
    // subject_id
    
    if(is_blank($page['subject_id'])) {
        $errors[] = "Subject cant't be blank.";
    }
    
    //menu name
        
      if(is_blank($page['menu_name'])) {
        $errors[] = "Name cannot be blank."; 
    }elseif(!has_length($page['menu_name'], ['min' => 2, 'max'=> 255])){
        $errors[] = "Name must be between 2 and 255 characters.";
    }
    $current_id = $page['id'] ??  '0';
    
    if(!has_unique_page_menu_name($page['menu_name'], $current_id)){
        $errors[] = "Menu name must be unique.";   
    }
    
    // position
    // Make sure we are working with integer
    $position_int = (int)$page['position'];
    if ($position_int <= 0){
        $errors[] = "Position must be greater than zero.";
    }
    if($position_int > 999){
        $errors[] ="Position must be less than 999.";
    }
    
    // visible
    // make sure we are working with string
    $visible_str = (string)$page['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])){
        $errors[] = "Visible must be true or false.";
    }
    //content
    
    if(is_blank($page['content'])){
        $errors[] = "Content can't be blank.";
    }
    return $errors;
}

?>
    
