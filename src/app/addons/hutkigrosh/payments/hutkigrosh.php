<?php

use esas\hutkigrosh\controllers\ControllerAddBill;
use esas\hutkigrosh\Registry as HgRegistry;
use esas\hutkigrosh\wrappers\OrderWrapperCSCart;

if (!defined('BOOTSTRAP')) {
    die('Access denied');
}
if ($mode == 'place_order') {
    try {
        $orderWrapper = new OrderWrapperCSCart($order_info);
        $controller = new ControllerAddBill();
        $resp = $controller->process($orderWrapper);
        // в массив $pp_response помещаются данные для дальнейшей обработки ядром
        $pp_response['order_status'] = HgRegistry::getRegistry()->getConfigurationWrapper()->getBillStatusPending();
        $pp_response['transaction_id'] = $resp->getBillId();
    } catch (Throwable $e) {
        $pp_response['order_status'] = HgRegistry::getRegistry()->getConfigurationWrapper()->getBillStatusFailed();
        $pp_response["reason_text"] = $e->getMessage();
    }
}

