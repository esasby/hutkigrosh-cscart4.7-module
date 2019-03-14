<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 27.09.2018
 * Time: 13:09
 */

namespace esas\hutkigrosh\lang;

class TranslatorCSCart extends TranslatorImpl
{

    public function getLocale()
    {
        return CART_LANGUAGE . "_" . strtoupper(CART_LANGUAGE);
    }
}