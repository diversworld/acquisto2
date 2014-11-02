<?php

namespace Acquisto\Classes;

class Costs extends \Controller
{
	private $arrCosts = array();
	private $defaultLists = array();

	public function __construct()
	{
		$this->Import('Database');

		if(FE_USER_LOGGED_IN)
		{
			$this->Import('FrontendUser', 'Member');
		}

		$this->getDefaultLists();
	}

	public function getDefaultLists()
	{
		if(FE_USER_LOGGED_IN)
		{
			$objDatabase = $this->Database->prepare("SELECT * FROM tl_shop_pricelists WHERE groups != ''")->execute();
			while($objDatabase->next())
			{
				$arrayGroups = unserialize($objDatabase->groups);
				foreach($arrayGroups as $group)
				{
					if(in_array($group, $this->Member->groups))
					{
						$this->defaultLists[$objDatabase->id] = $objDatabase->id;
					}
				}
			}
		}
		else
		{
			$objDatabase = $this->Database->prepare("SELECT id FROM tl_shop_pricelists WHERE default_list='1'")->execute();
			$this->defaultLists[$objDatabase->id] = $objDatabase->id;
		}
	}

	public function getCosts($Costs = array(), $quantity = 0)
	{
		$this->buildCosts($Costs);
	}

	private function buildCosts($Costs)
	{
		foreach($Costs as $v)
		{
			print_r($Costs);
		}
	}
}