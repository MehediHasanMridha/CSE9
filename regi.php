<?php include "lib/Database.php"; ?>
<?php include "config/config.php"; ?>
<?php include "lib/session.php"; ?>
<?php include "inc/Format.php"; ?>
<?php
session::init();
$db = new Database();
$fm = new Format();
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<!--Coded with love by Mutiullah Samim-->

<body>
    <div class="container h-100">
        <br><br><br>
        <div class="d-flex justify-content-center h-100">
            <div class="user_card  ">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="regi.jpg" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="justify-content-center form_container" height="10px">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];
                        $roll = $_POST['roll'];
                        $dis = $_POST['dis'];
                        $number = $_POST['number'];
                        $name = mysqli_real_escape_string($db->link, $name);
                        $roll = mysqli_real_escape_string($db->link, $roll);
                        $dis = mysqli_real_escape_string($db->link, $dis);
                        $number = mysqli_real_escape_string($db->link, $number);
                        $permited  = array('jpg', 'jpeg', 'png', 'gif');

                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                        $uploaded_image = "upload/" . $unique_image;

                        $quarry = "select * from student where roll='$roll'";
                        $enter = $db->select($quarry);
                        $err = "";
                        if ($name == '' || $roll == '' || $file_name == '' || $dis == '' || $number == '') {
                            $err = 'Please Fill The All Box';
                        } elseif ($enter) {
                            $err = "This ID is already in the Database";
                        } elseif ($file_size > 1048567) {
                            $err = "Please file size less than or equal 1MB";
                        } elseif (in_array($file_ext, $permited) == false) {
                            $err = "You can upload only:-" . implode(', ', $permited);
                        } elseif ($name != '' && $roll != '' && $number != '' && $dis != '' && $file_name != '' && $enter == false) {
                            move_uploaded_file($file_temp, $uploaded_image);
                            $quarry = "insert into student(username, roll, image, number, dis) values('$name', '$roll', '$uploaded_image', '$number', '$dis')";
                            $enter = $db->insert($quarry);
                            header("Location:login.php");
                        }
                    }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php
                        if (isset($err)) {
                            echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$err</div>";
                        }

                        ?>
                        <div class="input-group mb-3 justify-content-center">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" weight="10px" class="form-control input_user col-8 " value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2 justify-content-center">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" name="roll" class="form-control input_pass col-8" value="" placeholder=" Your id">
                        </div>
                        <div class="input-group mb-2 justify-content-center">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" name="dis" class="form-control input_pass col-8" value="" placeholder=" Your District">
                        </div>

                        <div class="input-group mb-2 justify-content-center">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" name="number" class="form-control input_pass col-8" value="" placeholder=" Your Mobile Number">
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="file" name="image" class="btn login_btn col-11">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit" name="button" class="btn login_btn col-11" value="Register Now">
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-center links text-danger">
                                Go To <a href="login.php" class="ml-2">Login</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>