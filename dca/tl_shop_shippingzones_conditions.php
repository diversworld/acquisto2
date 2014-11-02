<?php

$GLOBALS['TL_DCA']['tl_shop_shippingzones_conditions'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_shop_shippingzones',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id'                  => 'primary',
				'pid'                 => 'index'
			)
		)
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('payment_id', 'starting_price'),
			'headerFields'            => array('name', 'countrys'),
			'flag'                    => 12,
			'panelLayout'             => 'search,limit',
			'disableGrouping'         => true,
			'child_record_callback'   => array('tl_shop_shippingzones_conditions', 'listItems'),
		),
		'label' => array
		(
			'fields'                  => array('name'),
			'format'                  => '%s <span style="color:#b3b3b3; padding-left:3px;">[]</span>'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones_conditions']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones_conditions']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones_conditions']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones_conditions']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'default'                     => '{title_legend},tax_id,payment_id,starting_price,costs;',
	),
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'tax_id' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_shippingzones_conditions']['tax_id'],
			'inputType'               => 'select',
			'search'                  => true,
			'foreignKey'              => 'tl_shop_tax.title',
			'eval'                    => array('mandatory' => false, 'maxlength' => 64, 'tl_class' => 'w50', 'includeBlankOption' => true),
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'payment_id' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_shippingzones_conditions']['payment_id'],
			'inputType'               => 'select',
			'search'                  => true,
			'foreignKey'              => 'tl_shop_payment.title',
			'eval'                    => array('mandatory' => false, 'maxlength' => 64, 'tl_class' => 'w50', 'includeBlankOption' => true),
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'starting_price' => array
		(
			'label'                   => array('ab ' . ucfirst($GLOBALS['TL_CONFIG']['starting_price']), ''),
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50'),
			'sql'                     => "float NOT NULL default '0'"
		),
		'costs' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_shippingzones_conditions']['costs'],
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50'),
			'sql'                     => "float NOT NULL default '0'"
		)
	)
);

class tl_shop_shippingzones_conditions extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function listItems($arrRow)
	{
		if ($GLOBALS['TL_CONFIG']['versandberechnung'] == "gewicht")
		{
			$strSymbol = "kg";
		}
		else
		{
			$strSymbol = $GLOBALS['TL_CONFIG']['currency_symbol'];
		}

		$objZahlungsart = $this->Database->prepare("SELECT * FROM tl_shop_zahlungsarten WHERE id = ?")->limit(1)->execute($arrRow['zahlungsart_id']);
		return "<strong>" . $objZahlungsart->bezeichnung . ":</strong> ab " . sprintf("%01.2f", $arrRow['ab_einkaufpreis']) . " " . $strSymbol . " <span style=\"color:#b3b3b3; padding-left:3px;\">[" . sprintf("%01.2f", $arrRow['preis']) . " " . $GLOBALS['TL_CONFIG']['currency_symbol'] . " Versandkosten]</span>";
	}
}
