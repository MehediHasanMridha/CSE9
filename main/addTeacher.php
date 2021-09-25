<?php include "header.php"; ?>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $dept = $_POST["dept"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $username = mysqli_real_escape_string($db->link, $username);
    $dept = mysqli_real_escape_string($db->link, $dept);
    $email = mysqli_real_escape_string($db->link, $email);
    $number = mysqli_real_escape_string($db->link, $number);

    $quarry = "INSERT INTO sir (Name, email, number, dept)  
    VALUES ('$username', '$email', '$number', '$dept')";
    $hack = $db->insert($quarry);
    if ($hack) {
        header('Location:Teacher.php');
    }
}

?>
<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher Name" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Department</label>
        <input type="text" name="dept" placeholder="Department" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="email" name="email" placeholder="Email" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Number</label>
        <input type="text" name="number" placeholder="Number" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>

</div>

</body>

</html>