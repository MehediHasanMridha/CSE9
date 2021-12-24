<?php include "header.php"; ?>
<?php
if(!empty($_GET['id'])){
    $id  = $_GET['id'];
    $query = "SELECT * FROM file WHERE id = $id";
    $post = $db->select($query);
    $result = $post->fetch_assoc();
    $fileName=$result['file'];
    $fileName  = basename($fileName);
    $filePath  = "../upload/".$fileName;
    // if ($post)
    // {
    //     while ($result = $post->fetch_assoc())
    //     {

    //     }
    // }
    
    if(!empty($fileName) && file_exists($filePath)){
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        //read file 
        readfile($filePath);
        exit;
    }
    else{
        echo "file not exit";
    }

}