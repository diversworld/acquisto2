<?php

namespace Acquisto\Classes;

class Product extends \Controller
{
	private $productArray = array();

	public function __construct()
	{
		parent::__construct();
		$this->Import('Database');
	}

	public function get($id, $attributes = array())
	{
		/**
		 * Laden des DataContainerArray
		 */
		$this->loadDataContainer('tl_shop_products');

		/**
		 * Laden des Produkts und prüfen ob eine entsprechende
		 * Palette innerhalb des DCA existiert ansonsten die
		 * "default" Plaette setzen.
		 */
		$objData = $this->Database->prepare("SELECT * FROM tl_shop_products WHERE id=?")->limit(1)->execute($id);
		if(!($palette = $GLOBALS['TL_DCA']['tl_shop_products']['palettes'][$objData->type]))
		{
			$palette  = $GLOBALS['TL_DCA']['tl_shop_products']['palettes']['default'];
		}

		/**
		 * Mittels eines Regulären Ausdrucks die Legends aus der
		 * Palette entfernen und aus den zurückbleibenden Feldern
		 * einen Array erstellen
		 */
		$arrExplode = explode(",", preg_replace("/(;{.*?}|{.*?},|;)/", "", 'id,tstamp;' . $palette));

		/**
		 * Prüfen ob es einen Array mit Feldern gibt. Diesen in einer
		 * Schleife durchlaufen um im DCA prüfen ob es Subpaletten gibt
		 * und ob diese aktiviert sind um Sie dem Array hinzuzufügen.
		 */
		if(is_array($arrExplode))
		{
			foreach($arrExplode as $v)
			{
				if(isset($GLOBALS['TL_DCA']['tl_shop_products']['subpalettes'][$v]) && $objData->$v)
				{
					$merge = explode(",", $GLOBALS['TL_DCA']['tl_shop_products']['subpalettes'][$v]);
					$arrExplode = array_merge($arrExplode, $merge);
				}
			}
		}

		/**
		 * Den kompletten Datensatz aus der Datenbank als Array ablegen
		 * und lediglich die Felder der productArray-Variable hinzufügen die
		 * von diesem Produkttyp genutzt werden. Für die einzelnen Felder wird
		 * noch geprüft ob Sie gesondert verarbeitet werden müssen.
		 */
		if(is_array($arrData = $objData->row()))
		{
			foreach($arrData as $k => $v)
			{
				if(in_array($k, $arrExplode) && is_array($GLOBALS['TL_DCA']['tl_shop_products']['fields'][$k]))
				{
					$this->productArray[$k] = $v;
					if(method_exists($this, ($method = 'method_' . $k)))
					{
						$this->productArray[$k] = $this->$method($v);
					}
				}
			}
		}

		/**
		 * Prüft ob die Ausgangsklasse eine setSpecialPropertys
		 * Methode zur Verfügung stellt und führt diese dann aus.
		 */
		if(method_exists($this, 'setSpecialPropertys'))
		{
			$this->setSpecialPropertys();
		}

		/**
		 * Abfragen der Hooks und durchlaufen dieser zur Manipulation
		 * des Produkts durch andere Funktionen.
		 */
		if(is_array($GLOBALS['TL_HOOKS']['modifyProduct']))
		{
			foreach($GLOBALS['TL_HOOKS']['modifyProduct'] as $v)
			{
				$this->Import($v[0]);
				$this->productArray = $this->$v[0]->$v[1]($this->productArray);
			}
		}

		return (object) $this->productArray;
	}

	public function buy($id, $attributes = array())
	{
		$this->get($id, $attributes);

		if(method_exists($this, 'checkout'))
		{
			$this->checkout();
		}
		else
		{

		}
	}

	private function method_singleSrc($var)
	{
		if($var)
		{
			$var = \FilesModel::findByUuid($var);
		}

		return $var;
	}

	private function method_costs($var)
	{
		$this->Import('Costs');
		return $this->Costs->getCosts(unserialize($var));
	}

	private function method_tags($var)
	{
		$var = explode(",", $var);
		if(is_array($var))
		{
			foreach($var as $v)
			{
				$tags[] = trim($v);
			}
		}

		return $tags;
	}

	private function method_multiSrc($var)
	{
		if(is_array($multiSrc = unserialize($var)))
		{
			for($i = 0; $i < count($multiSrc); $i++)
			{
				$multiSrc[$i] = \FilesModel::findByUuid($multiSrc[$i]);
			}
		}


		return $multiSrc;
	}

	private function constructAttributes()
	{

	}
}
