<?php
    session_start();
    require "../model/dbConnect.php";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(empty($_POST['PatientID'])){
            header("location: ../view/consultOnline.php?error=PatientIDErr");
            exit();
        }
        else{
            $PatientID = sanitize($_POST['PatientID']);
        }
        if(empty($_POST['link'])){
            header("location: ../view/consultOnline.php?error=linkErr");
            exit();
        }
        else{
            $link = sanitize($_POST['link']);
        }

        if(empty($_POST['instruction'])){
            header("location: ../view/consultOnline.php?error=instructionErr");
            exit();
        }
        else{
            $instruction = sanitize($_POST['instruction']);
        }

        if(isset($_POST['Submit'])){
            $patientID = $_SESSION['ID'];
            $patientFirstName = $_SESSION['FirstName'];
            $patientLastName = $_SESSION['LastName'];
            

            $sqlInsertUser = "UPDATE `prescription` SET `link`=?,`instruction`=? WHERE `pID` = ?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sqlInsertUser))
            {
                header("location: ../view/consultOnline.php?error=stmtfailed");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "sss", $link, $instruction, $PatientID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../view/dashboard.php");
        }


    }

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



?>