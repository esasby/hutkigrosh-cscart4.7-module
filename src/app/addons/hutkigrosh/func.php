<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 01.03.2018
 * Time: 12:55
 */

use esas\hutkigrosh\ConfigurationFields;
use esas\hutkigrosh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

/**
 * Хук, с помощью которого подставляется default инструкция по оплате счета в админке.
 * Реализовано ввиде хука, а не через sql в addons.xml для большей гибкости
 * @param $payment_id
 * @param $payment
 *
 */
function fn_hutkigrosh_summary_get_payment_method(&$payment_id, &$payment)
{
    if (!isset($payment['instructions']) || $payment['instructions'] == "") {
        $payment['instructions'] = Registry::getRegistry()->getTranslator()->getConfigFieldDefault(ConfigurationFields::paymentMethodDetails());
    }
}
