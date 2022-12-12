<?php

namespace nano\Interfaces\Core;

use nano\Interfaces\BaseObjectInterface;

/**
 *  Interface for class `Controller`
 *   env( Core )
 */
interface ControllerInterface extends BaseObjectInterface
{
    // Константы

    /** @var string */
    public const DEFAULT_CONTROLLER = 'site';


    // Methods

    /**
     * @return string
     */
    public function getActionID(): string;
}