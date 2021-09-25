<?php include "header.php"; ?>
<form action="">
  <table class="table">
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