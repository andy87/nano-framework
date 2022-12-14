<?php

namespace framework;

use nano\Components\BaseObject;
use nano\Components\Web\App;
use nano\Interfaces\BaseObjectInterface;
use nano\Interfaces\Core\AppInterface;

include_once __DIR__ . DIRECTORY_SEPARATOR . "const.php";

/**
 *  class `Nano`
 *      Main framework class.
 */
class Nano extends BaseObject
{
    // Constants

    /** @var string current version of the Nano framework */
    public const VERSION = '1.0.0';

    /** @var string  */
    private const PHP_CRITERIA = '8.0.0';



    // Property

    /** @var array $config array with config */
    public static array $config = [];

    /** @var AppInterface $app main App object */
    public static AppInterface $app;



    // Methods

    /**
     * Method - headliner this party.
     *
     *  First call on App.
     *
     * @param array $configs
     *
     * @return AppInterface
     */
    public static function setup(array $configs = []): AppInterface
    {
        self::checkPhpVersion();

        foreach ($configs as $config)
        {
            static::$config = self::merge(static::$config, $config);
        }

        /** @var App $app */
        $app = static::getComponent(APP);

        static::$app = $app;

        return static::$app;
    }

    /**
     * @param array $parent
     * @param array $children
     *
     * @return array
     */
    public static function merge( array $parent, array $children )
    {
        foreach ( $children as $key => $value )
        {
            $parent[$key] = ( is_array($value) && isset($parent[$key]) )
                ? self::merge( $parent[$key], $value )
                : $value;
        }

        return $parent;
    }

    /**
     * Checker PHP version.
     *  Stop App if version incorrect
     *
     * @return void
     */
    public static function checkPhpVersion(): void
    {
        if (version_compare(phpversion(), self::PHP_CRITERIA, '<'))
        {
            die(
                sprintf(
                    "Server PHP version is less than %s it is impossible to continue.",
                    self::PHP_CRITERIA
                )
            );
        }
    }

    /**
     * get path to directory by ID on context "config"
     *
     * @param string $id
     *
     * @return ?string
     */
    public static function dir(string $id ): ?string
    {
        return static::cfg(DIR, $id);
    }

    /**
     * get system component by ID on context "config"
     *
     * @param $id
     *
     * @return ?BaseObjectInterface
     */
    public static function getComponent($id): ?BaseObjectInterface
    {
        return ( $className = static::findClass($id) ) ? new $className() : null;
    }

    /**
     * get `class name` from "config"
     *
     * @param string $id
     * @param null $default
     *
     * @return ?string
     */
    public static function findClass(string $id, $default = NULL): ?string
    {
        return static::cfg(COMPONENTS, $id, $default );
    }

    /**
     * get `config value` from "config"
     *
     * @param string $group
     * @param string $id
     * @param ?string $default
     *
     * @return ?string
     */
    public static function cfg(string $group, string $id, ?string $default = null ): ?string
    {
        return static::$config[$group][$id] ?? $default;
    }
}