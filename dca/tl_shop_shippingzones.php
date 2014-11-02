<?php

$GLOBALS['TL_DCA']['tl_shop_shippingzones'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_shop_shippingzones_conditions'),
		'enableVersioning'            => true,
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
			'panelLayout'             => 'search,limit'
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
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['edit'],
				'href'                => 'table=tl_shop_versandzonen_varten',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'default'                     => '{title_legend},name,calculate_tax,description;{country_legend},countrys;',
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
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['name'],
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory' => true, 'maxlength' => 255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'calculate_tax' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['calculate_tax'],
			'inputType'               => 'checkbox',
			'default'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory' => false, 'isBoolean' => true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['description'],
			'inputType'               => 'textarea',
			'search'                  => true,
			'eval'                    => array('mandatory' => false, 'tl_class' => 'clr'),
			'sql'                     => "blob NOT NULL"
		),
		'countrys' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_shippingzones']['countrys'],
			'inputType'               => 'checkbox',
			'search'                  => true,
			'options'                 => $this->getCountries(),
			'eval'                    => array('mandatory' => true, 'multiple' => true),
			'sql'                     => "blob NOT NULL"
		)
	)
);
