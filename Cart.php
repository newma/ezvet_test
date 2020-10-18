<?php

class Cart {
    protected $productsInCart = array();

    //standard constructor
    function _construct(){
        $this->productsInCart = array();
    }

    // return the list of current Product in the cart
    public function getProducts(){
        return json_encode($this->productsInCart);
    }
    
    //add new Product in the cart
    //quantity defaults to 1
    public function addProducts(Product $product, $quantity = 1){
        
        //would have done this by unique id,
        //using name as I am not to change the code for the products array 
        //already has this Product should update quantity
        if (isset($this->productsInCart[$name])) {
            $this->updateProduct($product, $this->productsInCart[$product]['quantity'] + $quantity);
        } else {
            $this->productsInCart[$name] = array('product' => $product, 'quantity' => $quantity);
        }
    }

    //update the product quantity
    public function updateProduct(Product $product, $quantity) {

        $name = $product->getName();

        if ($qty === 0) {
            $this->removeProduct($product);
        } elseif ( ($quantity > 0) && ($quantity != $this->productsInCart[$name]['quantity'])) {
            $this->productsInCart[$name]['quantity'] = $quantity;
        }
    }

    //completely remove the Product quantity
    public function removeProduct(Product $product){
        $name= $product->getName();
        if (isset($this->productsInCart[$name])) {
            unset($this->productsInCart[$name]);
        }
    }

    public function getProductTotals(){

        $total = 0;

        foreach ($this->productsInCart as $product){
            $total += $product->getPrice() * $product[quantity];         
        }

        return $total;

    }

    public function isEmpty(){
        return (empty($this->productsInCart));

    }
}
?>

