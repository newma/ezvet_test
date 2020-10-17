<?php

if (!isset($_SESSION)){
    session_start();
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    } else {
        $cart = new Cart();
    }
}

switch($_POST['mode'])
{
    case'validate-email';
    echo checkmail();
    break;
    
    case 'other';
    echo 'don no';
    break;
}

function listProducts(){
    return Product::getList();
}

function displyCart(){
    echo '<h2>Cart:</h2><br/>';
    if (!$cart->isEmpty()) {
        foreach ($cart as $arr) {
            $product = $arr['product'];
            printf('<p><strong>%s</strong>: %d @ $%0.2f each.<p>', $product->getName(), $arr['qty'], $product->getPrice());
        } // End of foreach loop!
    }
}
?>