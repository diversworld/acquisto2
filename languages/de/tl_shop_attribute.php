<?php

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_shop_attribute']['title_legend']             = 'Allgemein';
$GLOBALS['TL_LANG']['tl_shop_attribute']['attribute_legend']         = 'Attribute Einstellungen';

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_shop_attribute']['name']                       = array('Bezeichnung', 'Geben Sie eine Bezeichnung für dieses Attribut ein. Diese Bezeichnung wird auch im Frontend angezeigt.');
$GLOBALS['TL_LANG']['tl_shop_attribute']['fieldtype']                  = array('Feldtyp', 'W&auml;hlen Sie den Feldtyp aus. Wenn Sie eine Mehrfachauswahl erm&ouml;glichen wollen nutzen Sie Checkboxen.');
$GLOBALS['TL_LANG']['tl_shop_attribute']['price_calculation']          = array('Preiskalkulation', 'W&auml;hlen Sie aus ob eine Preiskalkulation stattfinden soll und in welcher Art.');
$GLOBALS['TL_LANG']['tl_shop_attribute']['predefined_attributes']      = array('Vordefinierte Attribute', 'Wollen Sie Attribute vorab definieren?');
$GLOBALS['TL_LANG']['tl_shop_attribute']['attributes_from_db']         = array('Attribute aus Datenbank-Tabelle laden', 'Definieren Sie eine Tabelle aus der die Werte geladen werden.');
$GLOBALS['TL_LANG']['tl_shop_attribute']['db_table']                   = array('Tabelle', 'W&auml;hlen Sie die Tabelle aus der die Daten geladen werden.');
$GLOBALS['TL_LANG']['tl_shop_attribute']['db_title']                   = array('Feld', 'W&auml;hlen Sie das Feld das ausgelesen werden soll.');
$GLOBALS['TL_LANG']['tl_shop_attribute']['db_usw_where']               = array('WHERE-Abfrage einf&uuml;gen', 'Wenn Sie eine WHERE-Abfrage hinzuf&uuml;gen m&ouml;chten aktivieren Sie dieses Feld.');
$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query']             = array('Abfrage definieren', 'W&auml;hlen Sie pro Zeile ein Feld den Operator und geben Sie den Wert ein. Auch InsertTags sind möglich wie z. B. {{user::id}}.');

/**
 * Subfields
 */
$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query_field']       = array('Feld');
$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query_operator']    = array('Operator');
$GLOBALS['TL_LANG']['tl_shop_attribute']['db_where_query_value']       = array('Wert');

/**
 * Options
 */
$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options']['select']   = 'Dropdown-Box';
$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options']['checkbox'] = 'Checkboxen';
$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options']['radio']    = 'Radio-Felder';
$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options']['text']     = 'Textfeld';
$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options']['textarea'] = 'Textbox';
$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options']['endsum']   = 'Endpreis';
$GLOBALS['TL_LANG']['tl_shop_attribute']['select_options']['addsum']   = 'Preis addieren';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_shop_attribute']['new']                        = array('Neues Attribut', 'Neu');
$GLOBALS['TL_LANG']['tl_shop_attribute']['edit']                       = array('Bearbeiten', 'Vordefinierte Attribute der ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_shop_attribute']['editheader']                 = array('Bearbeiten', 'Einstellung des Attribut ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_shop_attribute']['copy']                       = array('Duplizieren', 'Attribut ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_shop_attribute']['delete']                     = array('Loeschen', 'Attribut ID %s l&ouml;schen');
$GLOBALS['TL_LANG']['tl_shop_attribute']['show']                       = array('Details', 'Details des Attribut ID %s anzeigen');
