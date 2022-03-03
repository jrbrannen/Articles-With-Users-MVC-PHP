<?php

class User {
    var $userArray = array();

    var $errors = array();

    var $db = null;
    // connect to the db when a new user object is created
    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441;charset=utf8', 
            'user', 'wdv441');
    }

    function set($userArray) {
        $this->userArray = $userArray;
    }

    function sanitize($userArray) {
        if (!empty($userArray['user_name'])){
            $userArray['user_name'] = filter_var($userArray['user_name'], FILTER_SANITIZE_STRING);
        }
        if (!empty($userArray['password'])) {
            $userArray['password']= filter_var($userArray['password'], FILTER_SANITIZE_STRING);
        } 
        return $userArray;
    }

    function validate() {
        $isValid = true;

        if (empty($this->userArray['user_name'])) {
            $this->errors['user_name'] = "User name is required";
            $isValid = false;
        }
        if (empty($this->userArray['password'])) {
            $this->errors['password'] = "Password is required";
            $isValid = false;
        }
        return $isValid;
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

    function checkLogin($userId) {
        $loggedIn = false;

        if (!empty($userId)) {
            $loggedIn = true;
        }
        return $loggedIn;
    }

}

?>