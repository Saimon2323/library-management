<?php
include './includes/functions.php';
$pageName='Issue Book';

$message='';
if(isset($_REQUEST['s_code'])&&isset($_REQUEST['b_code'])){
    $s_code= $_REQUEST['s_code'];
    $b_code= $_REQUEST['b_code'];
    $std_info=get_student_info_by_code($s_code);
    $book_info=get_book_info_by_code($b_code);
    if($book_info['b_qty']>0){
        $s_id=$std_info['s_id'];
        $b_id=$book_info['b_id'];      
        $issue_books=issue_books($s_id,$b_id);
        if($issue_books){
            update_book_qty_minus($b_id);
            $message='Issue Success.';
        }else{
            $message='Issue Failed.';
        }
    }else{
        $message='Books Qty 0.';
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
                    <h1><?php echo $message; ?> <a class="btn btn-success" href="issue_book.php"><b>Issue Another</b></a> <a class="btn btn-info" href="index.php"><b>Home</b></a> </h1>
                    <?php 
                    }else if(isset($_REQUEST['book'])&&isset($_REQUEST['student'])){
                        $b_code= $_REQUEST['book'];
                        $s_code= $_REQUEST['student'];
                        $student_info=get_student_info_by_code($s_code);
                        if($student_info){
                            $book_info=get_book_info_by_code($b_code);
                            if($book_info){
                    ?>
                    <div class="row">
                        <form action="" method="post">
                            <input  type="hidden"  name="b_code" required="" value="<?php echo $b_code; ?>" />
                            <input  type="hidden"  name="s_code" required="" value="<?php echo $s_code; ?>" />
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <table class="table table-bordered">
                            <thead>
                                <tr class="btn-success">
                                    <td colspan="2"><b><i class="fa fa-home"></i> Book Info</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-right">Book Code:</td>
                                    <td><?php echo $book_info['b_code']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Book Name:</td>
                                    <td><?php echo $book_info['b_name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Book Shelf:</td>
                                    <td><?php echo $book_info['b_self']; ?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="btn-success">
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                            <button class="btn btn-success btn-block">Confirm Issue</button>
                        </form>
                    </div>
                    
                    
                    <?php } else {
                                $message='No Books are found with this book code.';
                                echo '<h1>'.$message.'<a href="issue_book.php"><b>Issue Another</b></a>'.'</h1>';
                            }
                    
                            } else {
                                $message='No Students are found with this Student ID.';
                                echo '<h1>'.$message.'<a href="issue_book.php"><b>Issue Another</b></a>'.'</h1>';
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

