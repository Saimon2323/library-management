<?php
include './includes/functions.php';
$pageName='Student Profile';

if(isset($_GET['s_id'])){
  $s_id=$_GET['s_id'];
$student_info= get_student_info_by_id($s_id);
$std_issue_info = get_std_issue_info_by_sID($s_id);
$dept_info= get_dept_info_by_id($student_info['s_dept']);
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
                    <table class="table table-bordered">
                        <thead>
                            <tr class="btn-success">
                                <td colspan="2"><b><i class="fa fa-home"></i> Students Profile</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-right">Student Id:</td>
                                <td><?php echo $student_info['s_code']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Student Name:</td>
                                <td><?php echo $student_info['s_name']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Department:</td>
                                <td><?php echo $dept_info['d_name']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Student Mobile:</td>
                                <td><?php echo $student_info['s_contact']; ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="btn-success">
                                <td colspan="2"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="col-md-12 well">
                    <?php if($std_issue_info){ ?>
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
                            foreach($std_issue_info as $books){
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
                            <?php $serial++; }?>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                    <?php }else{
                        echo "<b>No books are Issued!</b>";
                    } ?>
                </div>
            </div>
            <?php include './footer.php'; ?>
        </div>
    </body>
</html>
<?php }else{ 
    echo "<meta http-equiv='refresh' content='0.5;url=index.php'>";
} ?>

