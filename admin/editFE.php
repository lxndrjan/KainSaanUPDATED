<?php
$con = mysqli_connect('localhost', 'root', '' ,'kainsaan');
//code for update
    if(isset($_POST['submit'])) {
        $store_name=$_POST['store_name'];
        $category = $_POST['category'];
        $cuisine_type = $_POST['cuisine_type'];
        $parking_info = $_POST['parking_info'];
        $average_cost = $_POST['average_cost'];
        $id=$_POST['id'];

        $update="UPDATE food_establishments SET store_name='$store_name', category='$category', cuisine_type='$cuisine_type', parking_info='$parking_info', average_cost='$average_cost' WHERE id=$id";
        $up=$con->query($update);
        if($up) {
            header('location:foodestablishments.php');
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
        <br><br>
        <div class="container col d-flex justify-content-center" style="width: 40rem;">
            <div class="row">
                <div class="card card col d-flex justify-content-center text-white bg-dark">
                    <div class="card-header">
                        <h4>Update Food Establishment Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php $_PHP_SELF?>" method="post">
                            <div class="row">
                                <?php
                                    if(isset($_GET['edit'])) {
                                        $id=$_GET['edit'];
                                        $sel = "SELECT * FROM food_establishments WHERE id=$id";
                                        $query = $con->query($sel);
                                        while ($row=$query->fetch_assoc()) {

                                ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Food Establishment Name <span style="color: red;">*</span></label>
                                        <input type="text" name="store_name" class="form-control" required="" value="<?php echo $row['store_name'];?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Category <span style="color: red;">*</span></label>
                                    <div class="input-group form-group">
                                        <select class="custom-select" name="category" id="inputGroupSelect04">
                                            <option selected><?php echo $row['category'];?></option>
                                            <option value="Cafe">Cafe</option>
                                            <option value="Eatery">Eatery</option>
                                            <option value="Fast Food">Fast Food</option>
                                            <option value="Food Park">Food Park</option>
                                            <option value="Fine Dining">Fine Dining</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Type of Cuisine <span style="color: red;">*</span></label>
                                    <div class="input-group form-group">
                                        <select class="custom-select" name="cuisine_type" id="inputGroupSelect04">
                                            <option selected><?php echo $row['cuisine_type'];?></option>
                                            <option value="Filipino">Filipino</option>
                                            <option value="Chinese">Chinese</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Indian">Indian</option>
                                            <option value="Western">Western</option>
                                            <option value="Greek">Greek</option>
                                            <option value="Japanese">Japanese</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Parking Information <span style="color: red;">*</span></label>
                                    <div class="input-group form-group">
                                        <select class="custom-select" name="parking_info" id="inputGroupSelect04">
                                            <option selected><?php echo $row['parking_info'];?></option>
                                            <option value="With vehicle parking">With vehicle parking</option>
                                            <option value="Without vehicle parking">Wtihout vehicle parking</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Estimated Price <span style="color: red;">*</span></label>
                                        <input type="text" name="average_cost" class="form-control" required="" value="<?php echo $row['average_cost'];?>">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
                                <input type="hidden" name="coords" value="<?php echo $row['coords'];?>">
                                <input type="hidden" name="address" value="<?php echo $row['address'];?>">
                                <input type="hidden" name="rating" value="<?php echo $row['rating'];?>">
                                <input type="hidden" name="views" value="<?php echo $row['views'];?>">
                                <input type="hidden" name="store_description" value="<?php echo $row['store_description'];?>">
                                <input type="hidden" name="created_at" value="<?php echo $row['created_at'];?>">
                                <input type="hidden" name="updated_at" value="<?php echo $row['updated_at'];?>">
                                <div class="col-md-12">
                                    <div class="text-center">
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