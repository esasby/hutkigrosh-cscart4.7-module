<?php
/**
 * Created by PhpStorm.
 * User: nikit
 * Date: 27.09.2018
 * Time: 12:31
 */

namespace esas\hutkigrosh\wrappers;

use Exception;

class ConfigurationWrapperCSCart extends ConfigurationWrapper
{
    private $configuration;

    /**
     * ConfigurationWrapperCSCart constructor.
     * @param $config
     */
    public function __construct()
    {
        parent::__construct();
        $this->configuration = $this->loadSettingsFromDB();
    }

    /**
     * Получаем из БД настройки процессора по имени.
     *
     * @param $payment_id
     * @return array|bool
     */
    protected function loadSettingsFromDB() //todo перенести в func.php
    {
        $processor_name = 'hutkigrosh';
        $processor_data = db_get_row("SELECT * FROM ?:payment_processors WHERE processor = ?s OR processor_script = ?s", $processor_name, strtolower($processor_name) . ".tpl");
        if (empty($processor_data)) {
            return array();
        }
        $pdata = db_get_row("SELECT processor_params FROM ?:payments WHERE processor_id = ?i", $processor_data['processor_id']);
        if (empty($pdata) || empty($pdata['processor_params'])) {
            return array();
        }
        return unserialize($pdata['processor_params']);
    }


    /**
     * @param $key
     * @return string
     * @throws Exception
     */
    public function getCmsConfig($key)
    {
        if (array_key_exists($key, $this->configuration))
            return $this->configuration[$key];
        else
            return null;
    }

    /**
     * @param $cmsConfigValue
     * @return bool
     * @throws Exception
     */
    public function convertToBoolean($cmsConfigValue)
    {
        return strtolower($cmsConfigValue) == 'y';
    }
}