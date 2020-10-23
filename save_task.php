<?php

include("db.php");

if(isset($_POST['save_task'])){
    $fullname = $_POST['fullname'];
    $money = $_POST['money'];

    $query = "INSERT INTO tasks(fullname, money) VALUES ('$fullname', '$money')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("Query failed");
    }

    $_SESSION['message'] = 'Player registered succesfully';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");
}
?>
