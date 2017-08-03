<?php


    
function sendEmail($comment,$emailTo,$studentName,$subject,$staffName,$kunumber,$emailFrom)
{
    //$commentPlusText = $comment;
    $email_from = $emailFrom;
    $email_subject = $subject;
    $email_body = $comment;  
    $to = $emailTo;
    $headers ="From: $email_from \r\n";
    $headers .= "Reply-To:$to";
    var_dump($headers);
    mail($to,$email_subject,$email_body,$headers);
    
    //$comment,$emailTo,$studentName,$subject,$staffName,$kunumber,$emailFrom
    
}




?>