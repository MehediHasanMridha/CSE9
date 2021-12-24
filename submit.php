<?php include "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll = strtoupper($_POST['roll']);
    $name = mysqli_real_escape_string($db->link, $name);
    $roll = mysqli_real_escape_string($db->link, $roll);

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "upload/" .$roll.'--'. $file_name;
    $err = "";
    $sub = '';
    if ($name == '' || $roll == '' || $file_name == '') {
        $err = 'Please Fill The All Box';
    } else {
        move_uploaded_file($file_temp, $uploaded_image);
        $quarry = "insert into file(name, roll, file) values('$name', '$roll', '$uploaded_image')";
        $enter = $db->insert($quarry);
        $sub = "Successfully Submitted";
    }
}


?>
<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-striped d-flex justify-content-center ">
        <br><br>
        <br><br><br><br>
        <?php
        if (isset($err)) {
            echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$err</div>";
        }
        if (isset($sub)) {
            echo "<div class='justify-content-center' style='color:green; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$sub</div>";
        }

        ?>
        <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
            <td class="col-3 text-light">
                Your Name:
            </td>
            <td>
                <input type="text" name="name" class="col-12">
            </td>
        </tr>
        <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
            <td class="col-3 text-light">
                Your ID:
            </td>
            <td>
                <input type="text" name="roll">
            </td>
        </tr>
        <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
            <td class="col-3 text-light">
                Your File:
            </td>
            <td>
                <input type="file" name="image" style="color:white;">
                <br><br>
                <input type="submit" class="btn btn-primary" value="submit">
            </td>
        </tr>

    </table>
</form>


</body>

</html>