<?php

$GLOBALS['TL_DCA']['tl_shop_attribute'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_shop_attribute_values'),
		'enableVersioning'            => true,
		'switchToEdit'                => true,
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
			'mode'                    => 2,
			'fields'                  => array('name'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;sort,search,limit'
		),
		'label' => array
		(
			'fields'                  => array('name', 'fieldtype', 'price_calculation'),
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
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_attribute']['edit'],
				'href'                => 'table=tl_shop_attribute_values',
				'icon'                => 'edit.gif',
				'button_callback'     => array('tl_shop_attributes', 'bcc_edit')
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_attribute']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_attribute']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_attribute']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_attribute']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'__selector__'                => array('predefined_attributes', 'attributes_from_db', 'db_use_where'),
		'default'                     => '{title_legend},name,fieldtype,price_calculation;{attribute_legend},predefined_attributes',
	),
	'subpalettes' => array
	(
		'predefined_attributes'       => 'attributes_from_db',
		'attributes_from_db'          => 'db_table,db_title,db_use_where',
		'db_use_where'                => 'db_where_query'
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
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['name'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => false,
			'sorting'                 => true,
			'eval'                    => array('mandatory' => true, 'maxlength' => 255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'fieldtype' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['fieldtype'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'sorting'                 => true,
			'options'                 => array('select', 'radio', 'checkbox', 'text', 'textarea'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options'],
			'eval'                    => array('mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50', 'chosen' => true),
			'sql'                     => "char(32) NOT NULL default ''"
		),
		'price_calculation' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['price_calculation'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'sorting'                 => true,
			'options'                 => array('addsum', 'endsum'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options'],
			'eval'                    => array('mandatory' => false, 'maxlength' => 64, 'tl_class' => 'w50', 'includeBlankOption' => true, 'chosen' => true),
			'sql'                     => "char(64) NOT NULL default ''"
		),
		'predefined_attributes' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['predefined_attributes'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('submitOnChange' => true, 'tl_class' => 'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'attributes_from_db' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['attributes_from_db'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => true,
			'eval'                    => array('submitOnChange' => true, 'tl_class' => 'w50'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'db_table' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['db_table'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => false,
			'options_callback'        => array('tl_shop_attributes', 'oc_db_table'),
			'eval'                    => array('mandatory' => false,  'tl_class' => 'w50', 'submitOnChange' => true, 'chosen' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'db_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['db_title'],
			'inputType'               => 'select',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => false,
			'options_callback'        => array('tl_shop_attributes', 'oc_get_fields'),
			'eval'                    => array('mandatory' => false, 'maxlength' => 64, 'tl_class' => 'w50', 'chosen' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'db_use_where' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['db_usw_where'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'search'                  => false,
			'filter'                  => false,
			'eval'                    => array('submitOnChange' => true, 'tl_class' => 'clr m12'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'db_where_query' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query'],
			'exclude'                 => true,
			'inputType'               => 'multiColumnWizard',
			'eval'                    => array
			(
				'columnFields' => array
				(
					'field' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query_field'],
						'inputType'        => 'select',
						'options_callback' => array('tl_shop_attributes', 'oc_get_fields'),
						'eval'             => array('mandatory' => true, 'style' => 'width:224px', 'chosen' => true)
					),
					'operator' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query_operator'],
						'options'          => array('IS', 'IS NOT', 'LIKE', 'NOT LIKE'),
						'inputType'        => 'select',
						'eval'             => array('mandatory' => true, 'style' => 'width:120px', 'chosen' => true)
					),
					'value' => array
					(
						'label'            => &$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query_value'],
						'default'          => '',
						'inputType'        => 'text',
						'eval'             => array('mandatory' => true, 'style' => 'width:224px')
					)
				),
				'tl_class' => 'clr m12'
			),
			'sql'                     => "blob NOT NULL"
		),

	)
);

class tl_shop_attributes extends Backend
{
    public function __construct()
    {
	parent::__construct();
	$this->import('BackendUser', 'User');
    }

    public function bcc_edit($row, $href, $label, $title, $icon, $attributes)
    {
	if($row['predefined_attributes'] && !$row['attributes_from_db']) {
	    return '<a href="' . $this->addToUrl($href) . '" title="' . specialchars($title) . '"' . $attributes . '>' . $this->generateImage($icon, $label) . '</a>';
	}
    }

    public function oc_db_table() 
    {
	$objTables = $this->Database->prepare("SHOW TABLES")->execute();
	while($objTables->next()) {
	    $row = current($objTables->row());
	    $tablesArray[$row] = $row;
	}

	return $tablesArray;
    }

    public function oc_get_fields($row) 
    {
	$objData = $this->Database->prepare("SELECT * FROM tl_shop_attribute WHERE id=?")->limit(1)->execute($this->Input->Get('id'));

	if($objData->db_table) {
	    $objTables = $this->Database->prepare("SHOW FIELDS FROM " . $objData->db_table)->execute();
	    while($objTables->next()) {
		$row = current($objTables->row());
	    	$tablesArray[$row] = $row;
	    }
	}

	return $tablesArray;
    }
}