<?php session_start();
if($_SESSION['Active'] == false)
{
    header("location:login.php");
}
?>



<!DOCTYPE html>
<html lang="en"> 
<head> 
<meta charset="utf-8" /> 
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<title>Simple Database App</title> 
<link rel="signin" href="css/style.css" />
</head> 
<body> 
<h1>Simple Database App</h1> 