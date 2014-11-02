<?php

namespace Acquisto\Frontend;

class ModuleAcquistoProductList extends \Module
{
	protected $strTemplate = 'mod_acquisto_product_list';
	public  $addAlias    = true;

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['login'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		$this->Import('\Acquisto\Classes\Helper', 'Helper');

		return parent::generate();
	}

	public function  compile()
	{
		if($this->Input->Get('categorie'))
		{

		}

		if($this->acquistoShop_numberOfItems)
		{

		}

		#echo $this->acquistoShop_numberOfItems;

		#echo $this->acquistoShop_elementsPerPage;
		$objDatabase = $this->Database->prepare("SELECT * FROM tl_shop_products")->execute();
		$modulo = ($this->acquistoShop_elementsPerRow) - 2;
		while($objDatabase->next())
		{
#			$css = '';
#			$modulo++;
#			echo $modulo;
#			if(($this->acquistoShop_elementsPerRow % $modulo) == 1)
#			{
#				$modulo = -1;
#				$css = 'break';
#				echo "-break";
#			}
#			echo "<br>";

			$productType = $objDatabase->type;
			$this->Import($productType);

			$html .= $this->Helper->parseProduct($this->$productType->get($objDatabase->id), 'product_default_list', $css, $this);
		}

		$this->Template->html = $html;

		#name,type,acquistoShop_jumpTo,acquistoShop_numberOfItems,perPage,acquistoShop_elementsPerRow,acquistoShop_listTemplate,acquistoShop_imageSrc,acquistoShop_galerie_imageSize,acquistoShop_galerie_imageMargin,acquistoShop_galerie_imageFloating,contaoShop_imageSize,contaoShop_imageMargin,contaoShop_imageFloating,cssID,space'
	}
}
