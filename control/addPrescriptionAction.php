<?php
    session_start();
    require "../model/dbConnect.php";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(empty($_POST['medicineName'])){
            header("location: ../view/addPrescription.php?error=medicineNameErr");
            exit();
        }
        else{
            $medicineName = sanitize($_POST['medicineName']);
        }

        if(empty($_POST['dossage'])){
            header("location: ../view/addPrescription.php?error=dossageErr");
            exit();
        }
        else{
            $dossage = sanitize($_POST['dossage']);
        }

        if(isset($_POST['Submit'])){
            $patientID = $_SESSION['ID'];
            $patientFirstName = $_SESSION['FirstName'];
            $patientLastName = $_SESSION['LastName'];
            

            $sqlInsertUser = "INSERT INTO `prescription`(`pID`, `firstName`, `lastName`, `medicine`, `dosage`) VALUES (?,?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sqlInsertUser))
            {
                header("location: ../view/addPrescription.php?error=stmtfailed");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "sssss",$patientID, $patientFirstName, $patientLastName, $medicineName, $dossage);
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