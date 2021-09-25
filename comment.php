<?php include "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $comment = $_POST['comment'];
    $name = mysqli_real_escape_string($db->link, $name);
    $roll = mysqli_real_escape_string($db->link, $roll);
    $comment = mysqli_real_escape_string($db->link, $comment);
    $err = '';
    $sub = '';
    if ($name == '' || $roll == '' || $comment == '') {
        $err = 'Please Fill The All Box';
    } else {

        $quarry = "insert into comment (name,roll,comment) values('$name', '$roll', '$comment')";
        $insert = $db->insert($quarry);
        $sub = "Successfully Submitted";
    }
}


?>
<form action="" method="post">
    <table class="table table-striped d-flex justify-content-center ">

        <br><br>
        <?php
        if (isset($err)) {
            echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$err</div>";
        }
        if (isset($sub)) {
            echo "<div class='justify-content-center' style='color:green; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$sub</div>";
        }
        ?>
        <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
            <td class="col-3 text-light">
                Your Name:
            </td>
            <td>
                <input type="text" name="name" class="col-12">
            </td>
        </tr>
        <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
            <td class="col-3 text-light">
                Your ID:
            </td>
            <td>
                <input type="text" name="roll">
            </td>
        </tr>
        <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
            <td class="col-3 text-light">
                <label for="comment">Comment</label>

            </td>
            <td class="">
                <div class="form-group">
                    <textarea class="form-control" name="comment" id="comment" rows="10" cols=40" placeholder=""></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="submit">
            </td>
        </tr>

    </table>
</form>

</body>

</html>