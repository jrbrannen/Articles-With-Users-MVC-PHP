<?php
    if(isset($_POST['Submit'])) {
        require_once('../inc/User.class.php');
        $userName = $_POST['user_name'];
        $password = $_POST['password'];

        $user = new User();
        $user->verifyUser($userName, $password);
        var_dump($user);
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
            <?php if (isset($errorsArray['article_title'])) { ?>
                <div><?php echo $errorsArray['article_title']; ?></div>
            <?php }elseif (isset($errorsArray['article_author'])) { ?>
                <div><?= $errorsArray['article_author']; ?></div>
            <?php }elseif (isset($errorsArray['article_content'])) { ?>
                <div><?= $errorsArray['article_content']; ?></div>
            <?php }elseif (isset($errorsArray['article_date'])) { ?>
                <div><?= $errorsArray['article_date']; ?></div>
            <?php } ?>
            <p>
                <label>User Name:</label>
                <input type="text">
            </p>
            <p>
                <label>Password:</label>
                <input type="text">
            </p>
            <p>
                <input type="submit" name="Submit" value="Submit"/>
                <input type="submit" name="Cancel" value="Cancel"/> 
            </p>
            
            
                        
        </form> 



    </body>

</html>