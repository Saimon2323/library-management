<?php
session_start();
if(isset($_SESSION['se_admin'])){
include './includes/functions.php';
$pageName='Admin List';
$message='';

if(isset($_POST['a_id']) && isset($_POST['a_status']) ){
    $a_id = $_POST['a_id'];
    $a_status = $_POST['a_status'];
    update_admin_info($a_id, $a_status);
}

if(isset($_POST['a_id'])){
    $a_id = $_POST['a_id'];
    $result = delete_admin($a_id);
    if($result){
        $message = "Delete successful!";
    }else{
        $message = "Error! Delete unsuccessful!";
    }
}

?>



<!doctype html>
<html lang="en">
<head>
    <?php include './head.php'; ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 well">
                <?php
                if($message){
                    ?>
                    <h1><?php echo $message; ?></h1>
                <?php } ?>
                <h1 class="text-primary"><i class="fa fa-users"></i> Admin <a class="btn bg-primary" href="add_admin.php">Add Admin</a></h1>
                <hr/>
                <table class="table table-bordered">
                    <thead>
                    <tr class="btn-success">
                        <td colspan="9"><b><i class="fa fa-home"></i> Admin List</b></td>
                    </tr>
                    <tr>
                        <td><b>SL</b></td>
                        <td><b>A ID</b></td>
                        <td><b>NAME</b></td>
                        <td><b>CONTACT</b></td>
                        <td><b>STATUS</b></td>
                        <td><b>PROCESS</b></td>
                        <td><b>ACTION</b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $all_admin=get_all_libsys_admin();
                    $i=1;
                    foreach($all_admin as $admin){
                        ?>
                        <tr>
                            <td><b><?php echo $i; ?></b></td>
                            <td><b><?php echo $admin['a_id']; ?></b></td>
                            <td><b><?php echo $admin['a_name']; ?></b></td>
                            <td><b><?php echo $admin['a_contact']; ?></b></td>

                            <td><b><?php
                                    if($admin['a_status']=='1'){
                                        echo '<b class="text-success">Active</b>';
                                    }else{
                                        echo '<b class="text-danger">Deactive</b>';
                                    }
                                    ?></b>
                            </td>
                            <td><b><?php
                                    if($admin['a_status']=='1'){ ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="a_id" value="<?= $admin['a_id']; ?>" />
                                            <input type="hidden" name="a_status" value="<?= $admin['a_status']; ?>" />
                                            <button class="btn btn-danger btn-block"><b>Deactive</b></button>
                                        </form>
                                        <?php
                                    }else{ ?>
                                        <!--<a class="btn btn-success btn-block" href=""><b>Active</b></a>-->
                                        <form action="" method="post">
                                            <input type="hidden" name="a_id" value="<?= $admin['a_id']; ?>" />
                                            <input type="hidden" name="a_status" value="<?= $admin['a_status']; ?>" />
                                            <button class="btn btn-success btn-block"><b>Active</b></button>
                                        </form>
                                    <?php } ?></b>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="a_id" value="<?= $admin['a_id']; ?>" />
                                    <button class="btn btn-danger btn-block" onclick='return confirm_delete()' ><b>Delete</b></button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                    <tfoot>  </tfoot>
                </table>
            </div>
        </div>
        <?php include './footer.php'; ?>
    </div>

    <script>
        function confirm_delete(){
            return confirm("Are you sure you want to permanently delete this data?");
        }
        //end of delete operation
    </script>

</body>
</html>

    <?php
}else{
    echo "<meta http-equiv='refresh' content='.5;url=index.php'>";
}
?>