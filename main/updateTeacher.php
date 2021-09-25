<?php include "header.php"; ?>
<br>
<?php
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $quarry = "SELECT * FROM sir  WHERE id='$id'";
    $select = $db->select($quarry);
    if ($select!==false) {
        while ($result = $select->fetch_assoc()) {
            $name = $result['Name'];
            $email = $result['email'];
            $dept = $result['dept'];
            $number = $result['number'];
?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="user" class="form-control" value="<?php echo $name; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Teacher Name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Department</label>
                    <input type="text" name="dept" placeholder="Department" value="<?php echo $dept; ?>" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Number</label>
                    <input type="text" name="number" placeholder="Number" value="<?php echo $number; ?>" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
<?php

        }
    }
    else{
        $msg = "No Data Found";
        if (isset($msg)) {
            echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$msg</div>";
        }
    }
}
 else {
    $msg = "No Data Found";
    if (isset($msg)) {
        echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$msg</div>";
    }
}

?>
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

    $quarry = "UPDATE sir  
    SET Name = '$name', email = '$email', number = '$number', dept='$dept'
    WHERE id = '$id' ";
    $hack = $db->update($quarry);
    if ($hack) {
        header('Location:Teacher.php');
    }
}

?>

</div>

</body>

</html>