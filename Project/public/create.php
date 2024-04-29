<?php


if (isset($_POST['submit'])) {

    require "../common.php";
    try { 
        require '../src/DBconnect.php';
        
        $new_user = array(             
            "firstname" => escape($_POST['firstname']),             
            "lastname"  => escape($_POST['lastname']),             
            "email"     => escape($_POST['email']),             
            "age"       => escape($_POST['age']),             
            "password"  => escape($_POST['password'])
        ); 

        $sql = "INSERT INTO user (" . implode(', ', array_keys($new_user)) .") 
        values (:". implode(', :', array_keys($new_user)).")";

        $statement = $connection->prepare($sql); 
        $statement->execute($new_user); 
        
        

    } catch(PDOException $error) { 
        echo $sql . "<br>" . $error->getMessage(); 
    } 
}
?> 

<?php

if (isset($_POST['submit']) && $statement) 
    { 
    echo $new_user['firstname']. ' successfully added'; 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Simple Database App</title>
    <link rel="stylesheet" href="css/style.css" />


<h2>Add a user</h2> 
<form method="post"> 
    <label for="firstname">First Name</label> 
    <input type="text" name="firstname" id="firstname" required> 
    <label for="lastname">Last Name</label> 
    <input type="text" name="lastname" id="lastname" required> 
    <label for="email">Email Address</label> 
    <input type="email" name="email" id="email" required> 
    <label for="age">Age</label> <input type="text" name="age" id="age"> 
    <label for="password">Password</label>
    <input type="text" name="password" id="password">
    <input type="submit" name="submit" value="Submit"> 
</form> 
<a href="index.php">Back to home</a>

<?php include "template/footer.php"; ?> 