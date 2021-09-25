<?php include "header.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $quarry = "DELETE FROM notice WHERE id='$id'";
    $Del = $db->delete($quarry);
}
?>
<br><br>
<button type="button" class="btn btn-primary"><a href="addNotice.php" style="text-decoration:none; color:white;">Add</a></button>
<br><br>
<form action="">
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Dody</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quarry = "SELECT * FROM notice ORDER BY id ASC";
            $show = $db->select($quarry);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
                    <tr>
                        <td class="col-2"><?php echo $result['title']; ?></td>
                        <td class="col-6"><?php echo $fm->textShorten($result['body'],120); ?></td>
                        <td class="col-2"><?php echo $fm->formatDate($result['date']); ?></td>
                        <td class="col-2">
                            <button type="button" class="btn btn-primary"><a href="?id=<?php echo $result['id']; ?>" style="text-decoration:none; color:white;">Delete</a></button>
                            <button type="button" class="btn btn-primary"><a href="updateNotice.php?id=<?php echo $result['id']; ?>" style="text-decoration:none; color:white;">Update</a></button>
                    </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</form>

</div>

</body>

</html>