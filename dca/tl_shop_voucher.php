<?php

$GLOBALS['TL_DCA']['tl_shop_voucher'] = array
(
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'switchToEdit'                => false,
	'sql' => array
    	(
    	    'keys' => array
    	    (
    		'id' => 'primary'
    	    )
    	)
    ),
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 1,
            'fields'                  => array('code'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('code', 'costs', 'using_counter', 'timelimit', 'active'),
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
                'label'               => &$GLOBALS['TL_LANG']['tl_shop_voucher']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
            'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_shop_voucher']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_shop_voucher']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_shop_voucher']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),
    'palettes' => array
    (
        '__selector__'                => array('timelimit', 'using_counter'),
        'default'                     => '{title_legend},code,costs,member;{counter_legend},using_counter;{time_legend},timelimit;{state_legend},active',
    ),
    'subpalettes' => array
    (
        'timelimit'                   => 'startDate,endDate',
        'using_counter'               => 'max_using'
    ),
    'fields' => array
    (
        'id' => array
    	(
	    'sql'                     => "int(10) unsigned NOT NULL auto_increment"
    	),
    	'tstamp' => array
    	(
    	    'sql'                     => "int(10) unsigned NOT NULL default '0'"
    	),
    	'bestellung_id' => array
    	(
    	    'sql'                     => "int(10) NOT NULL default '0'"
    	),
    	'is_used' => array
    	(
    	    'sql'                     => "int(10) NOT NULL default '0'"
    	),
        'code' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['code'],
            'inputType'               => 'text',
            'search'                  => true,
	    'exclude'                 => true,
	    'filter'                  => false,
	    'sorting'                 => false,
            'eval'                    => array('mandatory'=>true, 'maxlength'=>20),
	    'sql'                     => "char(20) NOT NULL default ''"
        ),
        'costs' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['costs'],
            'inputType'               => 'text',
            'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => false,
	    'sorting'                 => false,
            'eval'                    => array('mandatory' => true, 'maxlength' => 20, 'tl_class' => 'w50', 'rgxp' => 'digit'),
	    'sql'                     => "float NOT NULL default '0'"
        ),
        'member' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['member'],
            'inputType'               => 'select',
            'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => true,
	    'sorting'                 => false,
	    'foreignKey'              => 'tl_member.CONCAT(firstname, " ", lastname)',
            'eval'                    => array('mandatory' => false, 'tl_class' => 'w50', 'includeBlankOption' => true, 'chosen' => true),
	    'sql'                     => "int(10) NOT NULL default '0'"
        ),
        'timelimit' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['timelimit'],
            'inputType'               => 'checkbox',
            'default'                 => '',
	    'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => true,
	    'sorting'                 => false,
            'eval'                    => array('mandatory' => false, 'isBoolean' => true, 'submitOnChange' => true),
	    'sql'                     => "char(1) NOT NULL default ''"
        ),
        'using_counter' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['using_counter'],
            'inputType'               => 'checkbox',
            'default'                 => '',
	    'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => true,
	    'sorting'                 => false,
            'eval'                    => array('mandatory' => false, 'isBoolean' => true, 'submitOnChange' => true),
	    'sql'                     => "char(1) NOT NULL default ''"
        ),
        'max_using' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['max_using'],
            'inputType'               => 'text',
	    'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => false,
	    'sorting'                 => false,
            'eval'                    => array('mandatory' => true, 'maxlength' => 10, 'rgxp' => 'digit'),
	    'sql'                     => "int(10) NOT NULL default '0'"
        ),
        'startDate' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['startDate'],
            'default'                 => time(),
            'inputType'               => 'text',
	    'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => false,
	    'sorting'                 => false,
            'eval'                    => array('rgxp' => 'date', 'mandatory' => true, 'maxlength' => 20, 'datepicker' => $this->getDatePickerString(),'tl_class' => 'w50 wizard'),
	    'sql'                     => "int(10) NOT NULL default '0'"
        ),
        'endDate' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['endDate'],
            'default'                 => time(),
            'inputType'               => 'text',
	    'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => false,
	    'sorting'                 => false,
            'eval'                    => array('rgxp' => 'date', 'mandatory' => true, 'maxlength' => 20, 'datepicker' => $this->getDatePickerString(),'tl_class' => 'w50 wizard'),
	    'sql'                     => "int(10) NOT NULL default '0'"
        ),
        'active' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_shop_voucher']['active'],
            'inputType'               => 'checkbox',
	    'search'                  => false,
	    'exclude'                 => true,
	    'filter'                  => true,
	    'sorting'                 => false,
            'eval'                    => array('mandatory'=>false, 'isBoolean' => true),
	    'sql'                     => "char(1) NOT NULL default ''"
        )
    )
);
