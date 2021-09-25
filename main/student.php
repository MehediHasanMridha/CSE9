<?php include "header.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM student WHERE id = $id";
    $post = $db->select($query);
    while ($result = $post->fetch_assoc()) {
        $deleteImage = $result["image"];
        unlink("../" . $deleteImage);
    }
    $quarry = "DELETE FROM student WHERE id='$id'";
    $Del = $db->delete($quarry);
    $delquery = "DELETE FROM class WHERE stu_id='$id'";
    $delClass = $db->delete($delquery);
}
?>
<br><br>
<form action="">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Number</th>
                <th>District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quarry = "SELECT * FROM student ORDER BY id DESC";
            $show = $db->select($quarry);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $result['username']; ?></td>
                        <td><?php echo $result['roll']; ?></td>
                        <td><?php echo $result['number']; ?></td>
                        <td><?php echo $result['dis']; ?></td>
                        <td><button type="button" class="btn btn-primary"><a href="?id=<?php echo $result['id']; ?>" style="text-decoration:none; color:white;">Delete</a></button></td>
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