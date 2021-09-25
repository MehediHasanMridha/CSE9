<?php include "inc/header.php"; ?>
<br><br>
<div class="span7 container text-white">
    <div class="widget stacked widget-table action-table">
        <div class="widget-content">
            <table class="table table-striped table-bordered text-white">
                <thead>

                    <tr class=" align-items-center " style="text-align:center;">
                        <th>Name</th>
                        <th>ID</th>
                        <th>District</th>
                        <th>Number</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $quarry = "SELECT * FROM student ORDER BY roll ASC";
                    $show = $db->select($quarry);
                    if ($show) {
                        while ($result = $show->fetch_assoc()) {
                    ?>
                            <tr class=" align-items-center " style="text-align:center;">
                                <td ><?php echo $result["username"]; ?></td>
                                <td style="word-break: break-word;"><?php echo $result["roll"]; ?></td>
                                <td><?php echo $result["dis"]; ?></td>
                                <td style="word-break: break-word;">0<?php echo $result["number"]; ?></td>
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