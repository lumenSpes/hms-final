<?php
session_start();
if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
    header("location:../view/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS | Diagonosis</title>
</head>
<body style="padding-right:7rem;padding-left:7rem;">

<?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $patientIdErr = false;

        if(strpos($fullUrl,"error=patientIdErr") == true){
            $patientIdErr = true;
        }


    ?>

    <!-- header -->
    <?php require "../model/_nav.php";?>
    <main>
        <section>
        <div style="margin:auto;width:23%;margin-top:5rem;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
                <div style="margin-top:4rem;text-align:center;padding-top:0.5rem;color:#e6e6e6;">
                    <h1>Add Test</h1>
                </div>
                <div>
                    <form style="margin-left:0rem;" action="../control/diagonosisAction.php" method="post" novalidate id="d_form" onsubmit="return isValid(this);">
                        <label style="color:#e6e6e6;" for="patientId">Patient Id</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="patientId" id="patientId" value="<?php if(isset($_GET['patientId'])){echo $_GET['patientId']; }?>">
                        <?php
                        if($patientIdErr === true){
                            echo "Patient Id cannot be empty!";
                        }
                        ?>
                        <span id="d_pidErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="testName">Test Name</label>
                        <br>
                        <select style="padding-right:3.8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" id="testName" name="testName">
                            <!-- <option value="none">Select One</option> -->
                            <option value="Electrocardiogram">Electrocardiogram</option>
                            <option value="Echocardiogram">Echocardiogram</option>
                            <option value="Coronary Angiogram">Coronary Angiogram</option>
                            <option value="Transesophageal Echocardiography">Transesophageal Echocardiography</option>
                        </select>
                        <br><br><br>
                        
                        <input style="text-color:#e6e6e6;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;" type="submit" value="Submit">
                    </form>
                </div>
                
                <?php
                    // if($stmtFailed === true){
                    //     echo "Statement failed!";
                    // }
                    // if($wrongCredentials === true || $userNotFound === true){
                    //     echo "<p style='text-align:center;'>Invalid credentials!</p>";
                    // }
                ?>
            </div>
        </section>
    </main>
    <!-- footer -->
    <?php include "../model/footer.php"; ?>
    <!-- js scripts -->
    <script src="js/diagonosis.js"></script>
</body>
</html>