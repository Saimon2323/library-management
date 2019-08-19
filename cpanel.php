<?php
session_start();
if(isset($_SESSION['se_admin'])){
include './includes/functions.php';
$pageName='Home';

if(isset($_POST['s_id']) && isset($_POST['s_status']) ){
    $s_id = $_POST['s_id'];
    $s_status = $_POST['s_status'];
    update_student_info($s_id, $s_status);
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
        <div class="col-md-12 well bg-primary" >
            <h2 class="text-center"><i class="fa fa-book"></i> <b>Library Management System - Dashboard</b><a style="color: white; float: right;" href="logout.php">Logout</a></h2>

        </div>
        <div class="col-md-12 well">
            <h1 class="text-primary"><i class="fa fa-book"></i> Book  <a class="btn btn-primary" href="add_book.php">Add Books</a>
                <a class="btn btn-success pull-right" href="admin_list.php">Admin list</a> </h1>
            <hr/>
            <table class="table table-bordered text-danger">
                <thead>
                <tr class="btn-success">
                    <td colspan="6"><b><i class="fa fa-home"></i> Available Books</b></td>
                </tr>
                <tr>
                    <td><b>B ID</b></td>
                    <td><b>CODE</b></td>
                    <td><b>NAME</b></td>
                    <td><b>QTY</b></td>
                    <td><b>PRICE</b></td>
                    <td><b>RACK</b></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $status='1'; //active
                $all_books=get_all_libsys_books($status);
                foreach($all_books as $books){
                    ?>
                    <tr>
                        <td><b><?php echo $books['b_id']; ?></b></td>
                        <td><b><?php echo $books['b_code']; ?></b></td>
                        <td><b><?php echo $books['b_name']; ?></b></td>
                        <td><b><?php echo $books['b_qty']; ?></b></td>
                        <td><b><?php echo $books['b_price']; ?></b></td>
                        <td><b><?php echo $books['b_self']; ?></b></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot></tfoot>
            </table>
            <hr/>
            <table class="table table-bordered">
                <thead>
                <tr class="btn-danger">
                    <td colspan="6"><b><i class="fa fa-home"></i> Stock Out Books</b></td>
                </tr>
                <tr>
                    <td><b>B ID</b></td>
                    <td><b>CODE</b></td>
                    <td><b>NAME</b></td>
                    <td><b>QTY</b></td>
                    <td><b>PRICE</b></td>
                    <td><b>RACK</b></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $status='0'; //deactive
                $all_books=get_all_libsys_books($status);
                foreach($all_books as $books){
                    ?>
                    <tr>
                        <td><b><?php echo $books['b_id']; ?></b></td>
                        <td><b><?php echo $books['b_code']; ?></b></td>
                        <td><b><?php echo $books['b_name']; ?></b></td>
                        <td><b><?php echo $books['b_qty']; ?></b></td>
                        <td><b><?php echo $books['b_price']; ?></b></td>
                        <td><b><?php echo $books['b_self']; ?></b></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>

        <div class="col-md-12 well">
            <h1 class="text-primary"> <a class="btn btn-primary" href="issue_book.php">Issue Books</a> <a class="btn btn-success" href="return_book.php">Return Book</a> </h1>
            <hr>
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="btn-danger text-center">
                    <td colspan="8"><b><i class="fa fa-home"></i> Issue Books</b></td>
                </tr>
                <tr>
                    <td><b>SL</b></td>
                    <td><b>Book ID</b></td>
                    <td><b>Student ID</b></td>
                    <td><b>Issue Date</b></td>
                    <td><b>End Date</b></td>
                    <td><b>Return Data</b></td>
                    <td><b>Fine</b></td>
                    <td><b>Status</b></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $serial = 1;
                $all_issue_books=get_all_libsys_issue();
                foreach($all_issue_books as $books){
                    ?>
                    <tr>
                        <td><b><?= $serial; ?></b></td>
                        <td><b><?= $books['i_book_id']; ?></b></td>
                        <td><b><?= $books['i_student_id']; ?></b></td>
                        <td><b><?= $books['i_date']; ?></b></td>
                        <td><b><?= $books['i_e_date']; ?></b></td>
                        <td><b><?= $books['i_r_date']; ?></b></td>
                        <td><b><?= $books['i_fine']; ?></b></td>
                        <td><b><?= $books['i_status']; ?></b></td>
                    </tr>
                    <?php $serial++; } ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 well">
            <h1 class="text-primary"><i class="fa fa-users"></i> Students <a class="btn bg-primary" href="add_student.php">Add Student</a></h1>
            <hr/>
            <table class="table table-bordered">
                <thead>
                <tr class="btn-success">
                    <td colspan="9"><b><i class="fa fa-home"></i> Students List</b></td>
                </tr>
                <tr>
                    <td><b>SL</b></td>
                    <td><b>S ID</b></td>
                    <td><b>CODE</b></td>
                    <td><b>NAME</b></td>
                    <td><b>CONTACT</b></td>
                    <td><b>DEPT</b></td>
                    <td><b>STATUS</b></td>
                    <td><b>PROCESS</b></td>
                    <td><b>DETAILS</b></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $all_students=get_all_libsys_students();
                $i=1;
                foreach($all_students as $students){
                    $dept_info= get_dept_info_by_id($students['s_dept']);
                    ?>
                    <tr>
                        <td><b><?php echo $i; ?></b></td>
                        <td><b><?php echo $students['s_id']; ?></b></td>
                        <td><b><?php echo $students['s_code']; ?></b></td>
                        <td><b><?php echo $students['s_name']; ?></b></td>
                        <td><b><?php echo $students['s_contact']; ?></b></td>
                        <td><b><a target="_blank" href="dept.php?d_id=<?php echo $dept_info['d_id']; ?>"><?php echo $dept_info['d_name']; ?></a>
                                <form action="dept.php" method="post">
                                    <input type="hidden" name="d_id" value="<?php echo $dept_info['d_id']; ?>" />
                                    <button class="btn btn-primary">View</button>
                                </form>
                            </b></td>
                        <td><b><?php
                                if($students['s_status']=='1'){
                                    echo '<b class="text-success">Active</b>';
                                }else{
                                    echo '<b class="text-danger">Deactive</b>';
                                }
                                ?></b>
                        </td>
                        <td><b><?php
                                if($students['s_status']=='1'){ ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="s_id" value="<?= $students['s_id']; ?>" />
                                        <input type="hidden" name="s_status" value="<?= $students['s_status']; ?>" />
                                        <button class="btn btn-danger btn-block"><b>Deactive</b></button>
                                    </form>
                                    <?php
                                }else{ ?>
                                    <!--<a class="btn btn-success btn-block" href=""><b>Active</b></a>-->
                                    <form action="" method="post">
                                        <input type="hidden" name="s_id" value="<?= $students['s_id']; ?>" />
                                        <input type="hidden" name="s_status" value="<?= $students['s_status']; ?>" />
                                        <button class="btn btn-success btn-block"><b>Active</b></button>
                                    </form>
                                <?php } ?></b>
                        </td>
                        <td><a class="btn btn-primary" target="_blank" href="profile.php?s_id=<?php echo $students['s_id']; ?>"><b>view</b></a></td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>

    <?php include './footer.php'; ?>
</div>
</body>
</html>

<?php
}else{
    echo "<meta http-equiv='refresh' content='.5;url=index.php'>";
}
?>


