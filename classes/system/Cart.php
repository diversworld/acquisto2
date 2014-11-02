<?php

namespace Acquisto\Classes;

class Cart extends \Controller
{
	protected $cartArray = array();

	public function __construct()
	{
		parent::__construct();
		$this->Import('Database');
		$this->structCart();
	}

	private function structCart()
	{
		if(is_array($_SESSION['ACQUISTO']['CART'])) {
			foreach($_SESSION['ACQUISTO']['CART'] as $hashId => $cartItem) {
				$this->cardArray[$hashId] = (object) array(
					'quantity'   => $cartItem['quantity'],
					'attributes' => $cartItem['attributes']
				);
			}
		}
	}

	public function add($productId, $attributedArray = array(), $quantity = 0)
	{
		$_SESSION['ACQUISTO']['CART'][md5($productId . serialize($attributedArray))] = array(
			'quantity'   => $quantity,
			'attributes' => $attributedArray
		);

		$this->structCard();
	}

	public function remove($hashId)
	{
		unset($_SESSION['ACQUISTO']['CART'][$hashId]);
		$this->structCard();
	}

	public function update($hashId, $quantity = 0)
	{
		if($quantity) {
			$_SESSION['ACQUISTO']['CART'][$hashId]['quantity'] = $quantity;
			$this->structCard();
		}
		else {
			$this->remove($hashId);
		}
	}

	public function getCart()
	{
		return $this->cardArray;
	}
}