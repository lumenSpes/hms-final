<?php
session_start();
require "../model/dbConnect.php";
$isExists = false;
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['Search'])){
        if(empty($_GET['pID'])){
            header("location: ../view/viewHistory.php?error=pIDErr");
            exit();
        }
        else{
            $pID = sanitize($_GET['pID']);
        }
        
        echo $fname;
        
        $sqlFindtUser = "SELECT `id`, `pID`, `pFirstName`, `pLastName`, `pAge`, `pGender`, `disease`, `last_diagnosed`, `history`, `phone` FROM `appointments` WHERE `pID` = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sqlFindtUser))
        {
            header("location: ../view/viewHistory.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $pID);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($resultData)>0){
            if($row = mysqli_fetch_assoc($resultData)){
                $_SESSION['ID'] = $row['pID'];
                $_SESSION['FirstName'] = $row['pFirstName'];
                $_SESSION['LastName'] = $row['pLastName'];
                $_SESSION['Age'] = $row['pAge'];
                $_SESSION['Disease'] = $row['disease'];
                $_SESSION['LastDiagnosed'] = $row['last_diagnosed'];
                $_SESSION['History'] = $row['history'];
                header("location:../view/viewHistory.php?success=patientFound");
            }
        }
        
        
        else{
            header("location:../view/viewHistory.php?error=usernotfound");
                mysqli_stmt_close($stmt);
                exit();
        }
    }
}
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>