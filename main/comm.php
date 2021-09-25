<?php include "header.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // $query = "SELECT * FROM student WHERE id = $id";
    // $post = $db->select($query);
    // while ($result = $post->fetch_assoc()) {
    //     $deleteImage = $result["image"];
    //     unlink("../" . $deleteImage);
    // }
    $quarry = "DELETE FROM comment WHERE id='$id'";
    $Del = $db->delete($quarry);
}
?>
<br><br>
<form action="">
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>ID</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quarry = "SELECT * FROM comment ORDER BY id DESC";
            $show = $db->select($quarry);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $result['name']; ?></td>
                        <td><?php echo $result['roll']; ?></td>
                        <td><?php echo $result['comment']; ?></td>
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