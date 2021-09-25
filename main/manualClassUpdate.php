<?php include "header.php"; ?>
<?php
$quarry = "select * from course";
$add = $db->select($quarry);
$msg = '';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['num'];
    $teacher = $_POST['teacher'];
    $student = $_POST['student'];
    $action = $_POST['action'];
    $number = mysqli_real_escape_string($db->link, $number);
    $teacher = mysqli_real_escape_string($db->link, $teacher);
    $student = mysqli_real_escape_string($db->link, $student);
    $action = mysqli_real_escape_string($db->link, $action);
    if ($number == '' || $student == '' || $action == '' || $teacher == '') {
        $msg = "Please Fill the All Box";
    } else {
        $selectStudent = "select id from student where roll='$student'";
        $stuId = $db->select($selectStudent);
        if (isset($stuId)) {
            $re = $stuId->fetch_assoc();
            $studentId = $re['id'];
        }
        $quarry = "INSERT INTO class (cla_no, course_id, stu_id, action)  
                    VALUES ('$number', '$teacher', '$studentId', '$action')";
        $show = $db->insert($quarry);
        if (isset($show)) {
            $msg = "Data saved successfully";
        }
    }
}


?>
<br><br>
<form action="" method="post">
    <?php
    if (isset($msg)) {
        echo "<span style='color:red;font-size: 20px;'>$msg</span>";
    }
    ?>
    <br><br>
    <table>
        <tr>
            <td class="col-8">
                class No:
            </td>
            <td>
                <input type="number" name="num" min="0">
            </td>
        </tr>
        <tr>
            <td class="col-8">
                Course:
            </td>
            <td>
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
            </td>
        </tr>

        <tr>
            <td class="col-8">
                Student ID:
            </td>
            <td>
                <input type="text" name="student">
            </td>
        </tr>
        <tr>
            <td class="col-8">
                Action:
            </td>
            <td>
                <select name="action" id="">
                    <option value="">Select</option>
                    <option value="1">Present</option>
                    <option value="0">Absent</option>
                </select>
            </td>
        </tr>
    </table>
    <br>

    <input type="submit" class="btn btn-primary" value="submit">

    <!-- <a href="update.php?=<?php if (isset($result)) {
                                    // echo $result['id'];
                                } ?>" class="btn btn-primary" name='submit'>Submit</a> -->

</form>
<br><br>

</div>

</body>

</html>