<?php
    if(isset($_POST['Submit'])) {
        require_once('../inc/User.class.php');
        // create a user object
        $user = new User();  
        
        // TO DO sanatize
        $requestArray = $user->sanitize($_REQUEST);
        var_dump($requestArray);
        $userName = $requestArray['user_name']; 
        $password = $requestArray['password'];
        // TO DO validate
        
        // var_dump($user);
        //verify the user is in the db
        if($user->verifyUser($userName, $password)) {
            // start a session and store the user id in the $_SESSION array
            session_start();
            $_SESSION['user_id'] = $user->userArray['user_id'];
            // redirect to article list 
            header("location: article-list.php");
            exit;
        } 
        
    }
    // if form is submitted create a new user and call verify user()

    // if user is valid
        //start a new session and store user id to the session variable()

    // if user is not valid
        // return an error message to say invalid
        
    // redirect to news article list page
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatable" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>News Articles | Home</title>
        <!--Jeremy Brannen-->
        <script>

        </script>
        <style>
            
        </style>
    </head>

    <body>

    <h1> New Articles Login </h1>
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($errorsArray['user_name']) || isset($errorsArray['password'])) { ?>
                <div><?php echo $errorsArray['']; ?></div>
            <?php } ?>
            <p>
                <label>User Name:</label>
                <input type="text" name="user_name" id="user_name" value="<?= isset($userName) ? $userName : '' ?>">
            </p>
            <p>
                <label>Password:</label>
                <input type="password" name="password" id="password" value="<?= isset($password) ? $password : '' ?>">
            </p>
            <p>
                <input type="submit" name="Submit" value="Submit"/>
                <input type="submit" name="Cancel" value="Cancel"/> 
            </p>
            
            
                        
        </form> 



    </body>

</html>