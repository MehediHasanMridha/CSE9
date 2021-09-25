<?php include "header.php"; ?>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $pass = $_POST["pass"];
    $quarry = "INSERT INTO admin(username, password) VALUES('$title', '$pass')";
    $hack = $db->insert($quarry);
    if ($hack) {
        header('Location:admin.php');
    }
}

?>
<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" name="title" placeholder="Username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">password</label>
        <input type="text" name="pass" placeholder="Password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

</div>

</body>

</html>