<?php include "header.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $quarry = "DELETE FROM sir WHERE id='$id'";
    $Del = $db->delete($quarry);
}
?>
<br><br>
<button type="button" class="btn btn-primary"><a href="addTeacher.php" style="text-decoration:none; color:white;">Add</a></button>
<br><br>
<form action="">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quarry = "SELECT * FROM sir ORDER BY id DESC";
            $show = $db->select($quarry);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $result['Name']; ?></td>
                        <td><?php echo $result['email']; ?></td>
                        <td><?php echo $result['dept']; ?></td>
                        <td><?php echo $result['number']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary"><a href="?id=<?php echo $result['id']; ?>" style="text-decoration:none; color:white;">Delete</a></button>
                            <button type="button" class="btn btn-primary"><a href="updateTeacher.php?id=<?php echo $result['id']; ?>" style="text-decoration:none; color:white;">Update</a></button>
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