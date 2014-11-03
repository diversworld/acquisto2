<?php

$GLOBALS['TL_DCA']['tl_shop_payment'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => false,
		'switchToEdit'                => true,
//		'onload_callback'             => array('tl_shop_payment', 'onloadCallback'),
		'sql' => array
		(
			'keys' => array
			(
				'id'                  => 'primary'
			)
		),
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title', 'module'),
			'showColumns'             => true,
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
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_payment']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_payment']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_payment']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_payment']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'__selector__'                => array('payment_module'),
		'default'                     => '{title_legend},title,module,description;{config_legend},configData;{useable_legend},guests,groups;'
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
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_payment']['title'],
			'inputType'               => 'text',
			'search'                  => true,
                        'exclude'                 => true,
                        'filter'                  => false,
                        'sorting'                 => false,			
			'eval'                    => array('mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'module' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_payment']['module'],
			'inputType'               => 'select',
			'search'                  => false,
                        'exclude'                 => true,
                        'filter'                  => true,
                        'sorting'                 => false,
			'options_callback'        => array('tl_shop_payment', 'getPaymentModules'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_shop_payment']['select_options'],
			'eval'                    => array('mandatory' => true, 'includeBlankOption' => true, 'tl_class' => 'w50', 'submitOnChange' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_payment']['description'],
			'inputType'               => 'textarea',
			'search'                  => false,
                        'exclude'                 => true,
                        'filter'                  => false,
                        'sorting'                 => false,
			'eval'                    => array('mandatory' => false, 'rte' => 'tinyMCE', 'tl_class' => 'clr'),
			'sql'                     => "text NOT NULL"
		),
		'guests' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_payment']['guests'],
			'inputType'               => 'checkbox',
			'search'                  => false,
                        'exclude'                 => true,
                        'filter'                  => true,
                        'sorting'                 => false,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_payment']['groups'],
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_member_group.name',
			'search'                  => false,
                        'exclude'                 => true,
                        'filter'                  => true,
                        'sorting'                 => false,
			'eval'                    => array('multiple' => true, 'mandatory' => false, 'tl_class' => 'w50'),
			'sql'                     => "text NOT NULL"
		),
		'module_configuration' => array
		(
			'input_field_callback'    => array('tl_shop_payment', 'nadas'),
			'sql'                     => "text NOT NULL"
		)
	)
);

class tl_shop_payment extends Backend
{
    public function __construct()
    {
	parent::__construct();
	$this->import('BackendUser', 'User');
//		$this->import('acquistoShopPayment', 'Payment');
    }

	public function nadas(DataContainer $DC)
	{
//		if ($this->Input->post('FORM_SUBMIT') == 'tl_shop_payment')
//		{
//			$this->Database->prepare("UPDATE tl_shop_zahlungsarten SET configData = '" . serialize($this->Input->Post('configData')) . "' WHERE id = ?")->execute($DC->id);
//		}
//
//		$objZahlungsart = $this->Database->prepare("SELECT * FROM tl_shop_zahlungsarten WHERE id = ?")->limit(1)->execute($DC->id);
//		if (file_exists(TL_ROOT . '/system/modules/acquistoShop/modules/payment/' . $objZahlungsart->payment_module . '.php'))
//		{
//			include_once(TL_ROOT . '/system/modules/acquistoShop/modules/payment/' . $objZahlungsart->payment_module . '.php');
//			$paymentModule = new $objZahlungsart->payment_module();
//
//			$arrConfig = unserialize($objZahlungsart->configData);
//			if (is_array($paymentModule->getConfigData()))
//			{
//				foreach ($paymentModule->getConfigData() as $name => $element)
//				{
//					$objElement = $GLOBALS['BE_FFL'][$element['inputType']];
//					$objElement = new $objElement($this->prepareForWidget($element, 'configData[' . $name . ']'));
//					$objElement->value = $arrConfig[$name];
//
//					if ($element['inputType'] != 'checkbox')
//					{
//						$htmlData .= sprintf('<h3><label for="%s">%s</label></h3>', 'configData[' . $name . ']', $element['label'][0]);
//					}
//
//					$htmlData .= $objElement->generate();
//					$htmlData .= sprintf('<p class="tl_help">%s</p>', $element['label'][1]);
//				}
//			}
//			else
//			{
//				$htmlData = '<h3>Keine Konfigurationparameter</h3><p class="tl_help">Entweder wurd keine Zahlungsart ausgew&auml;hlt oder es gibt keine Konfigurationwerte.</p>';
//			}
//		}
//		else
//		{
//			$htmlData = '<h3>Keine Konfigurationparameter</h3><p class="tl_help">Entweder wurd keine Zahlungsart ausgew&auml;hlt oder es gibt keine Konfigurationwerte.</p>';
//		}
//
//		return $htmlData;
	}

    public function getGroups()
    {
    }

    public function getPaymentModules()
    {
	$paymentDir = opendir(TL_ROOT . '/system/modules/acquisto2/classes/payment');
	while (($file = readdir($paymentDir)) !== false) {
	    if (substr($file, -4) == '.php') {
		$modules[] = substr($file, 0, -4);
	    }
	}

	closedir($fontsdir);

	return $modules;
    }
}
