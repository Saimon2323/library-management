<?php
include './includes/functions.php';
$pageName='Add Admin';

$message='';
if(isset($_REQUEST['a_mobile'])&&isset($_REQUEST['a_pass'])){
    $a_name   = strtoupper($_REQUEST['a_name']);
    $a_mobile = $_REQUEST['a_mobile'];
    $a_pass   = $_REQUEST['a_pass'];
    $a_c_pass = $_REQUEST['a_c_pass'];
    if($a_pass == $a_c_pass){
        $a_password = md5($a_pass);
        $add_admin  = add_admin($a_name,$a_mobile,$a_password);
        if($add_admin){
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
            <a class="btn btn-success pull-right" href="admin_list.php">Admin list</a>
            <h1 class="text-center bg-primary">Add Admin Form </h1> <br>
            <form action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td class="text-right">Admin Name</td>
                        <td>
                            <input class="form-control" name="a_name" type="text" required placeholder="Enter Name" />
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Mobile No</td>
                        <td>
                            <input class="form-control" name="a_mobile" type="text" required placeholder="Enter a valid mobile no" />
                        </td>
                    </tr>

                    <tr>
                        <td class="text-right">Password</td>
                        <td>
                            <input class="form-control" name="a_pass" type="password" required placeholder="Enter Password" />
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Confirm Password</td>
                        <td>
                            <input class="form-control" name="a_c_pass" type="password" required placeholder="Enter password again" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="btn btn-danger pull-right" type="submit" name="Registration" value="Add admin"/>
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

