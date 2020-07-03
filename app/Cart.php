<?php

namespace App;

use Session;

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
    public function removeProduct($id)
    {
        $item = $this->items[$id];

        $this->totalQuantity--;
        $this->items[$id]['quantity']--;
        $item['price'] -= $item['item']['price'];
        $this->totalPrice -= $item['item']['price'];

        if ($this->items[$id]['quantity'] <= 0) {
            unset($this->items[$id]);
        }
        $products = $this->items;

        if ($products == null) {
            Session::forget('cart');
        } else {
            Session::put('cart', $this);
        }
    }
}
