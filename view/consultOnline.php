<?php session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS | Consult Online</title>
</head>
<body style="padding-right:7rem;padding-left:7rem;">

<?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $PatientIDErr = false;
        $linkErr = false;
        $instructionErr = false;
        $stmtfailed = false;

        if(strpos($fullUrl,"error=PatientIDErr") == true){
            $PatientIDErr = true;
        }

        elseif(strpos($fullUrl,"error=linkErr") == true){
            $linkErr = true;
        }

        elseif(strpos($fullUrl,"error=instructionErr") == true){
            $instructionErr = true;
        }

        elseif(strpos($fullUrl,"error=stmtfailed") == true){
            $stmtfailed = true;
        }

        
    ?>

    <?php require "../model/_nav.php";?>
    <div style="margin:auto;width:23%;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
        <div style="margin:auto;">
        <?php
                        if($stmtfailed === true){
                            echo "Sql statement failed!";
                        }
                        ?>
            <form style="margin:auto;" action="../control/consultOnlineAction.php" method="post" novalidate id="co_form" onsubmit="return isValid(this);">
                <br>
                <label style="color:#e6e6e6;" for="PatientID">Patient ID</label>
                <br>
                <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="PatientID" id="PatientID">
                <?php
                        if($PatientIDErr === true){
                            echo "Patient's ID cannot be empty!";
                        }
                        ?>
                        <span id="co_pidErr"></span>
                <br><br>
                <br>
                <label style="color:#e6e6e6;" for="link">Meeting Link</label>
                <br>
                <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="url" name="link" id="link">
                <?php
                        if($linkErr === true){
                            echo "Enter a meeting link!";
                        }
                        ?>
                        <span id="co_linkErr"></span>
                <br><br><br>
                <label style="color:#e6e6e6;" for="instruction">Instruction</label>
                <br>
                <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="instruction" id="instruction">
                <?php
                        if($instructionErr === true){
                            echo "Provide meeting instructions!";
                        }
                        ?>
                        <span id="co_insErr"></span>
                <br><br>

                <input style="text-color:#e6e6e6;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;" type="submit" value="Submit" name="Submit" >
            </form>
        </div>
    </div>
    <?php include "../model/footer.php"; ?>
    <!-- js scripts -->
    <script src="js/consultOnline.js"></script>
</body>
</html>