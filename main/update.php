<?php include "header.php"; ?>
<?php
$id = session::get("classId");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $update = "update class set action='$action' where id='$id'";
    $up = $db->update($update);
    header("Location:index.php");
}

?>
<form action="" method="post">
    <table class="table">
        <thead>
            <tr>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $quarry = "select action from class where id = '$id'";
                $re = $db->select($quarry);
                $result = $re->fetch_assoc();

                ?>
                <td>
                    <input type="text" name="action" value="<?php echo $result['action'] ?>">
                </td>
            </tr>
        </tbody>
    </table>
    <input type="submit" class="btn btn-primary" value="submit">
</form>
<br><br>

</div>

</body>

</html>