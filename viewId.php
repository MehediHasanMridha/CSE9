<?php include 'inc/headerId.php'; ?>
<?php
$roll = session::get('ggg');
if (isset($_GET['id']) && $_GET['id'] == 1) {
    unlink("output/" . $roll . 'f.jpg');
    unlink("output/" . $roll . 'b.jpg');
    unlink("output/" . $roll . 'barcode.png');
    header("Location:card.php");
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <a href="?id=1" class="btn-upload container d-flex align-items-center justify-content-center col-2" style=" text-decoration:none;">Delete Cache Memory</a>
    <div class="container d-flex align-items-center justify-content-center ">
        <div class="preview-box"><img src="<?php echo "output/" . $roll . 'f.jpg'; ?>" id="image" onload="javascript:(function(){setTimeout(function(){document.getElementById('image').src=document.getElementById('image').src.split('?')[0]+'?time='+new Date().getTime();},10);}())" alt=""></div>
    </div>
    <br>
    <a href="<?php echo "output/" . $roll . 'f.jpg'; ?>" name="del" class="btn-upload container d-flex align-items-center justify-content-center col-2" style=" text-decoration:none;" download>Download</a>
    <div class="container d-flex align-items-center justify-content-center ">
        <div class="preview-box"><img src="<?php echo "output/" . $roll . 'b.jpg'; ?>" id="picture" onload="javascript:(function(){setTimeout(function(){document.getElementById('picture').src=document.getElementById('picture').src.split('?')[0]+'?time='+new Date().getTime();},10);}())" alt=""></div>
    </div>
    <br>
    <a href="<?php echo "output/" . $roll . 'b.jpg'; ?>" class="btn-upload container d-flex align-items-center justify-content-center col-2" style=" text-decoration:none;" download>Download</a>
</form>

</body>

</html>