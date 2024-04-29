<?php

class cart {
    public function addToCart($prod_id, $quantity, $prod_details) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if(!isset($_SESSION['cart'][$prod_id])){
            /* add new item to cart if item doesnt exist*/
            $_SESSION['cart'][$prod_id] = [
                      'id' => $prod_details['id'],
                'bookname' => $prod_details['bookname'],
                  'author' => $prod_details['author'],
                   'genre' => $prod_details['genre'],
                   'price' => $prod_details['price'],
                'quantity' => $quantity
            ];
        } else {
            /* Update quantity if the item already exists*/
            $_SESSION['cart'][$prod_id]['quantity'] += $quantity;
        }
    }
    /*Remove an item from the cart*/
    public function updateCart($prod_id, $quantity) {
        if (isset($_SESSION['cart'][$prod_id])){
            $_SESSION['cart'][$prod_id]['quantity'] = $quantity;
            /*Remove item if the quantity is zero*/
            if ($quantity == 0) {
                $this->removeFromCart($prod_id);
            }
        }
    }
    /*Get contents of the car*/
    public function getCart() {
        return $_SESSION['cart'];
    }
    /*Clear the entire cart*/
    public function clearCart() {
        $_SESSION['cart'] = [];
    }
}

?>