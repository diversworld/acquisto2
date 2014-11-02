<?php

namespace Acquisto\Product;
use Acquisto\Classes\Product;

class Normal extends Product
{
	public function __construct()
	{
		parent::__construct();
	}

	static function getTemplate(DataContainer $dc) 
	{
		return \Backend::getTemplateGroup('product_normal', $dc->activeRecord->pid);	    
	}
}
