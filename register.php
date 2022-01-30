<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

   $account = new Account($con);

   if(isset($_POST["submitButton"])) {
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $sucsess = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

        if($sucsess) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: home.php");
        }
   }

function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
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
                   <h3>Sign Up</h3>
                   <span>to continue to EMBERFLEX</span>
               </div>


               <form method="POST">

                    <?php echo $account->getError(Constants::$firstNameCharacters);?>
                    <input type="text" name="firstName" placeholder="First Name" value="<?php getInputValue("firstName"); ?>" required>

                    <?php echo $account->getError(Constants::$lastNameCharacters);?>
                    <input type="text" name="lastName" placeholder="Last Name" value="<?php getInputValue("lastName"); ?>" required>

                    <?php echo $account->getError(Constants::$usernameCharacters);?>
                    <?php echo $account->getError(Constants::$usernameTaken);?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" required>

                    <?php echo $account->getError(Constants::$emailsDontMatch);?>
                    <?php echo $account->getError(Constants::$emailInvalid);?>
                    <?php echo $account->getError(Constants::$emailTaken);?>
                    <input type="email" name="email" placeholder="Email" value="<?php getInputValue("email"); ?>" required>

                    <input type="email" name="email2" placeholder="Confirm Email" value="<?php getInputValue("email2"); ?>" required>

                    <?php echo $account->getError(Constants::$passwordsDontMatch);?>
                    <?php echo $account->getError(Constants::$passwordLenght);?>
                    <input type="password" name="password" placeholder="Password" required>

                    <input type="password" name="password2" placeholder="Confirm Password" require>

                    <input type="submit" name="submitButton" value="SUBMIT">

               </form>
                    <a href="login.php" class="signInMessage">Already have account? Sign in here!</a> 
           </div>

       </div>

    </body>
</html>