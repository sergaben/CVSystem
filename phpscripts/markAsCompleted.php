<?php

    require 'connect.php';

    $sql=$pdo->prepare("UPDATE CV SET CV_COMPLETED = 1 WHERE CV_ID = :CV_ID ");
    


?>