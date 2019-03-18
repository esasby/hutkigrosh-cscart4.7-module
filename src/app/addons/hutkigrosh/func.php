<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 01.03.2018
 * Time: 12:55
 */

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

function fn_hutkigrosh_install_db()
{
    /**
     * TODO добавленный таким способом платеж не виден клиенту из-за ult_objects_sharing
     * https://www.cs-cart.ru/docs/4.4.x/developer_guide/core/sharing_schema.html
     * Надо разобраться как это работает
     **/


//    require_once(dirname(__FILE__) . '/init.php');
//    $where = array(
//        'processor' => 'Hutkigrosh');
//    $payment_processor = db_get_row("SELECT * FROM ?:payment_processors WHERE ?w", $where);
//    $payment_data = array(
//        'payment' => Registry::getRegistry()->getTranslator()->getConfigFieldDefault(ConfigurationFields::paymentMethodName()),
//        'processor_id' => $payment_processor['processor_id'],
//        'status' => 'A',
//        'instructions' => Registry::getRegistry()->getTranslator()->getConfigFieldDefault(ConfigurationFields::paymentMethodDetails()),
//    );
//    fn_update_payment($payment_data, 0);
}
