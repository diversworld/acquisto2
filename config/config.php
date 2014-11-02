<?php

$GLOBALS['BE_MOD']['acquisto'] = array
(
    'acquistoShopManufactor' => array
    (
		'tables'     => array('tl_shop_manufactor'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_manufactor.png',
    ),
    'acquistoShopProducts' => array
    (
		'tables'     => array('tl_shop_products', 'tl_shop_products_attributes', 'tl_shop_products_variants'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_products.png'
    ),
    'acquistoShopCategories' => array
    (
		'tables'     => array('tl_shop_categories'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_categories.png'
    ),
    'acquistoShopCoupons' => array
    (
		'tables'     => array('tl_shop_coupons'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_coupons.png'
    )
);

$GLOBALS['BE_MOD']['acquisto_Orders'] = array
(
    'acquistoShopOrders' => array
    (
		'tables'     => array('tl_shop_orders', 'tl_shop_orders_items', 'tl_shop_orders_customer'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_orders.png'
    )
);

$GLOBALS['BE_MOD']['acquisto_Settings'] = array
(
    'acquistoShopAttribute' => array
    (
		'tables'     => array('tl_shop_attribute', 'tl_shop_attribute_values'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_attribute.png',
    ),
    'acquistoShopSettings' => array
    (
		'tables'     => array('tl_shop_settings'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_settings.png'
    ),
    'acquistoShopUnits' => array
    (
		'tables'     => array('tl_shop_units'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_units.png'
    ),
    'acquistoShopTax' => array
    (
		'tables'     => array('tl_shop_tax', 'tl_shop_tax_items'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_tax.png'
    ),
    'acquistoShopShippingZones' => array
    (
		'tables'     => array('tl_shop_shippingzones', 'tl_shop_shippingzones_conditions'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_shippingzones.png'
    ),
    'acquistoShopPayment' => array
    (
		'tables'     => array('tl_shop_payment'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_payment.png'
    ),
    'acquistoShopCurrency' => array
    (
		'tables'     => array('tl_shop_currency'),
		'icon'       => 'system/modules/acquisto2/assets/icons/tl_shop_currency.png'
    ),
    'acquistoShopPricelists' => array
    (
		'tables'     => array('tl_shop_pricelists'),
		'icon'       => 'system/modules/acquisto2/assets/gfx/page_paste.png',
    ),
    'acquistoShopExport' => array
    (
		'tables'     => array('tl_shop_export'),
		'icon'       => 'system/modules/acquisto2/assets/gfx/page_code.png',
		'export'     => array('tl_shop_export', 'exportData'),
    ),
//     'acquistoShopImport' => array
//     (
//         'tables'     => array('tl_shop_import', 'tl_shop_import_log'),
//         'icon'       => 'system/modules/acquisto2/assets/gfx/page_code.png',
//         'importData' => array('acquistoShopBackend', 'importData'),
//     )
);

//$GLOBALS['FE_MOD']['acquisto'] = array
//(
//*    'acq_productreader'  => 'ModuleAcquistoProductReader',
//*    'acq_productlist'    => 'ModuleAcquistoProductList',
//    'acq_search'         => 'ModuleAcquistoSearch',
//    'acq_shipping'       => 'ModuleAcquistoShipping',
//    'acq_currency'       => 'ModuleAcquistoCurrency',
//*    'acq_categories'     => 'ModuleAcquistoCategories',
//*    'acq_card'           => 'ModuleAcquistoCard',
//*    'acq_tags'           => 'ModuleAcquistoTags',
//    'acq_coupon'         => 'ModuleAcquistoCoupon',
//*    'acq_orderreader'    => 'ModuleAcquistoOrderReader',
//*    'acq_orderlist'      => 'ModuleAcquistoOrderList',
//*    'acq_terms'          => 'ModuleAcquistoTerms'
//);

//$GLOBALS['FE_MOD']['acquisto_widget'] = array
//(
//*    'acq_widget_cardwidget'     => 'ModuleAcquistoCardWidget',
//    'acq_widget_productfilter'  => 'ModuleAcquistoProductFilter',
//    'acq_widget_recently'       => 'ModuleAcquistoRecently'
//);

///**
// * Content Element
// */
////$GLOBALS['TL_CTE']['acquistoShop']['product'] = 'ContentProduct';

//$GLOBALS['TL_JAVASCRIPT'][] = '/system/modules/acquisto2/assets/javascript/acquisto2.js';

//
//$GLOBALS['TL_HOOKS']['getSystemMessages']['loadSystemmessages'] = array('AcquistoShop\acquistoShopMessages', 'checkAcquistoState');
//$GLOBALS['TL_HOOKS']['executePreActions']['loadCategorietree']  = array('AcquistoShop\acquistoShopAjax', 'PRECategorieActions');
//$GLOBALS['TL_HOOKS']['executePostActions']['loadCategorietree'] = array('AcquistoShop\acquistoShopAjax', 'POSTCategorieActions');
//
//if (TL_MODE == 'BE')
//{
//    $GLOBALS['TL_CSS'][] = 'system/modules/acquisto2/assets/css/backend.css|all';
//
//    if($GLOBALS['TL_CONFIG']['serialnumber'])
//    {
//	$GLOBALS['BE_MOD']['acquisto_Settings']['acquistoShopPortal'] = array
//	(
//	   'callback'   => 'ModuleAcquistoPortal',
//	   'icon'       => 'system/modules/acquisto2/html/assets/gfx/plugin.png',
//	);
//    }
//
////     AcquistoShop\Helper\AcquistoUpdate::upgradeVersion();
//}
//
//$GLOBALS['ACQUISTO_PCLASS']['normal']  = array('AcquistoShop\Product\acquistoPClassNormal', 'acquistoShop');
//$GLOBALS['ACQUISTO_PCLASS']['digital'] = array('AcquistoShop\Product\acquistoPClassDigital', 'acquistoShop');
//$GLOBALS['ACQUISTO_PCLASS']['variant'] = array('AcquistoShop\Product\acquistoPClassVariant', 'acquistoShop');

//*$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('\Acquisto\Classes\InsertTags', 'replaceAcquistoInsertTags');

$GLOBALS['TL_HEAD']['ACQUISTO2'] = '<!--

    Acquisto 2.0 Webshop - http://contao-acquisto.de :: Licensed under GNU/LGPL
    Copyright (c)2012 - 2014 by Sascha Brandhoff :: Extensions of Acquisto are copyright of their respective owners
    Visit the project website at http://www.contao-acquisto.de for more information

//-->';

define('ACQUISTO_MAJOR', '2');
define('ACQUISTO_MINOR', '0');
define('ACQUISTO_REVISION', '0');
define('ACQUISTO_BUILD', '0001');
