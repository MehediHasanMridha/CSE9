<?php include "header.php"; ?>
<?php

$quarry = "select * from course";
$add = $db->select($quarry);

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['num'];
    $teacher = $_POST['teacher'];
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }
    $quarry = "select * from class where cla_no='$number' and course_id='$teacher'";
    $enter = $db->select($quarry);
    $err = "";
    if ($enter) {
        $err = "This Class No is Already Exists. Please Select Another Class";
    } else {
        $quarry = "SELECT * FROM student";
        $show = $db->select($quarry);
        while ($final = $show->fetch_assoc()) {
            $student = $final['id'];
            $quarry = "insert into class(cla_no, course_id, stu_id) values('$number', '$teacher', '$student')";
            $insert = $db->insert($quarry);
        }
        if (isset($action)) {
            foreach ($action as $value) {
                $quarry = "update class
                        set action=1
                        where stu_id='$value'";
                $att = $db->update($quarry);
            }
        }
    }
}

?>
<br><br>
<a href="class update.php" class="float-left btn btn-primary">Update Class</a>
<a href="manualClassUpdate.php" class="float-right btn btn-primary">Manual Update</a>
<form action="" method="post">
    <br><br>
    <?php
    if (isset($err)) {
        echo "<span style='color:red;font-size: 22px;'>$err</span>";
    }

    ?>
    <br><br>
    class No: <input type="number" name="num" min="0">
    <br><br><br>
    Course:
    <select name="teacher" id="">
        <option value="" selected>Select</option>
        <?php
        if ($add) {
            while ($result1 = $add->fetch_assoc()) {
        ?>
                <option value="<?php echo $result1['id']; ?>"><?php echo $result1['course']; ?> </option>
        <?php
            }
        }

        ?>
    </select>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quarry = "SELECT * FROM student ORDER BY roll ASC";
            $show = $db->select($quarry);
            if ($show) {
                while ($result = $show->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $result['username']; ?></td>
                        <td><?php echo $result['roll']; ?></td>
                        <td>
                            <input type="checkbox" name="action[]" value="<?php echo $result['id']; ?>">
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <input type="submit" class="btn btn-primary" value="submit">
</form>
<br><br>

</div>

</body>

</html>