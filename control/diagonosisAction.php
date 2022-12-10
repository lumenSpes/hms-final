<?php
session_start();
require "../model/dbConnect.php";

$testName = $_POST['testName'];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // -----------validation------------ //
    
    if(empty($_POST['patientId'])){
        header("location: ../view/diagonosis.php?error=patientIdErr");
        exit();
    } else{
        $patientId = sanitize($_POST['patientId']);
    }

    // update bank info
    $sqlUpdateUserInfo = "UPDATE `prescription` SET `medicalDiagonosis`= ? WHERE `pID` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlUpdateUserInfo))
    {
        header("location: ../view/diagonosis.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss",$testName, $patientId);
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