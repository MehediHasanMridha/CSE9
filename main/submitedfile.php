<?php include "header.php"; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM file WHERE id = $id";
    $post = $db->select($query);
    if ($post) {
        while ($result = $post->fetch_assoc()) {
            $deleteImage = $result["file"];
            unlink("../" . $deleteImage);
        }
        $quarry = "DELETE FROM file WHERE id='$id'";
        $Del = $db->delete($quarry);
    }
}
?>
<form action="" method="get" enctype="multipart/form">
    <?php
    $quarry = "SELECT * FROM file";
    $show = $db->select($quarry);
    if ($show) {
        $result = mysqli_num_rows($show);
    }
    else {
        $result=0;
    }
    ?>
    <br>
    <h4> Total File: <?php echo $result;?></h4>
    <br> 
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quarry = "SELECT * FROM file ORDER BY roll ASC";
            $show = $db->select($quarry);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $result['roll']; ?></td>
                        <td><?php echo $result['file']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary"><a href="?id=<?php echo $result['id']; ?>" style="text-decoration:none; color:white;">Delete</a></button>
                            <button type="button" class="btn btn-primary"><a href="<?php echo "../" . $result['file']; ?>" style="text-decoration:none; color:white;" download>Download</a></button>
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