<?php
$con = mysqli_connect('localhost', 'root', '', 'kainsaan');
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];

    $query = "DELETE FROM admin WHERE id=$delete ";
    $del = $con->query($query);
    if ($del) {
        header('location:admin.php');
    }
    else{
        echo "SOMETHING WENT WRONG";
    }
}

?>