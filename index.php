<?php include "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $course_id = $_POST['sir'];
  $msg = "";
  if ($course_id == '') {
    $msg = "Please Enter a course";
  } else {
    session::set("courseId", $course_id);
    header("Location:Attn.php");
  }
}
?>
<?php
$name = session::get('username');
$roll = Session::get('roll');
$select = "select * from student where username='$name' and roll='$roll'";
$student = $db->select($select);
?>
<br><br><br><br>
<?php
if (isset($msg)) {
  echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$msg</div>";
}
?>

<div class="card mb-3 bg-secondary d-flex align-items-center justify-content-center" style="max-width: 540px; margin: 0 auto; border-radius: 15px;background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
  <div class="row g-0">
    <div class="col-md-4  float-left ">

      <?php
      if ($student) {
        while ($sh = $student->fetch_assoc()) {
      ?>
          <img src="<?php echo $sh['image']; ?>" class="img-fluid rounded-start d-flex align-items-center justify-content-center" height="250px" width="250px" style="margin:auto auto; border-radius: 15px; padding:0 10px;" alt="Post here">
      <?php
        }
      }
      ?>
      <br>
      <a href="updateImage.php" class='btn btn-success d-flex align-items-center justify-content-center'>Update Image</a>
    </div>
    <div class="col-md-8">
      <div class="card-body text-white">
        <?php
        $select = "select * from student where username='$name' and roll='$roll'";
        $student = $db->select($select);
        if ($student) {
          while ($show = $student->fetch_assoc()) {
        ?>
            <h5 class="card-title">Name: <?php echo $show['username']; ?></h5>
            <p class="card-title">ID : <?php echo $show['roll']; ?></p>
        <?php
          }
        }
        ?>
        <label for="sir">Course :</label>
        <?php
        $quarry = "select * from course";
        $sir = $db->select($quarry);
        ?>
        <form action="" method="post">
          <select name="sir" id="" class="btn text-white bg-dark">
            <option class="btn text-left text-white bg-dark" value="" selected>Select Course</option>
            <?php
            if ($sir) {
              while ($result = $sir->fetch_assoc()) {
            ?>
                <option class="btn text-left text-white bg-dark" name="sir" value="<?php echo $result["id"]; ?>"><?php echo $result['course']; ?></option>
            <?php
              }
            }
            ?>
          </select>
          <br><br>
          <input type="submit" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>


</body>

</html>