<?php

namespace App;

use Session;
use Illuminate\Http\Request;

class Cart
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;


    public function __construct()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    /**
     * Deze functie zorg ervoor dat je een item kan toevogen aan de shoppingcart
     *
     * @param array $item
     * @param int $id
     * @return void
     */
    public function add($item, $id)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
    }
     /**
     * Zorgt ervoor dat je een product uit de shoppingcart kan halen
     *
     * @param int $id
     * @return void
     */
    public function updateQuantity(Request $request , $id , $quantity){
       
        if($quantity <= 0){
            $this->removeProduct($id);
            return;
        }
        //removes the current quantity and price from the total
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalQuantity += $quantity;

        $this->totalPrice -= $this->items[$id]['price'];
        $this->totalPrice += $quantity * $this->items[$id]['price'];

       if ($this->totalQuantity == 0) {
            $this->items[$id]['price'] = $quantity * $this->items[$id]['price'];
        } else {
            $this->items[$id]['price'] = $quantity * ($this->items[$id]['price'] /
                $this->items[$id]['quantity']);
        }
        $this->items[$id]['quantity'] = $quantity;


        $request->session()->put('cart', $this);
    }
     /**
     * Gets the total quantity of all products in the shoppingcart
     *
     * @return $totalQuantity
     */
    public function getTotalQuantity()
    {
        $totalQuantity = 0;
        foreach ($this->items as $product) {
            $totalQuantity += $product['quantity'];
        }
        return $totalQuantity;
    }

    /**
     * Gets the total price of every product in the shoppingcart
     *
     * @return $totalPrice
     */
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $product) {
            $totalPrice += $product['price'];
        }
        return $totalPrice;
    }
    /**
     * Zorgt ervoor dat je een product uit de shoppingcart kan halen
     *
     * @param int $id
     * @return void
     */
    public function removeProduct($id)
    {
        unset($this->items[$id]);
        if (empty($this->items)) {
            Session::forget('cart');
        } else {
            Session::put('cart', $this);
        }
    }


}
