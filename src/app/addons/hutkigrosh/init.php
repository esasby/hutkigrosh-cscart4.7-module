<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 01.03.2018
 * Time: 12:53
 */

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}

require_once(dirname(__FILE__) . '/lib/vendor/esas/hutkigrosh-api-php/src/esas/hutkigrosh/CmsPlugin.php');

use esas\hutkigrosh\CmsPlugin;
use esas\hutkigrosh\RegistryCSCart;


(new CmsPlugin(dirname(__FILE__) . '/lib/vendor', dirname(__FILE__) . '/lib'))
    ->setRegistry(new RegistryCSCart())
    ->init();