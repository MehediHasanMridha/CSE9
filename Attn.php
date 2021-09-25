<?php include 'inc/header.php'; ?>
<?php
$student_id = session::get('id');
$course_id = session::get('courseId');
$quarry = "select course from course where id='$course_id'";
$show = $db->select($quarry);
if ($show) {
    $result = $show->fetch_assoc();
}
?>
<?php 
    if (isset($_GET['download'])) {
        
    }
?>
<br><br>
<section>
    <div class="span7 container text-white">
        <div class="widget stacked widget-table action-table">

            <div class="widget-header float-left">
                <i class="icon-th-list"></i>
                <h3><?php
                    if (isset($result)) {
                        echo $result["course"];
                    } ?></h3>
            </div> <!-- /widget-header -->
            <div class="float-right">
                <h3>
                    <?php
                    $op = "select * from class where course_id ='$course_id' and stu_id='$student_id' and action=1";
                    $cs = $db->select($op);
                    if ($cs) {

                        $i = mysqli_num_rows($cs);
                    }
                    $per = "select * from class where course_id ='$course_id' and stu_id='$student_id'";
                    $cl = $db->select($per);
                    if ($cl) {

                        $count = mysqli_num_rows($cl);
                    }
                    $sot = '100';
                    if (isset($count) && isset($i)) {
                        $attend = $i * $sot;
                        $attend = $attend / $count;
                        if ($attend >= 50) {
                            echo "<span style='color:green;'>$attend %</span>";
                        } else {
                            echo "<span style='color:red;'>$attend %</span>";
                        }
                    } else {
                        echo "<span style='color:red;'>0 %</span>";
                    }

                    ?>
                </h3>
            </div>
            <div class="widget-content">

                <table class="table table-striped table-bordered text-white">
                    <thead>
                        <tr class=" align-items-center " style="text-align: center;">
                            <th>Class No</th>
                            <th>Record File</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $operation = "select * from class where course_id ='$course_id' and stu_id='$student_id'";
                        $cls = $db->select($operation);
                        $url = "";
                        if ($cls) {
                            $action = "";
                            while ($result1 = $cls->fetch_assoc()) {
                                if ($result1['action'] == '1') {
                                    $action = "Present";
                                } else if ($result1['action'] == '0') {
                                    $action = "Absent";
                                }
                                $cl = $result1['cla_no'];
                                $record = "select record.url, record.id
                                            from record 
                                            inner join class 
                                            on record.cl='$cl'
                                            and record.sir_no='$course_id'";
                                $get = $db->select($record);
                                if ($get) {
                                    $final = $get->fetch_assoc();
                                    $url = $final['url'];
                                    $id = $final['id'];
                                } else {
                                    $url = "No Class Record";
                                }
                        ?>

                                <tr class=" align-items-center " style="text-align: center;">
                                    <td class="col-2">Class <?php echo $result1['cla_no']; ?></td>
                                    <td class="col-7">
                                        <?php
                                        if ($url == "No Class Record") {
                                            echo "No Class Record";
                                        } else {

                                            echo "<a class='btn btn-primary' href='$url'>Download</a>";
                                            echo " ";
                                            echo "<a class='btn btn-primary' href='watch.php?id=$id'>Watch</a>";
                                        }
                                        ?>
                                    </td>
                                    <td class="col-3">
                                        <p class="display-5 fw-bolder text-uppercase"><?php echo $action; ?></p>
                                    </td>
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