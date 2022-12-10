<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS | Forgot Password</title>
</head>
<body>
<?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $userNameErr = false;
        $emailErr = false;
        $passwordErr = false;
        $confirmPasswordErr = false;
        $emailConvensionErr = false;
        $stmtfailed = false;
        $passAndConfPassMismatchErr = false;
        $userNotFound = false;

        if(strpos($fullUrl,"error=userNameErr") == true){
            $userNameErr = true;
        }

        elseif(strpos($fullUrl,"error=emailErr") == true){
            $emailErr = true;
        }

        elseif(strpos($fullUrl,"error=passwordErr") == true){
            $passwordErr = true;
        }

        elseif(strpos($fullUrl,"error=confirmPasswordErr") == true){
            $confirmPasswordErr = true;
        }

        elseif(strpos($fullUrl,"error=stmtfailed") == true){
            $stmtfailed = true;
        }

        elseif(strpos($fullUrl,"error=passAndConfPassMismatchErr") == true){
            $passAndConfPassMismatchErr = true;
        }

        elseif(strpos($fullUrl,"error=emailConvensionErr") == true){
            $emailConvensionErr = true;
        }

        elseif(strpos($fullUrl,"error=userNotFound") == true){
            $userNotFound = true;
        }

        
    ?>
    <main>
        <section>
            <div style="margin:auto;width:20%;background-color:#3498DB;padding-left:2rem;padding-right:2rem;padding-bottom:0.5rem;border-radius: 30px;">
                <div style="margin-top:4rem;text-align:center;padding-top:0.5rem;color:#e6e6e6;">
                    <h1>Forgot Password</h1>
                </div>
                <div>
                    <form style="margin-left:0rem;" action="../control/forgotPasswordAction.php" method="post" novalidate id="fp_form" onsubmit="return isValid(this);">
                        <label style="color:#e6e6e6;" for="userName">User Name</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="text" name="userName" id="userName">
                        <?php
                        if($userNameErr === true){
                            echo "User Name empty";
                        }
                        ?><span id="fp_unameErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="email">Email</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="email" name="email" id="email">
                        <?php
                        if($emailErr === true){
                            echo "Email cannot be empty!";
                        }

                        if($emailConvensionErr === true){
                            echo "Enter a valid email!";
                        }
                        ?>
                        <span id="fp_emailErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="password">Password</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="password" name="password" id="password">
                        <?php
                        if($passwordErr === true){
                            echo "Password cannot be empty!";
                        }
                        
                        ?>
                        <span id="fp_passErr"></span>
                        <br><br><br>
                        <label style="color:#e6e6e6;" for="confirmPassword">Confirm Password</label>
                        <br>
                        <input style="padding-right:8rem;border-radius: 30px;border:none;padding-top:5px;padding-bottom:5px;" type="password" name="confirmPassword" id="confirmPassword">
                        <?php
                        if($confirmPasswordErr === true){
                            echo "Confirm Password cannot be empty!";
                        }
                        ?>
                        <span id="fp_cpErr"></span>
                        <br><br>
                        <input style="text-color:#e6e6e6;padding-right:10px;padding-left:10px;padding-top:5px;padding-bottom:5px;border-radius: 30px;border:none;font-size:15px;" type="submit" value="Submit">
                    </form>
                </div>
                <?php
                    if($passAndConfPassMismatchErr === true){
                        echo "Passwords don't match!";
                    }
                    if($stmtfailed === true){
                        echo "Sql statement failed!";
                    }
                    if($userNotFound === true){
                        echo "User doesnot exist!";
                    }
                    
                ?>
            </div>
        </section>
    </main>
    <!-- js scripts -->
    <script src="js/forgotPassword.js"></script>
</body>
</html>