<?php

$this->loadLanguageFile('tl_acquisto_pclasses');

$GLOBALS['TL_DCA']['tl_shop_products'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_shop_products_attributes'),
		'enableVersioning'            => true,
		'onsubmit_callback'           => array
		(
			array('tl_shop_products', 'onsubmit_callback')
		),
		'onload_callback'             => array
		(
			array('tl_shop_products', 'onload_callback')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id'                  => 'primary',
				'alias'               => 'index'
			)
		),
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('name'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('name', 'productcode', 'type'),
			'format'                  => '%s <span style="color:#b3b3b3; padding-left:3px;">[%s / %s]</span>',
			'label_callback'          => array('tl_shop_products', 'listProdukte')
		),
		'global_operations' => array
		(
//	    'importData' => array
//	    (
//		'label'               => &$GLOBALS['TL_LANG']['tl_shop_products']['importData'],
//		'href'                => 'key=importData',
//		'class'               => 'header_edit_all',
//		'attributes'          => 'onclick="Backend.getScrollOffset();"'
//	    ),
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
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_products']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif',
				'button_callback'     => array('tl_shop_products', 'changeButton')
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_products']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_products']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_products']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_page']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_products']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'__selector__'                => array('type', 'addBaseCalculation'),
		'default'                     => '{title_legend},type,productcode,name,alias;{state_legend},marked,active,startDate,endDate;',
		'Normal'                      => '{title_legend},type,productcode,name,alias,ean,template;{extended_options},tax,state,manufactor,gewicht,tags,teaser,description;{baseprice_legend},addBaseCalculation;{costs_legend},costs;{groups:hide},warengruppen;{image_legend:hide},singleSrc,multiSrc;{catalog_legend},catalogMode,catalogMoney;{state_legend},marked,active,startDate,endDate;',
		'Digital'                     => '',
		'Variant'                     => ''
	),
	'subpalettes' => array
	(
		'addBaseCalculation'          => 'quantity_unit,volume,calculation_basis'
	),
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['type'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'options_callback'        => array('tl_shop_products', 'listProductTypes'),
			'eval'                    => array('mandatory' => true, 'submitOnChange' => true, 'tl_class' => 'w50', 'maxlength' => 64, 'includeBlankOption'=>true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['name'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'eval'                    => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50', 'acquistoSearch' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['alias'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => false,
			'eval'                    => array('rgxp' => 'alnum', 'doNotCopy' => true, 'spaceToUnderscore' => true, 'maxlength' => 128, 'tl_class' => 'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''",
			'save_callback'           => array
			(
				array('tl_shop_products', 'generateAlias')
			)
		),
		'template' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['template'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => false,
			'options_callback'        => array('tl_shop_products', 'getTemplates'),
			'eval'                    => array('maxlength' => 255, 'tl_class' => 'w50', 'includeBlankOption' => true),
			'sql'                     => "varchar(255) NOT NULL default ''",
		),
		'ean' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['ean'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'eval'                    => array('mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50', 'acquistoSearch' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'productcode' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['productcode'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'eval'                    => array('mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50', 'acquistoSearch' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'weight' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['weight'],
			'inputType'               => 'text',
			'default'                 => 0,
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'eval'                    => array('mandatory' => false, 'rgxp' => 'digit', 'tl_class' => 'w50'),
			'sql'                     => "float NOT NULL default '0'"
		),
		'state' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['state'],
			'inputType'               => 'select',
			'options'                 => array('new' => $GLOBALS['TL_LANG']['tl_shop_products']['state_opt']['new'], 'used' => $GLOBALS['TL_LANG']['tl_shop_products']['state_opt']['used'], 'refurbished' => $GLOBALS['TL_LANG']['tl_shop_products']['state_opt']['refurbished']),
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'w50', 'includeBlankOption' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'tax' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['tax'],
			'inputType'               => 'select',
			'default'                 => 0,
			'foreignKey'              => 'tl_shop_tax.title',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('mandatory' => true, 'tl_class' => 'w50'),
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'quantity_unit' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['quantity_unit'],
			'inputType'               => 'select',
			'default'                 => 0,
			'foreignKey'              => 'tl_shop_units.name',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => false,
			'eval'                    => array('mandatory' => false, 'includeBlankOption' => true),
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'addBaseCalculation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['addBaseCalculation'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('submitOnChange' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'volume' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['volume'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'eval'                    => array('mandatory' => false, 'rgxp' => 'digit ', 'maxlength' => 10, 'tl_class' => 'w50'),
			'sql'                     => "char(10) NOT NULL default ''"
		),
		'calculation_basis' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['calculation_basis'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'eval'                    => array('mandatory' => false, 'rgxp' => 'digit ', 'maxlength' => 10, 'tl_class' => 'w50'),
			'sql'                     => "char(10) NOT NULL default ''"
		),
		'manufactor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['manufactor'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_shop_manufactor.name',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'w50', 'includeBlankOption' => true),
			'sql'                     => "int(10) NOT NULL default '0'"
		),
		'teaser' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['teaser'],
			'inputType'               => 'textarea',
			'exclude'                 => true,
			'search'                  => false,
			'eval'                    => array('style' => 'height: 60px;', 'mandatory' => false, 'tl_class' => 'clr', 'acquistoSearch' => true),
			'sql'                     => "text NOT NULL"
		),
		'tags' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['tags'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory' => false, 'maxlength' => 255, 'tl_class' => 'long  clr', 'acquistoSearch' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['description'],
			'inputType'               => 'textarea',
			'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory' => false, 'rte' => 'tinyMCE', 'tl_class' => 'clr', 'acquistoSearch' => true),
			'sql'                     => "text NOT NULL"
		),
		'costs' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['preise'],
			'exclude'                 => true,
			'inputType'               => 'multiColumnWizard',
			'eval'                    => array
			(
				'columnFields' => array
				(
					'price' => array
					(
						'label'       => &$GLOBALS['TL_LANG']['tl_shop_products']['preise_value'],
						'default'     => '0',
						'inputType'   => 'text',
						'eval'        => array('mandatory' => true, 'style' => 'width:130px')
					),
					'quantity' => array
					(
						'label'       => &$GLOBALS['TL_LANG']['tl_shop_products']['preise_label'],
						'default'     => '0',
						'inputType'   => 'text',
						'eval'        => array('mandatory' => true, 'style' => 'width:130px')
					),
					'specialprice' => array
					(
						'label'       => &$GLOBALS['TL_LANG']['tl_shop_products']['preise_specialcosts'],
						'default'     => '0',
						'inputType'   => 'text',
						'eval'        => array('mandatory' => false, 'style' => 'width:130px')
					),
					'pricelist' => array
					(
						'label'       => &$GLOBALS['TL_LANG']['tl_shop_products']['preise_pricelist'],
						'exclude'     => true,
						'inputType'   => 'select',
						'foreignKey'  => 'tl_shop_pricelists.title',
						'eval'        => array('style' => 'width:160px', 'rgxp' => 'digit')
					),
				)
			),
			'sql'                     => "blob NOT NULL"
		),
		'categories' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['categories'],
			'inputType'               => 'categorieTree',
			'exclude'                 => true,
			'search'                  => false,
			'eval'                    => array('mandatory' => false, 'fieldType' => 'checkbox', 'multiple' => true),
			'sql'                     => "blob NOT NULL"
		),
		'singleSrc' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['singleSrc'],
			'inputType'               => 'fileTree',
			'exclude'                 => true,
			'search'                  => false,
			'eval'                    => array('mandatory' => false, 'fieldType' => 'radio', 'files' => true, 'filesOnly' => true, 'extensions' => 'jpg,png,gif'),
			'sql'                     => "binary(16) NULL",
		),
		'multiSrc' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['multiSrc'],
			'inputType'               => 'fileTree',
			'exclude'                 => true,
			'search'                  => false,
			'eval'                    => array('multiple' => true, 'orderField' => 'orderSRC_multiSrc', 'mandatory' => false, 'fieldType' => 'checkbox', 'files' => true, 'filesOnly' => true, 'extensions' => 'jpg,png,gif'),
			'sql'                     => "blob NULL"
		),
		'orderSRC_multiSrc' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['orderSRC'],
			'sql'                     => "blob NULL"
		),
		'digital_product' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['digital_product'],
			'inputType'               => 'fileTree',
			'exclude'                 => true,
			'search'                  => false,
			'eval'                    => array('multiple' => true, 'orderField' => 'orderSRC_digital', 'mandatory' => false, 'fieldType' => 'checkbox', 'files' => true, 'filesOnly' => true, 'extensions' => strtolower($GLOBALS['TL_CONFIG']['allowedDownload'])),
			'sql'                     => "blob NOT NULL"
		),
		'orderSRC_digital' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['orderSRC'],
			'sql'                     => "text NULL"
		),
		'marked' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['marked'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'm12 w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'active' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['active'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'm12 w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'catalogMoney' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['catalogMoney'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'm12 w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'catalogMode' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['catalogMode'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'm12 w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'startDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['startDate'],
			'inputType'               => 'text',
			'default'                 => '',
			'exclude'                 => true,
			'eval'                    => array('rgxp' => 'date', 'mandatory' => false, 'doNotCopy' => true, 'datepicker' => true, 'tl_class' => 'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'endDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_products']['endDate'],
			'inputType'               => 'text',
			'default'                 => '',
			'exclude'                 => true,
			'eval'                    => array('rgxp' => 'date', 'mandatory' => false, 'doNotCopy' => true, 'datepicker' => true, 'tl_class' => 'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'calculateTax' => array
		(
			'sql'                     => "char(1) NOT NULL default ''"
		)
	)
);

class tl_shop_products extends Backend
{
	protected $productObject;

	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	public function onsubmit_callback($dc)
	{
		$this->productObject = $this->Database->prepare("UPDATE tl_shop_products SET calculateTax = '1' WHERE id=?")->execute($this->Input->Get('id'));
	}

	public function listProdukte($arrRow)
	{
		return sprintf('%s <span style="color:#b3b3b3; padding-left:3px;">[%s / %s]</span>', $arrRow['name'], $arrRow['productcode'], $GLOBALS['TL_LANG']['tl_acquisto_pclasses'][$arrRow['type']][0]);
	}

	public function onload_callback(DataContainer $dc)
	{
		$objData = $this->Database->prepare("SELECT * FROM tl_shop_products WHERE id=?")->limit(1)->execute($dc->id);
	}

	public function changeButton($row, $href, $label, $title, $icon, $attributes)
	{
		if ($GLOBALS['ACQUISTO_PCLASS'][$row['type']][0]) 
		{
			$objProdukt = new $GLOBALS['ACQUISTO_PCLASS'][$row['type']][0]($row['id']);

			if ($objProdukt->hasAttributes)  {
				return '<a title="edit" href="' . $this->addToUrl(str_replace("act=edit", "table=tl_shop_products_attribute", $href)) . "&id=" . $row['id'] . '"><img width="12" height="16" alt="' . $label . '" title="' . $title . '" src="system/themes/default/images/' . $icon . '"></a>&nbsp;';
			} 
			elseif ($objProdukt->subTable) {
				return '<a title="edit" href="' . $this->addToUrl(str_replace("act=edit", "table=" . $objProdukt->subTable, $href)) . "&id=" . $row['id'] . '"><img width="12" height="16" alt="' . $label . '" title="' . $title . '" src="system/themes/default/images/' . $icon . '"></a>&nbsp;';
			} 
			else {
				return '<a title="edit" href="' . $this->addToUrl($href) . "&id=" . $row['id'] . '"><img width="12" height="16" alt="' . $label . '" title="' . $title . '" src="system/themes/default/images/' . $icon . '"></a>&nbsp;';
			}
		} 
		else 
		{
			return '<a title="edit" href="' . $this->addToUrl($href) . "&id=" . $row['id'] . '"><img width="12" height="16" alt="' . $label . '" title="' . $title . '" src="system/themes/default/images/' . $icon . '"></a>&nbsp;';
		}
	}

	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		if (!strlen($varValue)) {
			$autoAlias = true;
			$varValue = standardize($dc->activeRecord->name);
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_shop_products WHERE id=? OR alias=?")->execute($dc->id, $varValue);

		return $varValue;
	}

	public function listProductTypes()
	{
		$handle = opendir(TL_ROOT . '/system/modules/acquistoShop/classes/products');
		while (false !== ($file = readdir($handle))) {
			if($file != "." && $file != "..") {
				$returnClasses[substr($file, 0, strrpos($file, "."))] = substr($file, 0, strrpos($file, "."));
			}
		}

		return $returnClasses;
	}


	public function getTemplates(DataContainer $dc)
	{
#		echo $dc->activeRecord->type::getTemplate();
		print_r(Normal::getTemplate());
#		return $this->getTemplateGroup('acquisto_produkt_', $dc->activeRecord->pid);
	}
}
