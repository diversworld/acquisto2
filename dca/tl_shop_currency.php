<?php

$GLOBALS['TL_DCA']['tl_shop_currency'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'switchToEdit'                => false,
		'onsubmit_callback' => array
		(
			array('tl_shop_currency', 'onsubmit_callback')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id'                  => 'primary'
			)
		)
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
			'fields'                  => array('name', 'exchange_ratio'),
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
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_currency']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_currency']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_currency']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_currency']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'default'                         => '{title_legend},name;{config_legend},default_currency,iso_code,exchange_ratio;{show_legend},guests;',
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
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_currency']['name'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'sorting'                 => false,
			'eval'                    => array('mandatory' => true, 'maxlength' => 255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'default_currency' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_currency']['default_currency'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'sorting'                 => false,
			'eval'                    => array('mandatory' => false, 'maxlength' => 255),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'guests' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_currency']['guests'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'sorting'                 => false,
			'eval'                    => array('mandatory' => false, 'maxlength' => 255, 'tl_class' => 'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'iso_code' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_currency']['iso_code'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'sorting'                 => false,
			'eval'                    => array('mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'exchange_ratio' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_currency']['exchange_ratio'],
			'inputType'               => 'text',
			'default'                 => '0',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => false,
			'sorting'                 => false,
			'eval'                    => array('mandatory' => true, 'rgxp' => 'digit', 'maxlength' => 255, 'tl_class' => 'w50'),
			'sql'                     => "float NOT NULL default '0'"
		)
	)
);

class tl_shop_currency extends Backend
{
    public function onsubmit_callback($dc)
    {
	if ($this->Input->Post('default_currency') && $this->Input->Post('FORM_SUBMIT') == 'tl_shop_currency') {
	    $this->Database->prepare("UPDATE tl_shop_currency SET default_currency = ''")->execute();
	    $this->Database->prepare("UPDATE tl_shop_currency SET default_currency = '1' WHERE id=?")->execute($this->Input->Get('id'));
	}
    }
}
