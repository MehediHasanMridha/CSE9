<?php include "header.php"; ?>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $area = $_POST["area"];
    $quarry = "INSERT INTO notice(title, body) VALUES('$title', '$area')";
    $hack = $db->insert($quarry);
    if ($hack) {
        header('Location:notice.php');
    }
}
?>
<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="title" placeholder="Course Title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required >
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="area" id="body" rows="3" required ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

</div>

</body>

</html>