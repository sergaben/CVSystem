<?php
            $url= parse_url(getenv("CLEARDB_DATABASE_URL"));
            $user = $url["user"];
            $pass = $url["pass"];
            $db = substr($url["path"],1);
            $host = $url["host"];
            $pdo = new PDO('mysql:host='.$host.';dbname='.$db,$user, $pass);
?>