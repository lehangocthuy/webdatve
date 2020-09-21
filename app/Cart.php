<?php

namespace App;

class Cart
{
	public $danhsach = null;
	public $totalPrice = 0;
	public $totalQuanty = 0;
 	
 	public function __constant($cart){
 		if($cart){
 			$this->danhsach = $cart->danhsach;
 			$this->totalPrice = $cart->totalPrice;
 			$this->totalQuanty = $cart->totalQuanty;
 		}
 	}

 	public function AddCart($sanpham, $id){
 		$newSanpham = ['quanty' => 0,  'productInfo' => $sanpham];
 		// 'price' => $sanpham->price,
 		if($this->danhsach ){
 			if(array_key_exists($id, $danhsach)){
 				$newSanpham = $danhsach[$id];

 			}
 		}
 		$newSanpham['quanty']++;
 		// $newSanpham['price'] = $newSanpham['quanty'] * $sanpham->price;
 		$this->danhsach[$id] = $newSanpham;
 		// $this->totalPrice += $sanpham->price;
 		$this->totalQuanty++;
 		
 	}
}
?>
