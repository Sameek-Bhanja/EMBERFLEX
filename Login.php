<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

$account = new Account($con);

    if(isset($_POST["submitButton"])) {
 
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        
        $sucsess = $account->login( $username, $password);

        if($sucsess) {
            //store session
            header("Location: index.php");
        }
   }
?>
<!DOCTYPE html>
<html>
    <head>
       <title> Welcome to EMBERFLEX</title>
       <link rel="stylesheet" type="text/css" href="assests/style/style.css"/>  
    </head>
    <body>
       <div class="signInContainer">

           <div class="column">

               <div class="header">
                   <img src="assests/images/EmberFlex.png" title="Logo" alt="Site Logo"/> 
                   <h3>Login</h3>
                   <span>to continue to EMBERFLEX</span>
               </div>


               <form method="POST">
                    <?php echo $account->getError(Constants::$loginFailed);?>
                    <input type="text" name="username" placeholder="Username" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="submit" name="submitButton" value="SUBMIT">

               </form>
                    <a href="register.php" class="signInMessage">Don't have account? Sign Up here!</a> 
           </div>

       </div>

    </body>
</html>