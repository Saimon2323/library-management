<?php
include './includes/functions.php';
$pageName='Dept Profile';
if(isset($_REQUEST['d_id'])){
  $d_id=$_REQUEST['d_id'];  
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
                    $dept_info= get_dept_info_by_id($d_id);
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="btn-success">
                                <td colspan="2"><b><i class="fa fa-home"></i> Dept Profile</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-right">Dept Id:</td>
                                <td><?php echo $dept_info['d_code']; ?></td>
                            </tr>
                            <tr>
                                <td class="text-right">Dept Name:</td>
                                <td><?php echo $dept_info['d_name']; ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="btn-success">
                                <td colspan="2"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            <?php include './footer.php'; ?>
        </div>
    </body>
</html>
<?php }else{ 
    echo "<meta http-equiv='refresh' content='0.5;url=index.php'>";
} ?>

