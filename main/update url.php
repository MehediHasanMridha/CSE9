<?php include "header.php" ?>
<?php
$id = session::get("recordId");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST["url"];
    $emb = $_POST["emb"];
    $quarry = "UPDATE record SET url='$url',emb='$emb' WHERE id='$id'";
    $hack = $db->update($quarry);
    header('Location:index.php');
}
?>
<?php
$quarry = "select * from record where id='$id'";
$add = $db->select($quarry);
$msg = '';
if ($add) {
    while ($result = $add->fetch_assoc()) {
        $url = $result['url'];
        $emb = $result['emb'];
    }
} else {
    $msg = 'NO Data Found';
}

?>
<form action="" method="post">
    <?php
    if (isset($msg)) {
        echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$msg</div>";
    }

    ?>
    <br><br>
    Download URL:
    <input type="url" name="url" value="<?php echo $url; ?>">
    <br><br>
    Embed URL:
    <input type="url" name="emb" value="<?php echo $emb; ?>">
    <br><br>
    <input type="submit" class="btn btn-primary" value="submit">
</form>
<br><br>

</div>

</body>

</html>