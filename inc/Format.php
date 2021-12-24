<?php
    class Format  
    {
        public function formatDate($date)
        {
           return date("d-m-Y", strtotime($date));
        }
        public function textShorten($text, $limit = 400){
            $text = $text. " ";
            $text = substr($text, 0, $limit);
            $text = substr($text, 0, strrpos($text, ' '));
            $text = $text.".....";
            return $text;
           }
           public function validation($data)
           {
               $data=trim($data);
               $data=stripcslashes($data);
               $data=htmlspecialchars($data);
                return $data;
           }
           public function title()
           {
               $path=$_SERVER["SCRIPT_FILENAME"];
               $title=basename($path, '.php');
               if ($title=='index') {
                   $title='home';
               }
               elseif ($title=='contact') {
                   $title='contact';
               }
               return $title=ucfirst($title);

           }


            // function df($urlFile)
            // {
            //     $filepath = $urlFile;
            //     $file_name  =   basename($filepath);
            //     // //save the file by using base name
            //     // // $filepath = 'destination/' . $file_name;
            //     // $fn         =   file_put_contents($file_name,file_get_contents($urlFile));
            //     header("Cache-Control: public");
            //     header("Content-Description: FIle Transfer");
            //     header("Content-Disposition: attachment; filename=$file_name");
            //     header("Content-Type: image/peg");
            //     header("Content-Transfer-Emcoding: binary");

            //     readfile($filepath);
            // }
            function df($urlFile){
                $file_name  =   basename($urlFile);
                //save the file by using base name
                $fn         =   file_put_contents($file_name,file_get_contents($urlFile));
                header("Expires: 0");
                header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0, pre-check=0", false);
                header("Pragma: no-cache");
                header("Content-type: application/file");
                header('Content-length: '.filesize($file_name));
                header('Content-disposition: attachment; filename="'.basename($file_name).'"');
                readfile($file_name);
            }
    }
    


?>