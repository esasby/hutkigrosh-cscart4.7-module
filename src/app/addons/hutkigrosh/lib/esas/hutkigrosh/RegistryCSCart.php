<?php
/*
* @info     Платёжный модуль Hutkigrosh для JoomShopping
* @package  hutkigrosh
* @author   esas.by
* @license  GNU/GPL
*/

namespace esas\hutkigrosh;

use esas\hutkigrosh\lang\TranslatorCSCart;
use esas\hutkigrosh\view\admin\ConfigFormCSCart;
use esas\hutkigrosh\wrappers\ConfigurationWrapperCSCart;
use esas\hutkigrosh\wrappers\OrderWrapperCSCart;

class RegistryCSCart extends Registry
{
    public function createConfigurationWrapper()
    {
        return new ConfigurationWrapperCSCart();
    }

    public function createTranslator()
    {
        return new TranslatorCSCart();
    }

    public function getOrderWrapper($orderNumber)
    {
        return new OrderWrapperCSCart($orderNumber);
    }

    public function createConfigForm()
    {
        $configForm = new ConfigFormCSCart();
        $configForm->addRequired();
        return $configForm;
    }
}