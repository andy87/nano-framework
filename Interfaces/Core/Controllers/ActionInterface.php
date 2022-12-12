<?php

namespace nano\Interfaces\Core\Controllers;

use nano\interfaces\BaseObjectInterface;

/**
 * Interface for class `Action`
 *  env( Core )
 */
interface ActionInterface extends BaseObjectInterface
{
    // Константы

    /** @var string */
    public const DEFAULT_ACTION = 'index';

    /**
     * @return string
     */
    public function getID(): string;
}