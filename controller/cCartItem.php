<?php
require_once("model/mCartItem.php");

class CCartItem {
    public function addCartItem($user_id, $product_id, $quantity) {
        $cartItem = new MCartItem();
        $result = $cartItem->addToCart($user_id, $product_id, $quantity);
        return $result;
    }

    public function getCartItems($user_id) {
        $cartItem = new MCartItem();
        return $cartItem->getCart($user_id);
    }

    public function deleteCartItem($cartItem) {
        $cartItem = new MCartItem();
        return $cartItem->deleteItem($cartItem);
    }
    public function updateCartItem($cartItem, $quantity) {
        $cartItem = new MCartItem();
        return $cartItem->updateQuantity($cartItem, $quantity);
    }
}


?>