<?php
session_start();
require 'cart.php';
require_once ('../config.php');

$cart = new Cart();

if (isset($_POST['add'])){
    $prod_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];


    /*add product to cart*/
    $cart->addToCart($prod_id, $quantity, $prod_details);

    header("location: update.php");
    exit;
}


try {
    require "../common.php";
    require_once '../src/DBconnect.php';

    $sql = "SELECT * FROM products";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();


} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();

}
