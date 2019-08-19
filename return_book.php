<?php
include './includes/functions.php';
$pageName='Return Book';

$message='';
if(isset($_POST['b_id']) && isset($_POST['s_id']) && isset($_POST['i_date']) ){
    $b_id = $_POST['b_id'];
    $s_id = $_POST['s_id'];
    $i_date= $_POST['i_date'];
    $student_info_from_issue = get_student_info_from_issue_by_id($s_id,$b_id);
    if($student_info_from_issue){
        $return_book = return_issue_books($b_id,$s_id,$i_date);
        if($return_book){
            update_book_qty_plus($b_id);
            $message='Return success!';
        }else{
            $message='Return failed!';
        }
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
                    <h1><?php echo $message; ?> <a class="btn btn-success" href="return_book.php"><b>Back to Return</b></a> <a class="btn btn-info" href="index.php"><b>Home</b></a> </h1>
                    <?php 
                    }else if(isset($_REQUEST['book'])&&isset($_REQUEST['student'])){
                        $b_code= $_REQUEST['book'];
                        $s_code= $_REQUEST['student'];
                        $student_info=get_student_info_by_code($s_code);
                        $book_info=get_book_info_by_code($b_code);
                        $s_id = $student_info['s_id'];
                        $b_id = $book_info['b_id'];
                        $student_info_from_issue = get_student_info_from_issue_by_id($s_id,$b_id);
                        if($student_info_from_issue){
                    ?>
                    <div class="row">
                        <form action="" method="post">
                            <input  type="hidden"  name="b_id" required="" value="<?= $b_id; ?>" />
                            <input  type="hidden"  name="s_id" required="" value="<?= $s_id; ?>" />
                            <input  type="hidden"  name="i_date" required="" value="<?= $student_info_from_issue['i_date']; ?>" />
                        <div class="col-md-12">
                            <table class="table table-bordered">
                            <thead>
                                <tr class="btn-success text-center">
                                    <td colspan="2"><b><i class="fa fa-home"></i> Student and Book Info</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-right">Student Id:</td>
                                    <td><?= $student_info['s_code']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Student Name:</td>
                                    <td><?= $student_info['s_name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Book Code:</td>
                                    <td><?= $book_info['b_code']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Book Name:</td>
                                    <td><?php echo $book_info['b_name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Issue date:</td>
                                    <td><?= $student_info_from_issue['i_date']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">End date:</td>
                                    <td><?= $student_info_from_issue['i_e_date']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Return date:</td>
                                    <td><?= date('Y-m-d'); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Fine:</td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="btn-success">
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                        
                            <button class="btn btn-success btn-block">Confirm Return</button>
                        </form>
                    </div>
                    
                    
                    <?php 
                    
                            } else {
                                $message='No books are issued with this student ID.';
                                echo '<h1>'.$message.'<a href="return_book.php"><b>Back to return</b></a>'.'</h1>';
                            }
                    
                            }else{ ?>
                    <form action="" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-right">Student ID</td>
                                <td>
                                    <input class="form-control" name="student" type="text" required="" placeholder="Enter Student Code" />
                                </td>
                            </tr>
                           <tr>
                                <td class="text-right">Book ID</td>
                                <td>
                                    <input class="form-control" name="book" type="text" required="" placeholder="Enter Book Code" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-danger pull-right" type="submit" name="Registration" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
            
            <?php include './footer.php'; ?>
        </div>
    </body>
</html>

