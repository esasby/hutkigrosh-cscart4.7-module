<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 28.02.2018
 * Time: 17:51
 */

use esas\hutkigrosh\Registry;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

if ($mode == 'processor') {

    $configForm = Registry::getRegistry()->getConfigForm();
    Tygh::$app['view']->assign('configForm', $configForm);
}