<?php

namespace nano\Components\Core;

use framework\Nano;
use nano\Components\BaseObject;
use nano\Components\Web\View;
use nano\Exceptions\ActionNotFoundException;
use nano\Exceptions\ControllerNotFoundException;
use nano\Interfaces\Core\AppInterface;
use nano\Interfaces\Core\RequestInterface;
use nano\Interfaces\Core\ControllerInterface;
use nano\Interfaces\Core\Controllers\ActionInterface;

/**
 *  class `App`
 *      env( Core )
 *
 * @property RequestInterface $request
 * @property ControllerInterface $controller
 */
class App extends BaseObject implements AppInterface
{
    // Const

    /** @var string */
    protected const SIDE = 'console';


    // Property
    /** @var RequestInterface $request */
    public RequestInterface $request;

    /** @var ControllerInterface $controller */
    public ControllerInterface $controller;


    // Methods

    /**
     * Constructor
     * @throws ControllerNotFoundException
     * @return $this
     */
    function __construct()
    {
        $this->setupRequest();

        $this->setupController();

        return $this;
    }

    /**
     * @return void
     */
    public function setupRequest(): void
    {
        $this->request = Nano::getComponent(REQUEST);
    }

    /**
     * @return void
     * @throws ControllerNotFoundException
     */
    protected function setupController(): void
    {
        $controllerClass = $this->getControllerClass();

        if ( !class_exists($controllerClass, false) ) {
            throw new ControllerNotFoundException();
        }

        $this->controller = new $controllerClass( $this->request, $this->constructAction() );
    }

    /**
     * @return string
     */
    protected function getControllerClass(): string
    {
        return $this->request->constructControllerClass($this->request->id[CONTROLLER]);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return ControllerInterface
     */
    public function getController(): ControllerInterface
    {
        return $this->controller;
    }


    /**
     * Запуск приложения
     *
     * @return void
     * @throws ActionNotFoundException
     */
    public function run(): void
    {
        (new Response($this->controller))->result();
    }


    /**
     * @return ActionInterface
     */
    protected function constructAction(): ActionInterface
    {
        return new (Nano::findClass(ACTION))($this->request);
    }
}