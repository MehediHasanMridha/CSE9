<?php include "inc/header.php"; ?>
<?php
require 'vendor/autoload.php';
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
$msg = '';
$err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $roll = strtoupper($_POST['roll']);
    session::set('ggg', $roll);
    $date = $_POST['date'];
    $date=$fm->formatDate($date);
    $session = $_POST['session'];
    $hall = $_POST['hall'];
    $image = $_FILES['file']['tmp_name'];
    $signature = $_FILES['signature']['tmp_name'];
    $village = $_POST['village'];
    $postOffice = $_POST['postOffice'];
    $thana = $_POST['thana'];
    $district = $_POST['district'];
    $bl = strtoupper($_POST['bl']);
    if ($name != "" && $roll != "" && $date != "" && $session != "" && $hall != "" && $image != "" && $signature != "") {
        if ($_FILES['file']['type'] == 'image/jpeg' && $_FILES['signature']['type'] == 'image/jpeg') {
            list($widthFile, $heightFile) = getimagesize($image);
            list($widthSignature, $heightSignature) = getimagesize($signature);
            $nCard = imagecreatetruecolor(2100, 1297);
            $mainCard = imagecreatefromjpeg('idCard/front.jpg');
            imagecopyresized($nCard, $mainCard, 0, 0, 0, 0, 2100, 1297, 8192, 5137);
            $nImage = imagecreatetruecolor(394, 453);
            $mainImage = imagecreatefromjpeg($image);
            imagecopyresized($nImage, $mainImage, 0, 0, 0, 0, 394, 453, $widthFile, $heightFile);
            imagecopy($nCard, $nImage, 1657, 420, 0, 0, 394, 453);
            $nSignature = imagecreatetruecolor(472, 113);
            $mainSignature = imagecreatefromjpeg($signature);
            imagecopyresized($nSignature, $mainSignature, 0, 0, 0, 0, 472, 113, $widthSignature, $heightSignature);
            imagecopy($nCard, $nSignature, 1550, 1075, 0, 0, 472, 113);
            $font = "font/timr65w.ttf";
            $color1 = imagecolorallocate($nCard, 38, 86, 166);
            imagefttext($nCard, 50, 0, 345, 523, $color, realpath($font), $name);
            $color = imagecolorallocate($nCard, 19, 21, 22);
            imagefttext($nCard, 48, 0, 500, 848, $color, realpath($font), $roll);
            imagefttext($nCard, 48, 0, 573, 627, $color, realpath($font), $date);
            imagefttext($nCard, 48, 0, 1360, 850, $color, realpath($font), $session);
            imagefttext($nCard, 48, 0, 280, 940, $color, realpath($font), $hall);
            imagejpeg($nCard, "output/" . $roll . 'f.jpg');
            header("Location:viewId.php");
        } elseif ($_FILES['file']['type'] == 'image/jpeg' && $_FILES['signature']['type'] == 'image/png') {
            list($widthFile, $heightFile) = getimagesize($image);
            list($widthSignature, $heightSignature) = getimagesize($signature);
            $nCard = imagecreatetruecolor(2100, 1297);
            $mainCard = imagecreatefromjpeg('idCard/front.jpg');
            imagecopyresized($nCard, $mainCard, 0, 0, 0, 0, 2100, 1297, 8192, 5137);
            $nImage = imagecreatetruecolor(472, 591);
            $mainImage = imagecreatefromjpeg($image);
            imagecopyresized($nImage, $mainImage, 0, 0, 0, 0, 394, 453, $widthFile, $heightFile);
            imagecopy($nCard, $nImage, 1657, 420, 0, 0, 394, 453);
            $nSignature = imagecreatetruecolor(472, 113);
            $mainSignature = imagecreatefrompng($signature);
            imagecopyresized($nSignature, $mainSignature, 0, 0, 0, 0, 500, 113, $widthSignature, $heightSignature);
            imagecopy($nCard, $nSignature, 1550, 1075, 0, 0, 472, 113);
            $font = "font/timr65w.ttf";
            $color1 = imagecolorallocate($nCard, 38, 86, 166);
            imagefttext($nCard, 50, 0, 345, 523, $color, realpath($font), $name);
            $color = imagecolorallocate($nCard, 19, 21, 22);
            imagefttext($nCard, 48, 0, 500, 848, $color, realpath($font), $roll);
            imagefttext($nCard, 48, 0, 573, 627, $color, realpath($font), $date);
            imagefttext($nCard, 48, 0, 1360, 850, $color, realpath($font), $session);
            imagefttext($nCard, 48, 0, 280, 940, $color, realpath($font), $hall);
            imagejpeg($nCard, "output/" . $roll . 'f.jpg');
            header("Location:viewId.php");
        } elseif ($_FILES['file']['type'] == 'image/png' && $_FILES['signature']['type'] == 'image/jpeg') {
            list($widthFile, $heightFile) = getimagesize($image);
            list($widthSignature, $heightSignature) = getimagesize($signature);
            $nCard = imagecreatetruecolor(2100, 1297);
            $mainCard = imagecreatefromjpeg('idCard/front.jpg');
            imagecopyresized($nCard, $mainCard, 0, 0, 0, 0, 2100, 1297, 8192, 5137);
            $nImage = imagecreatetruecolor(472, 591);
            $mainImage = imagecreatefrompng($image);
            imagecopyresized($nImage, $mainImage, 0, 0, 0, 0, 394, 453, $widthFile, $heightFile);
            imagecopy($nCard, $nImage, 1657, 420, 0, 0, 394, 453);
            $nSignature = imagecreatetruecolor(472, 113);
            $mainSignature = imagecreatefromjpeg($signature);
            imagecopyresized($nSignature, $mainSignature, 0, 0, 0, 0, 500, 113, $widthSignature, $heightSignature);
            imagecopy($nCard, $nSignature, 1550, 1075, 0, 0, 472, 113);
            $font = "font/timr65w.ttf";
            $color1 = imagecolorallocate($nCard, 38, 86, 166);
            imagefttext($nCard, 50, 0, 345, 523, $color, realpath($font), $name);
            $color = imagecolorallocate($nCard, 19, 21, 22);
            imagefttext($nCard, 48, 0, 500, 848, $color, realpath($font), $roll);
            imagefttext($nCard, 48, 0, 573, 627, $color, realpath($font), $date);
            imagefttext($nCard, 48, 0, 1360, 850, $color, realpath($font), $session);
            imagefttext($nCard, 48, 0, 280, 940, $color, realpath($font), $hall);
            imagejpeg($nCard, "output/" . $roll . 'f.jpg');
            header("Location:viewId.php");
        } elseif ($_FILES['file']['type'] == 'image/png' && $_FILES['signature']['type'] == 'image/png') {
            list($widthFile, $heightFile) = getimagesize($image);
            list($widthSignature, $heightSignature) = getimagesize($signature);
            $nCard = imagecreatetruecolor(2100, 1297);
            $mainCard = imagecreatefromjpeg('idCard/front.jpg');
            imagecopyresized($nCard, $mainCard, 0, 0, 0, 0, 2100, 1297, 8192, 5137);
            $nImage = imagecreatetruecolor(472, 591);
            $mainImage = imagecreatefrompng($image);
            imagecopyresized($nImage, $mainImage, 0, 0, 0, 0, 394, 453, $widthFile, $heightFile);
            imagecopy($nCard, $nImage, 1657, 420, 0, 0, 394, 453);
            $nSignature = imagecreatetruecolor(472, 113);
            $mainSignature = imagecreatefrompng($signature);
            imagecopyresized($nSignature, $mainSignature, 0, 0, 0, 0, 500, 113, $widthSignature, $heightSignature);
            imagecopy($nCard, $nSignature, 1550, 1075, 0, 0, 472, 113);
            $font = "font/timr65w.ttf";
            $color1 = imagecolorallocate($nCard, 38, 86, 166);
            imagefttext($nCard, 50, 0, 345, 523, $color, realpath($font), $name);
            $color = imagecolorallocate($nCard, 19, 21, 22);
            imagefttext($nCard, 48, 0, 500, 848, $color, realpath($font), $roll);
            imagefttext($nCard, 48, 0, 573, 627, $color, realpath($font), $date);
            imagefttext($nCard, 48, 0, 1360, 850, $color, realpath($font), $session);
            imagefttext($nCard, 48, 0, 280, 940, $color, realpath($font), $hall);
            imagejpeg($nCard, "output/" . $roll . 'f.jpg');
            header("Location:viewId.php");
        } else {
            $err = "Image & Signature type format must be jpg or png";
        }
    } else {
        $msg = "Please Fill The All Box ";
    }
    if ($village != "" && $postOffice != "" && $thana != "" && $district != "") {
        file_put_contents('output/' . $roll . 'barcode.png', $generator->getBarcode($roll,  $generator::TYPE_CODE_128, 6, 116));
        $Barcode = 'output/' . $roll . 'barcode.png';
        $newimage = imagecreatetruecolor(2100, 1300);
        $source = imagecreatefromjpeg('idCard/Back.jpg');
        imagecopyresized($newimage, $source, 0, 0, 0, 0, 2100, 1297, 8191, 5059);
        $stamp = imagecreatefrompng($Barcode);
        imagecopy($newimage, $stamp, 695, 1100, 0, 0, 754, 128);
        $font = "font/Time Roman Bold.ttf";
        $color = imagecolorallocate($newimage, 19, 21, 22);
        imagefttext($newimage, 46, 0, 860, 624, $color, realpath($font), $village);
        imagefttext($newimage, 46, 0, 860, 711, $color, realpath($font), $postOffice);
        imagefttext($newimage, 46, 0, 1555, 624, $color, realpath($font), $thana);
        imagefttext($newimage, 46, 0, 1555, 711, $color, realpath($font), $district);
        imagefttext($newimage, 48, 0, 540, 550, $color, realpath($font), $bl);
        imagejpeg($newimage, "output/" . $roll . 'b.jpg');
    } else {
        $msg = "Please Fill The All Box";
    }
}

?>
<main class="pt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-striped d-flex justify-content-center mt-5">
            <?php
            if (isset($msg)) {
                echo "<div class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;'>$msg</div>";
            }
            if (isset($err)) {
                echo "<div  class='justify-content-center' style='color:red; text-align:center;font-size: 1.2rem;line-height: 2.5;' style='word-break: break-word'>$err</div>";
            }
            ?>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Your Name:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="name" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Your ID:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="roll" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Date of Birth:</p>
                        </div>
                        <div class="col-8">
                            <input type="date" name="date" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>SESSION:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="session" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Hall:</p>
                        </div>
                        <div class="col-8">
                            <select name="hall" id="" style="width: 100%;">
                                <option value="" selected>Select Hall</option>
                                <option value="Shadhinota Dibos">Shadhinota Dibos Hall</option>
                                <option value="Bijoy Dibos">Bijoy Dibos Hall</option>
                                <option value="Sheikh Rasel">Sheikh Rasel Hall</option>
                                <option value="Bangamata Sheikh Fazilatunnesa Mujib">Bangamata Sheikh Fazilatunnesa Mujib Hall
                                </option>
                                <option value="Sheikh Rehana">Sheikh Rehana Hall</option>
                                <option value="New Girls">New Girls Hall</option>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Village:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="village" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Post Office:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="postOffice" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Thana:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="thana" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>District:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="district" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Blood:</p>
                        </div>
                        <div class="col-8">
                            <input type="text" name="bl" style="width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Picture:</p>
                        </div>
                        <div class="col-8">
                            <input type="file" name="file" class="col-9" style="background-color:aliceblue;border-radius:3px; width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <div class="row">
                        <div class="col-4 text-light">
                            <p>Signature:</p>
                        </div>
                        <div class="col-8">
                            <input type="file" name="signature" class="col-9" style="background-color:aliceblue;border-radius:3px; width: 100%;">
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="text-center" style="background: #141E30;background: -webkit-linear-gradient(to right, #243B55, #141E30);background: linear-gradient(to right, #243B55, #141E30);">
                <td>
                    <input type="submit" value="Submit">
                </td>
            </tr>

        </table>
    </form>
    <br><br><br><br><br>
</main>
</body>

</html>