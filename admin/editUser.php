<?php
$con = mysqli_connect('localhost', 'root', '' ,'kainsaan');
//code for update
    if(isset($_POST['submit'])) {
        $full_name=$_POST['full_name'];
        $email=$_POST['email'];
        $id=$_POST['id'];

        $update="UPDATE users SET full_name='$full_name', email='$email' WHERE id=$id";
        $up=$con->query($update);
        if($up) {
            header('location:user.php');
        }
        else{
            echo "SOMETHING WENT WRONG";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/ec53e99f9a.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <br><br><br><br><br><br>
        <div class="container col d-flex justify-content-center" style="width: 40rem;">
            <div class="row">
                <div class="card col d-flex justify-content-center text-white bg-dark">
                    <div class="card-header">
                        <h4>Update User Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_PHP_SELF?>" method="post">
                            <div class="row ">
                                <?php
                                    if(isset($_GET['edit'])) {
                                        $id=$_GET['edit'];
                                        $sel = "SELECT * FROM users WHERE id=$id";
                                        $query = $con->query($sel);
                                        while ($row=$query->fetch_assoc()) {

                                ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Full Name <span style="color: red;">*</span></label>
                                        <input type="text" name="full_name" class="form-control" required="" value="<?php echo $row['full_name'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email <span style="color: red;">*</span></label>
                                        <input type="email" name="email" class="form-control" required="" value="<?php echo $row['email'];?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                <input type="hidden" name="password" value="<?php echo $row['password'];?>">
                                <input type="hidden" name="role_id" value="<?php echo $row['role_id'];?>">
                                <input type="hidden" name="created_at" value="<?php echo $row['created_at'];?>">
                                <input type="hidden" name="updated_at" value="<?php echo $row['updated_at'];?>">
                                <div class="col-md-12">
                                    <div>
                                        <br>
                                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                                    </div>
                                </div>
                                <?php
                                }
                            }
                            ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>