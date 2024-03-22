<?php

// Start the Session of Our User
session_start();

// Connect to the MySQL Data
function connectDataBase(){

    // Server Credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "invoice-system";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }

    return $conn;
}

// login admin to the website
function loginAdmin($conn, $username, $password){

    // SQL Query to Verify the Admin
    $sql = "SELECT `ID`, `PrivateKey`, `Username`, `FirstName`, `LastName`, `Password` FROM `admin` WHERE `Username` = ? and `Password` = ?";
    
    // Now we run the query
    $prepareQuery = $conn->prepare($sql);
    $prepareQuery->bind_param("ss", $username, $password);
    $prepareQuery->execute();
    $result = $prepareQuery->get_result();

    // Now check no of rows returned
    if($result->num_rows > 0){

        // Generate a new Private Key
        $privateKey = uniqid();

        // Store Private Key to the Server
        $ID = $result->fetch_assoc()['ID'];
        
        $sql = "UPDATE `admin` SET `PrivateKey`='$privateKey' WHERE `ID` = '$ID'";
        $query = $conn->query($sql);

        // Store the User Login in Long term
        if(isset($_POST['remember'])){
            setcookie("isLogin", true, time() + (86400 * 30), "/");
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("privateKey", $privateKey, time() + (86400 * 30), "/");
        }

        // Store the User Data in Local Session
        $_SESSION['isLogin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['privateKey'] = $privateKey;

        return true;
    }
    else{
        // User Is Not Login
        return false;
    }
}

// Check the Login Status of the User
function checkLoginStatus(){
    if(isset($_SESSION['isLogin']) == true){
        return true;
    }
    elseif(isset($_COOKIE['isLogin']) == true){
        $_SESSION['isLogin'] = true;
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['privateKey'] = $_COOKIE['privateKey'];
        return true;
    }
    else{
        return false;
    }
}

?>

