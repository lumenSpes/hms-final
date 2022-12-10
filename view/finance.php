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
    <title>HMS | Finance</title>
</head>
<body style="padding-right:7rem;padding-left:7rem;">

<?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $accNoErr = false;

        if(strpos($fullUrl,"error=accNoErr") == true){
            $accNoErr = true;
        }

    ?>
    <!-- header -->
    <?php require "../model/_nav.php";?>
    <main>
        <section>
        <div style="margin:auto;width:23%;margin-top:5rem;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
                <div style="margin-top:2rem;text-align:center;padding-top:0.5rem;color:#e6e6e6;">
                    <h1>Change Payment Option</h1>
                </div>
                <div>
                    <form style="margin-left:0rem;" action="../control/financeAction.php" method="post" novalidate id="f_Form" onsubmit="return isValid(this);">
                        <label style="color:#e6e6e6;" for="bankName">Select Bank</label>
                        <br>
                        <!-- <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="userName" id="userName"> -->
                        <select style="padding-right:12.5rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" id="bankName" name="bankName">
                            <!-- <option value="none">Select One</option> -->
                            <option value="dhkBank">Dhaka Bank</option>
                            <option value="brackBank">Brack Bank</option>
                            <option value="cityBank">City Bank</option>
                            <option value="ificBank">IFIC Bank</option>
                        </select>
                        <?php
                        // if($userNameEmpty === true){
                        //     echo "User Name empty!";
                        // }
                        ?>
                        <br><br><br>
                        
                        <label style="color:#e6e6e6;" for="accNo">Account No.</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="accNo" id="accNo">
                        <?php
                        if($accNoErr === true){
                            echo "Enter your account number!";
                        }
                        ?>
                        <span id="f_accErr"></span>
                        <br><br><br>
                        <input style="text-color:#e6e6e6;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;" type="submit" value="Update" name="Update">
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
    <script src="js/finanace.js"></script>
</body>
</html>