<?php

namespace nano\Interfaces\Web;


/**
 *  Interface for class `App`
 */
interface AppInterface extends \nano\Interfaces\Core\AppInterface
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

    /**
     * @return ViewInterface
     */
    public function getView(): ViewInterface;

}