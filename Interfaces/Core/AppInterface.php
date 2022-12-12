<?php

namespace nano\Interfaces\Core;

use nano\Interfaces\BaseObjectInterface;

/**
 *  Interface for class `App`
 *   env( Core )
 */
interface AppInterface extends BaseObjectInterface
{
    // Property

    /**
     * @return void
     */
    public function run(): void;

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface;

    /**
     * @return ControllerInterface
     */
    public function getController(): ControllerInterface;
}