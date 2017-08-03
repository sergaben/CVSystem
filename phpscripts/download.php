<?php
    $filepath = $_GET['path'];
    
    if (file_exists($filepath)){
        if(FALSE !== ($handler = fopen($filepath, 'r')))
        {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($filepath));
            header('Content-Transfer-Encoding: chunked'); //changed to chunked
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            
            //Send the content in chunks
            while(false !== ($chunk = fread($handler,4096)))
            {
                echo $chunk;
            }
        }
        exit;

    }


?>