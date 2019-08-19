<?php
include './includes/functions.php';
$pageName='Add Books';

$message='';
if(isset($_REQUEST['b_code'])&&isset($_REQUEST['b_name'])&&isset($_REQUEST['b_qty'])&&isset($_REQUEST['b_price'])){
    $b_name= strtoupper($_REQUEST['b_name']);
    $b_code= strtoupper($_REQUEST['b_code']);
    $b_author=$_REQUEST['b_author'];
    $b_publisher=$_REQUEST['b_publisher'];
    $b_qty=$_REQUEST['b_qty'];
    $b_self=$_REQUEST['b_self'];
    $b_price=$_REQUEST['b_price'];
    
    $add_books=add_books($b_code,$b_name,$b_author,$b_publisher,$b_qty,$b_self,$b_price);
    if($add_books){
      $message='Book has been added successfully.';
    }else{
      $message='Data Insert Failed.';
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
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td class="text-right">Book Code</td>
                                <td>
                                    <input class="form-control" name="b_code" type="text" required="" placeholder="Enter Book Code" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">Book Name</td>
                                <td>
                                    <input class="form-control" name="b_name" type="text" required="" placeholder="Enter Book Name" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="text-right">Book Author</td>
                                <td>
                                    <select class="form-control" name="b_author" required="">
                                        <option value="">Select Author</option>
                                        <?php 
                                        $all_author= get_all_libsys_author();
                                        foreach ($all_author as $author){
                                        ?>
                                        <option value="<?php echo $author['au_id']; ?>"><?php echo $author['au_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="text-right">Book Publisher</td>
                                <td>
                                    <select class="form-control" name="b_publisher" required="">
                                        <option value="">Select publisher</option>
                                        <?php 
                                        $all_publisher= get_all_libsys_publisher();
                                        foreach ($all_publisher as $publisher){
                                        ?>
                                        <option value="<?php echo $publisher['pub_id']; ?>"><?php echo $publisher['pub_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="text-right">Book Quantity</td>
                                <td>
                                    <input class="form-control" name="b_qty" type="number"  placeholder="Enter quantity" required="" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="text-right">Book Shelf</td>
                                <td>
                                    <input class="form-control" name="b_self" type="number"  placeholder="Enter Shelf no" required="" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="text-right">Book Price</td>
                                <td>
                                    <input class="form-control" name="b_price" type="number"  placeholder="Enter Price" required="" />
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td colspan="2">
                                    <input class="btn btn-danger pull-right" type="submit" value="Add Book" name="addBook" />
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

