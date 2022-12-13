<?php
$con = mysqli_connect('localhost', 'root', '', 'kainsaan');
if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $insert = "INSERT INTO admin (full_name, email, password) VALUES ('$full_name', '$email', '$password')";

    $ins = $con->query($insert);
    if ($ins) {
        header("location:login.php");
    }
    else {
        echo "Something Went Wrong";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register - KainSaan</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/ec53e99f9a.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="hero">
            <h2 class="logo">Kain<span>Saan</span></h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col d-flex justify-content-center">
                        <div class="card-transparent text-white border-0" style="width: 40rem;" >
                             <div class="card-header col d-flex justify-content-center">
                                <h4>Admin - Register to KainSaan</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php $_PHP_SELF?>" method="post">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="full_name" name="full_name" id="full_name" placeholder="Enter yout full name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block">
                                    </div>
                                    <div class="txt-reg-log">
                                        Already have an account? <a href="login.php"><span>Login Here</span></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </body>
</html>