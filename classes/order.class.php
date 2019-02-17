<?php
class Order {
    private $id;
    private $total;
    private $user_id;
    private $products;
    private $product;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProducts($produit_id)
    {
        return $this->products;
    }


    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }


  
    public function total(){
        return array_reduce($this->getProducts(), function($carry, $product){
            return $carry + $product->getprix();
        });
    }

}