<?php include "header.php" ?>
<?php
$quarry = "select * from course";
$add = $db->select($quarry);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST["num"];
    $sir = $_POST["teacher"];
    $msg = "";
    $quarry = "SELECT id FROM record WHERE cl='$class' AND sir_no='$sir'";
    $hack = $db->select($quarry);
    if ($hack!=false) {
            $result = $hack->fetch_assoc();
            session::set("recordId", $result["id"]);
            header('Location:update url.php');
        }
        else {
            $msg = 'NO Data Found';
        }
}

?>
<br><br>
<form action="" method="post">
    <?php
    if (isset($msg)) {
        echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$msg</div>";
    }

    ?>
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
    <input type="submit" class="btn btn-primary" value="submit">
</form>
<br><br>

</div>

</body>

</html>