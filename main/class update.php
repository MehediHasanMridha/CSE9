<?php include "header.php"; ?>
<?php

$quarry = "select * from course";
$add = $db->select($quarry);
$con = '';
// $selectStudent = "select * from student";
// $addStudent = $db->select($selectStudent);

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['num'];
    $teacher = $_POST['teacher'];
    $student = $_POST['student'];
    $selectStudent = "select id from student where roll='$student'";
    $stuId = $db->select($selectStudent);
    if (isset($stuId)) {
        $re = $stuId->fetch_assoc();
        $studentId = $re['id'];
    }
    $quarry = "SELECT id FROM class WHERE cla_no='$number' AND course_id='$teacher' AND stu_id='$studentId'";
    $show = $db->select($quarry);
    if (isset($show)) {
        $result = $show->fetch_assoc();
        session::set("classId", $result['id']);
        // echo session::get("classId");
        header("Location:update.php");
    }
}


?>
<br><br>
<form action="" method="post">
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