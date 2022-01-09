<?php
   if(isset($_POST["submitButton"])) {
   
        $firstName = sanitizeFormString($_POST["firstName"]);
        echo $firstName;
   }
   

   function sanitizeFormString($inputText) {
       $inputText = strip_tags($inputText);
       //$inputText = str_replace (" ", "", $inputText)
       $inputText = trim($inputText);
       return $inputText;
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

                    <input type="text" name="firstName" placeholder="First Name" required>

                    <input type="text" name="lastName" placeholder="Last Name" required>

                    <input type="text" name="username" placeholder="Username" required>

                    <input type="email" name="email" placeholder="Email" required>

                    <input type="email" name="email2" placeholder="Confirm Email" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="password" name="password2" placeholder="Confirm Password">

                    <input type="submit" name="submitButton" value="SUBMIT">

               </form>
                    <a href="login.php" class="signInMessage">Already have account? Sign in here!</a> 
           </div>

       </div>

    </body>
</html>