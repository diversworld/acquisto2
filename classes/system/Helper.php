<?php

namespace Acquisto\Classes;

class Helper extends \Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Import('Database');
	}

	public function parseProduct($Product, $templateFile, $css = '', $module = null)
	{
#		acquistoShop_imageSrc,,acquistoShop_galerie_imageMargin,acquistoShop_galerie_imageFloating
		$objTemplate = new \FrontendTemplate($templateFile);
		$objTemplate->css = $css;

		/**
		 * Prüfen ob das übergebene Modul ein Sprungziel hat und
		 * wenn dem so seinen sollte ob diesem der Alias / Id
		 * angehängt werden muss.
		 */
		if($module->acquistoShop_jumpTo)
		{
			$objPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")->limit(1)->execute($module->acquistoShop_jumpTo);

			if($module->addAlias)
			{
				$strUrl = $this->generateFrontendUrl($objPage->fetchAssoc(), '/productId/%s');

				$sprint = $Product->id;
				if($Product->alias)
				{
					$sprint = $Product->alias;
				}

				$Product->url = sprintf($strUrl, $sprint);
			}
			else
			{
				$Product->url = $this->generateFrontendUrl($objPage->fetchAssoc(), '');
			}
		}

		if($Product->multiSrc)
		{
			foreach($Product->multiSrc as $v)
			{
				$objImage = new \stdClass();

				$this->addImageToTemplate($objImage, array
				(
					'addImage'    => 1,
					'singleSRC'   => $v->path,
					'alt'         => null,
					'size'        => $module->acquistoShop_imageSize,
					'imagemargin' => $module->acquistoShop_imageMargin,
					'imageUrl'    => $v->url,
					'caption'     => null,
					'floating'    => $module->acquistoShop_imageFloating,
					'fullsize'    => $module->acquistoShop_imageFullsize
				), null,'id' . $Product->id);

				$multiSrc[] = $objImage;
			}

			$Product->multiSrc = $multiSrc;
		}

		if($Product->singleSrc)
		{
			$objImage = new \stdClass();

			$this->addImageToTemplate($objImage, array
			(
				'addImage'    => 1,
				'singleSRC'   => $Product->singleSrc->path,
				'alt'         => null,
				'size'        => $module->acquistoShop_imageSize,
				'imagemargin' => $module->acquistoShop_imageMargin,
				'imageUrl'    => $Product->singleSrc->url,
				'caption'     => null,
				'floating'    => $module->acquistoShop_imageFloating,
				'fullsize'    => $module->acquistoShop_imageFullsize
			), null,'id' . $Product->id);

			$Product->singleSrc = $objImage;
		}

		/**
		 * Das Objekt in einen Array umwandeln und die Werte
		 * an das Template übergeben.
		 */
		foreach((array) $Product as $k => $v)
		{
			$objTemplate->$k = $v;
		}

		return $objTemplate->parse();
	}

	public function formatNumber($number, $format)
	{

	}
}