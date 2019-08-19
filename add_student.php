<?php
include './includes/functions.php';
$pageName='Add Students';

$message='';
if(isset($_REQUEST['s_contact'])&&isset($_REQUEST['s_pass'])){
    $s_name= strtoupper($_REQUEST['s_name']);
    $s_code= strtoupper($_REQUEST['s_code']);
    $s_dept=$_REQUEST['s_dept'];
    $s_contact=$_REQUEST['s_contact'];
    $s_pass=$_REQUEST['s_pass'];
    $s_c_pass=$_REQUEST['s_c_pass'];
    if($s_pass==$s_c_pass){
        $s_password= md5($s_pass);
        $add_students=add_students($s_name,$s_code,$s_dept,$s_contact,$s_password);
        if($add_students){
            $message='Registration Success.';
        }else{
            $message='Data Insert Failed.';
        }
    }else {
        $message='Password Not Match.Pls Try Again';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include './head.php'; ?>
    </head>
    <body class="btn-default">
        <div class="container">
            <div class="row">
                <div class="col-md-12 well">
                    <?php 
                    if($message){
                    ?>
                    <h1><?php echo $message; ?></h1>
                    <?php } ?>
                    <form action="" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-right">Student Code</td>
                                <td>
                                    <input class="form-control" name="s_code" type="text" required="" placeholder="Enter Code" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Student Name</td>
                                <td>
                                    <input class="form-control" name="s_name" type="text" required="" placeholder="Enter Name" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Student Contact</td>
                                <td>
                                    <input class="form-control" name="s_contact" type="text"  placeholder="Enter Contact" minlength="11" maxlength="11" required="" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Student Dept.</td>
                                <td>
                                    <select class="form-control" name="s_dept" required="">
                                        <option value="">Select Department</option>
                                        <?php 
                                        $all_dept= get_all_libsys_dept();
                                        foreach ($all_dept as $dept){
                                        ?>
                                        <option value="<?php echo $dept['d_id']; ?>"><?php echo $dept['d_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Student Password</td>
                                <td>
                                    <input class="form-control" name="s_pass" type="password" required="" placeholder="Enter Password" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Confirm Password</td>
                                <td>
                                    <input class="form-control" name="s_c_pass" type="password" required="" placeholder="Enter Confirm Password" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-danger pull-right" type="submit" name="Registration" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            
            <?php include './footer.php'; ?>
        </div>
    </body>
</html>

