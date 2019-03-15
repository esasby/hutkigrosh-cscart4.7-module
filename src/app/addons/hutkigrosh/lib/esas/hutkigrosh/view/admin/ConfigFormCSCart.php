<?php
/*
* @info     Платёжный модуль Hutkigrosh для JoomShopping
* @package  hutkigrosh
* @author   esas.by
* @license  GNU/GPL
*/

namespace esas\hutkigrosh\view\admin;

use esas\hutkigrosh\utils\htmlbuilder\Attributes as attribute;
use esas\hutkigrosh\utils\htmlbuilder\Elements as element;
use esas\hutkigrosh\view\admin\fields\ConfigField;
use esas\hutkigrosh\view\admin\fields\ConfigFieldCheckbox;
use esas\hutkigrosh\view\admin\fields\ConfigFieldList;
use esas\hutkigrosh\view\admin\fields\ConfigFieldPassword;
use esas\hutkigrosh\view\admin\fields\ConfigFieldRichtext;
use esas\hutkigrosh\view\admin\fields\ConfigFieldTextarea;
use esas\hutkigrosh\view\admin\fields\ListOption;

class ConfigFormCSCart extends ConfigFormHtml
{
    private $orderStatuses;

    /**
     * ConfigFormCSCart constructor.
     */
    public function __construct()
    {
        parent::__construct();
        foreach (fn_get_statuses(STATUSES_ORDER) as $orderStatus) {
            $this->orderStatuses[] = new ListOption($orderStatus['status'], $orderStatus['description']);
        }
    }

    /**
     * @return ListOption[]
     */
    public function createStatusListOptions()
    {
        return $this->orderStatuses;
    }

    private static function attributeName(ConfigField $configField)
    {
        return new \esas\hutkigrosh\utils\htmlbuilder\Attribute(attribute::NAME, "payment_data[processor_params][" . $configField->getKey() . "]");
    }

    private static function elementLabel(ConfigField $configField)
    {
        return element::label(
            attribute::clazz("control-label" . ($configField->isRequired() ? " cm-required" : "")),
            attribute::forr($configField->getKey()),
            element::value($configField->getName() . " :")
        );
    }

    private static function elementInput(ConfigField $configField, $type, $class)
    {
        return element::input(
            attribute::clazz($class),
            attribute::type($type),
            attribute::id($configField->getKey()),
            self::attributeName($configField),
            attribute::value($configField->getValue())
        );
    }


    function generateTextField(ConfigField $configField)
    {
        return element::div(
            attribute::clazz("control-group"),
            self::elementLabel($configField),
            element::div(
                attribute::clazz("controls"),
                self::elementInput($configField, "text", "input-text")
            )
        );
    }

    function generateTextAreaField(ConfigFieldTextarea $configField)
    {
        return element::div(
            attribute::clazz("control-group"),
            self::elementLabel($configField),
            element::div(
                attribute::clazz("controls"),
                element::textarea(
                    attribute::id($configField->getKey()),
                    self::attributeName($configField),
                    attribute::clazz("input-large"),
                    attribute::rows($configField->getRows()),
                    attribute::cols($configField->getCols()),
                    attribute::placeholder($configField->getName()),
                    element::value($configField->getValue())
                )
            )
        );
    }

    function generateRichtextField(ConfigFieldRichtext $configField)
    {
        return element::div(
            attribute::clazz("control-group"),
            self::elementLabel($configField),
            element::div(
                attribute::clazz("controls"),
                element::textarea(
                    attribute::id($configField->getKey()),
                    self::attributeName($configField),
                    attribute::clazz("cm-wysiwyg input-large"),
                    attribute::rows($configField->getRows()),
                    attribute::cols($configField->getCols()),
                    attribute::placeholder($configField->getName()),
                    element::value($configField->getValue())
                )
            )
        );
    }


    public function generatePasswordField(ConfigFieldPassword $configField)
    {
        return element::div(
            attribute::clazz("control-group"),
            self::elementLabel($configField),
            element::div(
                attribute::clazz("controls"),
                self::elementInput($configField, "password", "input-text")
            )
        );
    }


    function generateCheckboxField(ConfigFieldCheckbox $configField)
    {
        return element::div(
            attribute::clazz("control-group"),
            self::elementLabel($configField),
            element::div(
                attribute::clazz("controls"),
                element::input(
                    attribute::type("checkbox"),
                    self::attributeName($configField),
                    attribute::id($configField->getKey()),
                    attribute::value("Y"),
                    attribute::checked($configField->isChecked())
                )
            )
        );
    }

    function generateListField(ConfigFieldList $configField)
    {
        return element::div(
            attribute::clazz("control-group"),
            self::elementLabel($configField),
            element::div(
                attribute::clazz("controls"),
                element::select(
                    self::attributeName($configField),
                    attribute::id($configField->getKey()),
                    parent::elementOptions($configField)
                )
            )
        );
    }
}