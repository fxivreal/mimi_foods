<?php

// is_blank('abcd)
// * validation date presence
// * uses trim() so empty spaces don't count
// * uses === so avoid false positives
// * better than empty() which considers "0" to be empty
function is_blank($value){
    return !isset($value) || trim($value) === '';
}

// has_presence('abcd')
// * validate data presence
// * reverse of is_blank()
// * i prefer validation name with "has_"
function has_presence($value) {
    return !is_blank($value);
}

// has_lenght_greatesr_than('abcd' , 3)
// * validate string length
// * space count towards length
// * uses trim() if space do not count
function has_length_greater_than($value, $min){
    $length = strlen($value);
    return $length > $min;
}

// has_length_less_than('adcb', 7)
// * validate string length
// * space count towards length
// * uses trim() if trim should not count_chars
function has_length_less_than($value, $max){
    $length = strlen($value);
    return $length < $max;
}

// has_length_exactly('abcd, 4')
// * validate string length
// * spaces count towards length
//* uses trim() if spaces should not count
function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
}

// has_length, ['min' => 3, 'max' => 5])
// * validate string length
// * combines functions_greater_than, less_than, _exactly
// * spaces count towards length
// * uses trim() if spaces should not count
function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
        return false;
    }elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] +1)) {
        return false; 
    }elseif(isset($options['exact']) && !has_length_less_than($value, $options['exact'] +1)) {
        return false; 
    }else{  
        return true;
    }
    }
           
// has_inclusion_of(5, [1,3,5,7,9])
// * validation inclusion in a set
function has_inclusion_of($value, $set) {
    return in_array($value, $set);
}
            
            
 // has_exclusion_of(5, [1,3,5,7,9])
// * validation inclusion in a set
function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
}
            
 // has_string('nobody@nowhere.com, '.com')
// * validate inclusion of character(s)
// * strpos returns string start position or false
// * uses !== to prevent position 0 from being considered false
// * strpos os faster than preg_match()
function has_string($value, $required_string){
    return strpos($value, $required_string) !== false;
}
            
// has_valid_email_format('nobody@nowhere.com')
// * validate correct formate for email address
// * format: [chars]@[chars].[2 + letters]
// * preg_match is helpful, uses a regular expression
// return 1 for a match, 0 for no match
// http://php.net/manual/en/function.preg-match.php
function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
}

// has_unique_page_menu_name('History')
// * validate the uniqueness of page.menu_name
// * For new records provide only the menu_name
// * For existing records, provide current ID as second argument
// * has_unique_page_menu_name('History' 4)
function has_unique_page_menu_name($menu_name, $current_id="0"){
    global $db;
    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE menu_name='" .  db_escape($db, $menu_name) . "' ";
    $sql .= "AND id != '" .  db_escape($db, $current_id) . "'"; 
    
    $page_set = mysqli_query($db, $sql);
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);
        
        return $page_count === 0;
}
          
// has_unique_page_username('fxivreal')
// * validate the uniqueness of page.username
// * For new records provide only the username
// * For existing records, provide current ID as second argument
// * has_unique_page_menu_name('fxivreal' 4)
function has_unique_admin_username($username, $id = "0"){

    global $db;
    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='".  $username . "' ";
    $sql .= "AND id != '" .  db_escape($db, $id) . "'"; 
    
    $page_set = mysqli_query($db, $sql);
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);
        
        return $page_count === 0;
}
         
?>