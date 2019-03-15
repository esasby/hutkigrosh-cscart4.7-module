<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 26.02.2018
 * Time: 14:25
 */

use esas\hutkigrosh\controllers\ControllerCompletionPage;

if ($mode == 'complete') {
    if (!empty($_REQUEST['order_id'])) {
        $order_info = fn_get_order_info($_REQUEST['order_id']);
        if (strtolower($order_info["payment_method"]["processor"]) == "hutkigrosh") {
            try {
                $controller = new ControllerCompletionPage(
                    fn_url("hutkigrosh.alfaclick"),
                    REAL_URL);
                $completionPanel = $controller->process($order_info);
                $completionPanel->getViewStyle()
                    ->setMsgUnsuccessClass("cm-notification-content notification-content alert-error")
                    ->setMsgSuccessClass("cm-notification-content notification-content alert-success")
                    ->setWebpayButtonClass("ty-btn ty-btn__secondary")
                    ->setAlfaclickButtonClass("ty-btn ty-btn__secondary")
                    ->setTabLabelClass("ty-step__title-active ty-step__title-txt")//                    ->setTabContentClass("ty-step__container-active")
                ;
                Tygh::$app['view']->assign('completionPanel', $completionPanel);
            } catch (Throwable $e) {
                Logger::getLogger("complete")->error("Exception:", $e);
            }
        }
    }

}