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
<body>
    <div class="container h-100">
        <br><br><br>
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="regi.jpg" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];
                        $roll = $_POST['roll'];
                        $name = mysqli_real_escape_string($db->link, $name);
                        $roll = mysqli_real_escape_string($db->link, $roll);
                        $err = "";
                        if ($name != '' && $roll != '') {
                            $quarry = "select * from student where username='$name' and roll='$roll'";
                            $enter = $db->select($quarry);
                            if ($enter != false) {
                                $value = mysqli_fetch_array($enter);
                                $row = mysqli_num_rows($enter);
                                if ($row > 0) {
                                    session::set("login", true);
                                    session::set("username", $value["username"]);
                                    session::set("roll", $value["roll"]);
                                    session::set("id", $value["id"]);
                                    header("Location:index.php");
                                }
                            } else {

                                $err = "Data invalid Please Register";
                            }
                        } else if ($name == '' || $roll == '') {
                            $err = 'Please Fill The All Box';
                        }
                    }


                    ?>
                    <form action="" method="POST">
                        <?php
                        if (isset($err)) {
                            echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$err</div>";
                        }

                        ?>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control input_user" value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" name="roll" class="form-control input_pass" value="" placeholder=" Your id">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit" name="button" class="btn login_btn" value="Login">
                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-center links text-danger">
                        Don't have an account? <a href="regi.php" class="ml-2">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>