<?php include "header.php"; ?>
<?php $count=0;?>
<form action="">
  <table class="table">
    <?php 
    $quarry = "SELECT * FROM student";
    $show = $db->select($quarry);
    $result=mysqli_num_rows($show);
    ?>
    <br>
    <h4> Total Students: <?php echo $result;?></h4>
    <br>
    
    <thead>
      <tr>
        <th>Name</th>
        <th>ID</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $quarry = "SELECT * FROM student ORDER BY id DESC";
      $show = $db->select($quarry);
      if ($show) {
        while ($result = $show->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $result['username']; ?></td>
            <td><?php echo $result['roll']; ?></td>
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