<?php include 'inc/header for image.php'; ?>
<?php
$studentId = session::get('id');
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $permited  = array('jpg', 'jpeg', 'png', 'gif');

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "upload/" . $unique_image;

    $err = "";
    if ($file_size > 1048567) {
        $err = "Please file size less than or equal 1MB";
    } elseif (in_array($file_ext, $permited) == false) {
        $err = "You can upload only:-" . implode(', ', $permited);
    } else {
        $query = "SELECT * FROM student WHERE id = '$studentId'";
        $post = $db->select($query);
        while ($result = $post->fetch_assoc()) {
            $deleteImage = $result["image"];
            unlink($deleteImage);
        }
        move_uploaded_file($file_temp, $uploaded_image);
        $quarry = "UPDATE student
        SET image = '$uploaded_image'  
        WHERE id='$studentId'";
        $enter = $db->insert($quarry);
        header("Location:index.php");
    }
}

?>
<form action="" method="POST" enctype="multipart/form-data">
    <?php
    if (isset($err)) {
        echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$err</div>";
    }

    ?>
    <input type="file" id="input-file" name="image" onchange={handleChange()} hidden />
    <label class="btn-upload  container d-flex align-items-center justify-content-center col-6" for="input-file" role="button">
        Upload Photo
    </label>

    <div class="container d-flex align-items-center justify-content-center ">
        <div class="preview-box"></div>
    </div>
    <br>
    <input type="submit" name="submit" class="btn-upload container d-flex align-items-center justify-content-center col-2">
</form>

</body>

</html>