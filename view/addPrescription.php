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
    <title>HMS | Add Prescription</title>
</head>
<body style="padding-right:7rem;padding-left:7rem;">

<?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $medicineNameErr = false;
        $dossageErr = false;

        if(strpos($fullUrl,"error=medicineNameErr") == true){
            $medicineNameErr = true;
        }

        elseif(strpos($fullUrl,"error=dossageErr") == true){
            $dossageErr = true;
        }

    ?>

    <?php require "../model/_nav.php";?>
    <div style="margin:auto;width:23%;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
        <div style="margin:auto;">
            <form style="margin:auto;" action="../control/addPrescriptionAction.php" method="post" novalidate id="ap_form" onsubmit="return isValid(this);">
                <br>
                <label style="color:#e6e6e6;" for="medicineName">Medicine Name</label>
                <br>
                <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="medicineName" id="medicineName">
                    <?php
                        if($medicineNameErr === true){
                            echo "Please provide a medecine!";
                        }
                    ?>
                    <span id="ap_mname"></span>
                <br><br><br>
                <label style="color:#e6e6e6;" for="dossage">Dossage</label>
                <br>
                <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="dossage" id="dossage">
                <?php
                        if($dossageErr === true){
                            echo "Provide dossage instructions!";
                        }
                        ?>
                        
                    <span id="ap_dossage"></span>
                <br><br>
                <input style="text-color:#e6e6e6;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;" type="submit" value="Submit" name="Submit" >
            </form>
        </div>
    </div>
    <?php include "../model/footer.php"; ?>
    <!-- js scripts -->
    <script src="js/addPrescription.js"></script>
</body>
</html>