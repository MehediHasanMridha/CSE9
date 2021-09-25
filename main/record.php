<?php include "header.php" ?>
<?php
$quarry = "select * from course";
$add = $db->select($quarry);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST["num"];
    $sir = $_POST["teacher"];
    $url = $_POST["url"];
    $emb = $_POST["emb"];
    $quarry = "INSERT INTO record(cl, sir_no, url, emb) VALUES('$class', '$sir', '$url', '$emb')";
    $hack = $db->insert($quarry);
    if ($hack) {
        header('Location:index.php');
    }
}

?>
<br><br>
<button type="button" class="btn btn-primary"><a href="recordUpdate.php" style="text-decoration:none; color:white;">Update Record</a></button>
<br><br>
<form action="" method="post">
    class No: <input type="number" name="num" min="1">
    <br><br>
    Course:
    <select name="teacher" id="">
        <option value="" selected>Select</option>
        <?php
        if ($add) {
            while ($result1 = $add->fetch_assoc()) {
        ?>
                <option value="<?php echo $result1['id']; ?>"><?php echo $result1['course']; ?> </option>
        <?php
            }
        }

        ?>
    </select>
    <br><br>
   Download URL: <input type="url" name="url">
    <br><br>
    Embed URL  : <input type="url" name="emb">
    <br><br>
    <input type="submit" class="btn btn-primary" value="submit">
</form>
<br><br>

</div>

</body>

</html>