<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $class_id;
  public $user_id;
  public $quantity;
  public $createdBy;
  public $updatedBy;


  public function addToBasket()
  {
session(['key' => 'value']);
  }

  public function deleteFromBasket()
  {
  }

  public function emptyBasket()
  {
  }

  public function calculateTotal()
  {
  }

  public function getItemSubTotal($value='')
  {
    # code...
  }

  public function getTotal($value='')
  {
    # code...
  }

  public function getQuantity()
  {
  }

  public function setQuantity()
  {
    # code...
  }

  public function updateBasket($value='')
  {
  }


}
