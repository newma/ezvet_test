<?php

require("./Cart.php");
require("./Product.php");

if (!isset($_SESSION)) {
    session_start();
}

switch($_POST['mode'])
{
    case'displayCart';
    echo displayCart();
    break;
    
    case 'displayProducts';
    echo displayProducts();
    break;

    case 'addToCart';
    echo addToCart($_POST['product']);
    break;
}

function displayCart(){
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    } else {
        $cart = new Cart();
        $_SESSION['cart'] = $cart;
    }
    if (!$cart->isEmpty()) {
        $returnString = '<h2>Cart:</h2><br/><table>
        <tr>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Sub-Total</th>
          <th>Action</th>
        </tr>
        ';

        foreach ($cart as $arr) {
            $product = $arr['product'];
            $returnString = '<tr>
                            <td>{$product->getName()}</td>
                            <td>{$arr["quantity"]}</td>
                            <td>{$product->getPrice()}</td>
                            <td>{$product->getName() * $arr["quantity"]}</td>
                            <td><a>Remove</a></td>
                            </tr>';
        } // End of foreach loop!

        $returnString .= '</table>';
        return $returnString;

    } else {
       return '<h3>No products in the cart.</h3>';
    }

}

function displayProducts(){
    
    $productList = Product::getList();

    $returnString = '<br/><table>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>';

    foreach ( $productList as $product ) {

        $returnString .= "<tr>
                            <td> {$product->getName()} </td>
                            <td> ".number_format((float)$product->getPrice(), 2, '.', '')." </td>
                            <td> <a> Add To Cart</a></td>
                        </tr>";
     } 

    $returnString .= '</table>';

    return $returnString;
}

function addToCart($product, $quantity){

    if (!$quantity) { 
        $quantity = 1;
    }

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    } else {
        $cart = new Cart();
    }

    $product = new Product();
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];

    $cart->addProducts($product, $_POST['quantity']);
    
    $_SESSION['cart'] = $cart;
}
?>