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

    /**
     * @param string $action_id
     *
     * @return void
     */
    public function beforeAction(string $action_id): void;

    /**
     * @param string $action_id
     *
     * @return void
     */
    public function afterAction(string $action_id): void;

}