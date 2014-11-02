<?php

$GLOBALS['TL_DCA']['tl_shop_tax_items'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_shop_tax',
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
			'fields'                  => array('valid_from'),
			'headerFields'            => array('name'),
			'flag'                    => 12,
			'panelLayout'             => 'search,limit',
			'child_record_callback'   => array('tl_shop_tax_items', 'listItems'),
			'disableGrouping'         => true
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
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_tax_items']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_tax_items']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_tax_items']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_shop_tax_items']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'default'                         => '{title_legend},tax,valid_from;',
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
		'tax' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_tax_items']['tax'],
			'inputType'               => 'text',
			'search'                  => true,
			'eval'                    => array('mandatory' => true, 'maxlength' => 64, 'tl_class' => 'w50', 'rgxp' => 'digit'),
			'sql'                     => "float NOT NULL default '0'"
		),
		'valid_from' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_shop_tax_items']['valid_from'],
			'default'                 => time(),
			'inputType'               => 'text',
			'exclude'                 => true,
			'eval'                    => array('mandatory' => true, 'maxlength' => 20, 'datepicker' => $this->getDatePickerString(),'tl_class' => 'w50 wizard', 'rgxp' => 'date'),
			'sql'                     => "int(10) NOT NULL default '0'"
		)
	)
);

class tl_shop_tax_items extends Backend
{
    public function __construct()
    {
	parent::__construct();
	$this->import('BackendUser', 'User');
    }

    public function listItems($arrRow)
    {
	if(!$GLOBALS['TL_CONFIG']['dateFormat']) {
	    $GLOBALS['TL_CONFIG']['dateFormat'] = 'Y-m-d';
	}

	$row = sprintf("%01.2f", $arrRow['tax']) . '% <span style="color:#b3b3b3; padding-left:3px;">[' . \Date::parse($GLOBALS['TL_CONFIG']['dateFormat'], $arrRow['valid_from']) . ']</span>';
	return "<div>" . $row . "</div>\n";
    }
}
