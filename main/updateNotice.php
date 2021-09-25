<?php include "header.php"; ?>
<br>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $quarry="SELECT *  FROM notice WHERE id='$id'";
    $select=$db->select($quarry);
    if ($select) {
        while ($result=$select->fetch_assoc()) {
            $name = $result['title'];
            $body = $result['body'];
        }
    }  
}


?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $area = $_POST["area"];
    $quarry = "UPDATE notice SET title= '$title', body= '$area'  
                WHERE id = '$id'";
    $update = $db->update($quarry);
    if ($update) {
        header('Location:notice.php');
    }
}
?>

<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="title" placeholder="Course Title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $name;?>" required >
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea class="form-control" name="area" id="body" rows="8" required ><?php echo $body; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>

</body>

</html>