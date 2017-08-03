<?php
// the function below will delete html tags and convert double and single quotes into readable text so any strange input is handle properly
function escape($string){
        
    return htmlspecialchars($string,ENT_QUOTES,'UTF-8');
}