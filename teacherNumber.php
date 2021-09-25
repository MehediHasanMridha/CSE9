<?php include 'inc/header.php'; ?>
<?php
$quarry = "SELECT * FROM sir ORDER BY id ASC";
$select = $db->select($quarry);
$msg = "";
?>
<br><br>
<section>
    <div class="span7 container text-white">
        <div class="widget stacked widget-table action-table">

            <div class="widget-content">
                <table class="table table-striped table-bordered text-white">
                    <thead>
                        <tr class=" align-items-center " style="text-align: center;">
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Dept</th> -->
                            <th>Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($select) {
                            while ($result = $select->fetch_assoc()) {
                                $Name = $result["Name"];
                                $email = $result["email"];
                                $Dept = $result["dept"];
                                $number = $result["number"];
                        ?>
                                <tr class=" align-items-center " style="text-align: center; word-break: break-word;">
                                    <td><?php echo $Name; ?> (<?php echo $Dept; ?>)</td>
                                    <td><?php echo $email; ?></td>
                                    <td>0<?php echo $number; ?></td>
                                </tr>
                        <?php
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div> <!-- /widget-content -->
        </div> <!-- /widget -->
    </div>
</section>
<br><br>
</body>
</html>