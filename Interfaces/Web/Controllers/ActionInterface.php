<?php

namespace nano\Interfaces\Web\Controllers;

/**
 * Interface for class `Action`
 */
interface ActionInterface extends \nano\Interfaces\Core\Controllers\ActionInterface
{
    // Константы

    /**
     * @return string
     */
    public function getID(): string;
}