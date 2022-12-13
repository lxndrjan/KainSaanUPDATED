<?php
session_start();
if (isset($_SESSION['email'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>KainSaan - Dashboard</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/ec53e99f9a.js" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="wrapper">
            <div class="sidebar">
                <h5>KainSaan - Admin</h5>
                <div class="image_holder">
                    <img class="my-3 rounded" src="images/USER-LOGO.png" width="130" height="130"/>
                    <p class="p-0 m-0 font-poppins">Charles Lim</p>
                    <p class="txt_admin">Administrator</p>
                </div>
                <ul>
                    <p class="txt_side">Manage</p>
                    <li><a href="#"><i class="fa-solid fa-lock"></i>Admins</a></li>
                    <li><a href="user.php"><i class="fa-solid fa-user"></i>Users</a></li>
                    <li><a href="foodestablishments.php"><i class="fa-solid fa-utensils"></i>Food Establishments</a></li>
                    <li><a href="reviews.php"><i class="fa-solid fa-flag"></i>Reviews and Reports</a></li>
                    <p class="txt_side">Setting</p>
                    <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </div>

            <div class="container">
                <h2>Admins of KainSaan</h2>
                <table class="table table-border table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            </tr>
                    </thead>
        
                    <tbody>
                        <!--connect with database -->
                        <?php
                            $con = mysqli_connect('localhost', 'root', '', 'kainsaan');
                            $sel = "SELECT id, email, full_name FROM admin  ORDER BY id ASC";
                            $query = $con->query($sel);
                        while ($row = $query->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['full_name'];?></td>
                            <td><?php echo $row['email'];?></td>
                        <td>
                            <a href="editAdmin.php?edit=<?php echo $row['id'];?>" class="btn btn-success" style="width:75px;">Edit</a>
                            <a href="deleteAdmin.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table> 
            </div>
        </div>

    </body>
</html>