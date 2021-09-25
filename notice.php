<?php include "inc/header.php"; ?>
<br><br>
<div class="span7 container text-white">
    <div class="widget stacked widget-table action-table">
        <div class="widget-content">
            <table class="table table-striped table-bordered text-white">
                <thead>

                    <tr class=" align-items-center " style="text-align:center;">
                        <th>Date</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $quarry = "SELECT * FROM notice ORDER BY id DESC";
                    $show = $db->select($quarry);
                    if ($show) {
                        while ($result = $show->fetch_assoc()) {
                    ?>
                            <tr class=" align-items-center " style="text-align:center;">
                                <td class="col-2"><?php echo $fm->formatDate($result["date"]); ?></td>
                                <td class="col-8"><?php echo $result["title"]; ?></td>
                                <td class="col-2"><button type="button" class="btn btn-primary"><a href="view.php?id=<?php echo $result["id"]; ?>" style="text-decoration:none; color:white;">View</a></button></td>
                            </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

</html>