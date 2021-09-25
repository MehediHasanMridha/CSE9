<?php include "lib/Database.php"; ?>
<?php include "config/config.php"; ?>
<?php include "lib/session.php"; ?>
<?php include "inc/Format.php"; ?>
<?php
session::init();
$db = new Database();
$fm = new Format();
?>
<?php
if ($_SESSION['username'] == '' && $_SESSION['roll'] == '') {
    header("Location:login.php");
}
if (isset($_GET['action']) && $_GET['action'] == "log out") {
    session::destroy();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="new.css">
    <link rel="shortcut icon" href="inc/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
;">

    <nav class="navbar navbar-expand-lg navbar-dark purple-gradient" style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Navbar</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="submit.php">Submission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comment.php">Comment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allstudent.php">Students Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teacherNumber.php">Teachers Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://sites.google.com/view/campuslib">Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="card.php">ID Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notice.php">Notice</a>
                </li>
            </ul>
            <!-- Links -->
            <div>
                <a href="?action=log out" class="d-flex justify-content-center btn btn-secondary" style="background: #304352;
                                      background: -webkit-linear-gradient(to right, #d7d2cc, #304352);
                                      background: linear-gradient(to right, #d7d2cc,#304352);">Log Out</a>
            </div>

        </div>
        <!-- Collapsible content -->

    </nav>
    <br><br>