<?php
include './includes/config.php';
include './includes/dbconnect.php';

function get_all_libsys_books($b_status){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_books WHERE b_status='".$b_status."' ");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function get_all_libsys_students(){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_students ");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function get_all_libsys_admin(){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_admin ");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function get_all_libsys_issue() {
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_issue");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function get_std_issue_info_by_sID($s_id) {
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_issue WHERE i_student_id='".$s_id."' ");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function get_student_info_by_id($s_id){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_students WHERE s_id='".$s_id."'");
    if($query){
        $var = mysqli_fetch_array($query);
    }
    return $var;
}

function get_student_info_by_code($s_code){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_students WHERE s_code='".$s_code."'");
    if($query){
        $var = mysqli_fetch_array($query);
    }
    return $var;
}

function get_book_info_by_id($b_id){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_books WHERE b_id='".$b_id."'");
    if($query){
        $var = mysqli_fetch_array($query);
    }
    return $var;
}

function get_book_info_by_code($b_code){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_books WHERE b_code='".$b_code."'");
    if($query){
        $var = mysqli_fetch_array($query);
    }
    return $var;
}

function get_all_libsys_dept(){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_departments");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function get_dept_info_by_id($d_id){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_departments WHERE d_id='".$d_id."'");
    if($query){
        $var = mysqli_fetch_array($query);
    }
    return $var;
}


function add_students($s_name,$s_code,$s_dept,$s_contact,$s_password){
    $s_status = "0";
    global $link;
    $result = mysqli_query($link,"INSERT INTO libsys_students(s_name,s_code,s_dept,s_contact,s_password,s_status) VALUES('".$s_name."','".$s_code."','".$s_dept."','".$s_contact."','".$s_password."','".$s_status."')");
    if($result){
        return true;
    }
    return false;
}

function add_admin($a_name,$a_mobile,$a_password){
    $a_status = "1";
    global $link;
    $result = mysqli_query($link,"INSERT INTO libsys_admin(a_name,a_contact,a_password,a_status) VALUES('".$a_name."','".$a_mobile."','".$a_password."','".$a_status."')");
    if($result){
        return true;
    }
    return false;
}

function add_books($b_code,$b_name,$b_author,$b_publisher,$b_qty,$b_self,$b_price){
    $b_status = "1";
    global $link;
    $result = mysqli_query($link,"INSERT INTO libsys_books(b_code,b_name,b_author,b_publishar,b_qty,b_self,b_price,b_status) VALUES('".$b_code."','".$b_name."','".$b_author."','".$b_publisher."','".$b_qty."','".$b_self."','".$b_price."','".$b_status."')");
    if($result){
        return true;
    }
    return false;
}

function issue_books($s_id,$b_id){
    global $link;
    $i_status = "1";
    $i_check=$b_id.$s_id;
    $i_date=date('Y-m-d');
    $i_e_date=date('Y-m-d',strtotime($i_date. ' + 15 days'));
    $result = mysqli_query($link,"INSERT INTO libsys_issue(i_student_id,i_book_id,i_check,i_date,i_e_date,i_status) VALUES('".$s_id."','".$b_id."','".$i_check."','".$i_date."','".$i_e_date."','".$i_status."')");
    if($result){
        return true;
    }
    return false;
}

function get_student_info_from_issue_by_id($s_id,$b_id){
    $var = array();
    global $link;
    $i_check=$b_id.$s_id;
    $i_status = '1';
    $query = mysqli_query($link,"SELECT * FROM libsys_issue WHERE i_check='".$i_check."' AND i_status='".$i_status."' ");
    if($query){
        $var = mysqli_fetch_array($query);
    }
    return $var;
}

function return_issue_books($b_id,$s_id,$i_date) {
    global $link;
    $i_status = '1';
    $i_check  = $b_id.$s_id;
    $i_r_date = date('Y-m-d');
    $i_diff=round(abs(strtotime($i_r_date)-strtotime($i_date))/86400);
    $i_fine='0';
    $fine_rate='1';
    if($i_diff>15){
        $fine_day=$i_diff-15;
        $i_fine=$fine_day*$fine_rate;
    }
        
    $result = mysqli_query($link,"UPDATE libsys_issue SET i_check='0',i_r_date='".$i_r_date."',i_fine='".$i_fine."',i_status='0' WHERE i_check='".$i_check."' AND i_status='".$i_status."' ");
    if($result){
        return true;
    }
    return false;
    
}

function update_book_qty_plus($b_id){
    global $link;
    $book_info=get_book_info_by_id($b_id);
    $b_qty=$book_info['b_qty']+1;
    $result = mysqli_query($link,"UPDATE libsys_books SET b_qty='".$b_qty."' WHERE b_id='".$b_id."'");
    if($result){
        return true;
    }
    return false;
}

function update_book_qty_minus($b_id){
    global $link;
    $book_info=get_book_info_by_id($b_id);
    $b_qty=$book_info['b_qty']-1;
    $result = mysqli_query($link,"UPDATE libsys_books SET b_qty='".$b_qty."' WHERE b_id='".$b_id."'");
    if($result){
        return true;
    }
    return false;
}

function get_all_libsys_author(){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_author");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function get_all_libsys_publisher(){
    $var = array();
    global $link;
    $query = mysqli_query($link,"SELECT * FROM libsys_publisher");
    if($query){
        while($row = mysqli_fetch_array($query)){
            $var[] = $row;
        }
    }else{
        echo mysqli_error();
    }
    return $var;
}

function update_student_info($s_id, $s_status) {
    global $link;
    if($s_status==1){
        $query = mysqli_query($link, "UPDATE libsys_students SET s_status='0' WHERE s_id='".$s_id."'");
    }else{
        $query = mysqli_query($link, "UPDATE libsys_students SET s_status='1' WHERE s_id='".$s_id."'");
    }
    
    if($query){
        return true;
    }else{
        return false;
    }
}

function delete_admin($a_id){
    global $link;
    $query = mysqli_query($link, "DELETE FROM libsys_admin WHERE a_id='".$a_id."' ");
    if($query) return true;
    else return false;
}

function update_admin_info($a_id, $a_status) {
    global $link;
    if($a_status==1){
        $query = mysqli_query($link, "UPDATE libsys_admin SET a_status='0' WHERE a_id='".$a_id."'");
    }else{
        $query = mysqli_query($link, "UPDATE libsys_admin SET a_status='1' WHERE a_id='".$a_id."'");
    }

    if($query){
        return true;
    }else{
        return false;
    }
}

function check_admin_info_by_mobile($mobile){
    global $link;
    $results = mysqli_query($link,"SELECT * FROM libsys_admin WHERE a_contact='".$mobile."' ");
    if($results){
        $num_of_user = mysqli_num_rows($results);
        if($num_of_user>0){
            return mysqli_fetch_array($results);
        }
    }
    return false;
}

function cms_emp_login($mobile,$password)
{
    $stu = array();
    global $link;
    $qu = mysqli_query($link,"SELECT * FROM  `libsys_admin` WHERE a_contact =  '".$mobile."' AND a_password =  '".$password."'   ");
    if($qu){
        $stu = mysqli_fetch_array($qu);
    }
    return $stu;
}

function generatePIN($digits=6){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin.= mt_rand(0,9);
        $i++;
    }
    return $pin;
}