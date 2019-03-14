<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 26.02.2018
 * Time: 14:02
 */

use esas\hutkigrosh\controllers\ControllerAlfaclick;
use esas\hutkigrosh\controllers\ControllerNotify;

if ($mode == 'alfaclick') {
    try {
        $controller = new ControllerAlfaclick();
        $controller->process();
    } catch (Throwable $e) {
        Logger::getLogger("alfaclick")->error("Exception: ", $e);
    }
    exit;
} elseif ($mode == 'notify') {
    try {
        $controller = new ControllerNotify();
        $controller->process();
    } catch (Throwable $e) {
        Logger::getLogger("callback")->error("Exception:", $e);
    }
    exit;
}