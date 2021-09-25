<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $quarry = "SELECT emb FROM record WHERE id = '$id'";
    $result = $db->select($quarry);
    $show = $result->fetch_assoc();
} else {
    header("Location:index.php");
}

?>
<br><br>
<div class="d-flex justify-content-center col-12">

    <iframe src="<?php echo $show['emb']; ?>" height="400px" width="600px" frameborder="0"></iframe>

</div>







<br><br>
</body>

</html>