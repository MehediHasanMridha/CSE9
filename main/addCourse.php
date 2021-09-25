<?php include "header.php"; ?>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $quarry = "INSERT INTO course(course) VALUES('$title')";
    $hack = $db->insert($quarry);
    if ($hack) {
        header('Location:course.php');
    }
}

?>
<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="title" placeholder="Course Title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

</div>

</body>

</html>