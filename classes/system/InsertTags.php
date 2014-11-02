<?php

namespace Acquisto\Classes;

class InsertTags extends \Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Import('Database');
	}

	public function  replaceAcquistoInsertTags($insertTag)
	{
		$value = false;

		switch(strtolower($insertTag)) {
			case "acquisto::cart_items":
				$value = '';
				break;
			case "acquisto::cart_summary":
				$value = '';
				break;
			case "acquisto::product":
				$value = '';
				break;
			case "acq::current::categorie":
				$value = 'acq::current::categorie';
				if($this->Input->Get('categorie')) {
					$objCategorie = $this->Database->prepare("SELECT title FROM tl_shop_categories WHERE alias=?")->limit(1)->execute($this->Input->Get('categorie'));
					$value = $objCategorie->title;
				}
				break;
		}

		return $value;
	}
}