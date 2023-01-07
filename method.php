<?php
include "config/configure.php";
    function sing_in($data){

        $username = validate($data['username']);
        $email = validate($data['email']);
        $password = validate($data['password']);

        if (checkUsername($username)) {
            echo '<div class="alert alert-warning" role="alert">Username Exist!</div>';
            die;
        }

        if (checkEmail($email)) {
            echo '<div class="alert alert-warning" role="alert">Email Exist!</div>';
            die;
        }

        $password = sha1($password . SALT);
        $db = DBconnection();
        $sql = "INSERT INTO users_tbl (username, email, password) VALUES('$username', '$email', '$password')";
        $result = mysqli_query($db, $sql);

        if ($result) {
        header("Location: chooseUserOrAdmin.php");
        }else{
            echo '<div class="alert alert-danger" role="alert">Sign in failed!</div>';
            die;
        }
    }

    function login($data)
    {
        $email = validate($data['email']);
        $password = validate($data['password']);

        if (!checkEmail($email)) {
            echo '<div class="alert alert-danger" role="alert">Invalid email!</div>';
            die;
        }

        $dbs = DBconnection();
        $sql = "SELECT password,username FROM users_tbl WHERE email='$email'";

        $result = mysqli_query($dbs, $sql);
        $row = mysqli_fetch_assoc($result);

        if (sha1($password.SALT) != $row['password']) {
            echo '<div class="alert alert-danger" role="alert">Invalid username or password!</div>';
            die;
        }
        
        $_SESSION['username'] = $row['username'];
        header("Location: chooseUserOrAdmin.php");
    }

    function validate($data){
    
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function DBconnection()
    {
        $host = DB_HOST;
        $username = DB_USER;
        $password = DB_PASS;
        $dbName = DB_NAME;

        $connection = mysqli_connect($host, $username, $password, $dbName);

        if(!$connection) {
            die('DBS Connection Error!');
        }

        return $connection;
    }

    function checkUsername($username)
    {
        $username = validate($username);
        $db = DBconnection();
        $sql = "SELECT id FROM users_tbl WHERE username = '$username'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0 ) {
            return true;
        }else {
            return false;
        }
    }
    function checkEmail($email)
    {
        $email = validate($email);
        $db = DBconnection();
        $sql = "SELECT id FROM users_tbl WHERE email = '$email'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0 ) {
            return true;
        }else {
            return false;
        }
    }