<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $quarry = "SELECT * FROM notice  WHERE id='$id'";
    $select = $db->select($quarry);
    $msg = "";
    if ($select) {
        while ($result = $select->fetch_assoc()) {
            $title = $result["title"];
            $body = $result["body"];
        }
    } else {
        $msg = "No Data Found";
    }
} else {
    header("Location:index.php");
}
?>
<br><br>
<div class="span7 container text-white">
    <div class="widget stacked widget-table action-table">
        <div class="widget-content">
            <table class="table table-striped  text-white">
                <thead class="table-bordered">

                    <tr class=" align-items-center " style="text-align:center;">
                        <th><?php echo $title; ?></th>
                    </tr>

                </thead>
               
                        
            </table>
        </div>
    </div>
    <div><p><?php echo $body; ?></p></div>
</div>
</body>

</html>