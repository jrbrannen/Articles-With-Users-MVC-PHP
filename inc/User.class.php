<?php

class User {

    // connect to the db when a new user object is created
    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441;charset=utf8', 
            'user', 'wdv441');
    }

    function set($userArray) {
        $this->userArray = $userArray;
    }

    function verifyUser($userName, $password) {
        // set verifiedUser to false, flag tracks to see if user data is loaded
        $verifiedUser = false;

        // get data from the database where user id and password match
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name = ? and password = ?");

        // execute the statment using the userName and password as parameters
        $stmt->execute(array($userName, $password));

        // check to see if a user was sucessfully loaded
        if ($stmt->rowCount() == 1) {
            $userArray = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->set($userArray);

            $verifiedUser = true;
        }

        return $verifiedUser;
    }

    function checkLogin() {
        $loggedIn = false;
    }

}

?>