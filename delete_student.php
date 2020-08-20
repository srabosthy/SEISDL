<?php
    include 'connection.php';
    $std_id = $_REQUEST['stdid']; 
    $query = "DELETE FROM `student` WHERE id = $std_id";
    echo $query;
    $sql = mysqli_query($conn, $query);
    if($sql)
    {
       header('Location: show_student.php');
       echo "success!!";
    }
?>