<?php include "header.php"; ?>
<br>
<?php
if (isset($_GET['update'])) {
    $id = $_GET['update'];
    $quarry = "SELECT course  
    FROM course  
    WHERE id='$id'";
    $sel = $db->select($quarry);
    if ($sel) {
        $result = $sel->fetch_assoc();
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $title = mysqli_real_escape_string($db->link, $title);
    $quarry = "UPDATE course
    SET course = '$title'  
    WHERE id='$id'";
    $update=$db->update($quarry);
    header("Location:course.php");
}

?>

<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="title" placeholder="Course Title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['course'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>

</body>

</html>