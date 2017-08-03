<?php


function getStaffNotifications(){
    
     require 'connect.php';
    $sql = $pdo->prepare("SELECT NOTIFICATION_DESCRIPTION_STAFF FROM NOTIF_STAFF WHERE UNREAD = 1 ORDER BY NOTIF_STAFF_ID DESC");
       
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if($result > 0)
    {
        foreach($result as $item)
        {

            echo "<tr>
                <td class='clickable-row'  data-href='url://www.google.com'>".$item['NOTIFICATION_DESCRIPTION_STAFF']."</td></tr>";
        }

    }
    else
    {
        echo "<tr>
                <td class='clickable-row'  data-href='url://www.google.com'>No notifications at the moment</td></tr>";
    }
    
    
}

function getEmployerNotifications(){
    require 'connect.php';
    $sql = $pdo->prepare("SELECT NOTIFICATION_DESCRIPTION_EMP FROM NOTIF_EMPLOYER WHERE UNREAD = 1 ORDER BY NOTIF_EMPLOYER_ID DESC");
       
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if($result > 0)
    {
        foreach($result as $item)
        {

            echo "
                <tr><td class='clickable-row'  data-href='url://www.google.com'>".$item['NOTIFICATION_DESCRIPTION_EMP']."</td></tr>";
        }

    }
     else
    {
        echo "<tr>
                <td class='clickable-row'  data-href='url://www.google.com'>No notifications at the moment</td></tr>";
    }




}

function getStudentNotifications(){

    require 'connect.php';
    $sql = $pdo->prepare("SELECT NOTIFICATION_DESCRIPTION_STU FROM NOTIF_STUDENT WHERE UNREAD = 1 ORDER BY NOTIF_STUDENT_ID DESC");

    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if($result > 0)
    {
        
        foreach($result as $item)
        {
            
            
            echo "<tr><td class='clickable-row'  data-href='url://www.google.com'>".$item['NOTIFICATION_DESCRIPTION_STU']."</td></tr>";
        }
        
        
    }
     else
    {
        echo "<tr>
                <td class='clickable-row'  data-href='url://www.google.com'>No notifications at the moment</td></tr>";
    }




}




?>
