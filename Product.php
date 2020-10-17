<?php
class Product {
    protected $name;
    protected $price;

    //standard constructor
    function _construct(){
        $this->name = '';
        $this->price = '';
    }

    public static function getList() {
        // ######## please do not alter the following code ########
        $products = [
            [ "name" => "Sledgehammer", "price" => 125.75 ],
            [ "name" => "Axe", "price" => 190.50 ],
            [ "name" => "Bandsaw", "price" => 562.131 ],
            [ "name" => "Chisel", "price" => 12.9 ],
            [ "name" => "Hacksaw", "price" => 18.45 ],
        ];
        // ########################################################

        return json_encode($products);

      }
    

    //well this could have lots of other fucntions
    // but for the purpose of demo, ganna keep it minimal
}

?>