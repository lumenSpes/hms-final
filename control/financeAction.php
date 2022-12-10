<?php
session_start();
require "../model/dbConnect.php";

$username = $_SESSION['username'];
$bank = $_POST['bankName'];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // -----------validation------------ //
    
    if(empty($_POST['accNo'])){
        header("location: ../view/finance.php?error=accNoErr");
        exit();
    } else{
        $accNo = sanitize($_POST['accNo']);
    }

    // update bank info
    $sqlUpdateUserInfo = "UPDATE `users` SET `bank`= ?,`accNo`= ? WHERE `userName` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlUpdateUserInfo))
    {
        header("location: ../view/signUp.php?error=stmt2failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss",$bank, $accNo, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location:../view/dashboard.php");
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>