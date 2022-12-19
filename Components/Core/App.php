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

    // Property

    /** @var RequestInterface $request */
    public RequestInterface $request;

    /** @var ControllerInterface $controller */
    public ControllerInterface $controller;


    // Methods

    /**
     * Constructor
     *
     * @param array $config
     *
     * @throws ControllerNotFoundException
     *
     * @return self
     */
    function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->setupRequest();

        $this->setupController();

        return $this;
    }

    /**
     * @return void
     */
    public function setupRequest(): void
    {
        /** @var RequestInterface $request */
        $request = Nano::getComponent(REQUEST);

        $this->request = $request;
    }

    /**
     * @return void
     * @throws ControllerNotFoundException
     */
    protected function setupController(): void
    {
        $controllerClass = $this->getControllerClass();

        if ( !class_exists($controllerClass, false) ) {
            throw new ControllerNotFoundException($controllerClass);
        }

        $action = $this->constructAction($this->request);

        $this->controller = new $controllerClass($this->request, $action );
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
     * @return string
     */
    public function getResponseFormat(): string
    {
        return Nano::$config[RESPONSE][FORMAT];
    }


    /**
     * Запуск приложения
     *
     * @return void
     * @throws ActionNotFoundException
     */
    public function run(): void
    {
        /** @var Response $responseClass */
        $responseClass = Nano::findClass(RESPONSE);

        $responseClass::setupFormat($this->getResponseFormat());

        (new $responseClass($this->controller))->result();
    }


    /**
     * @param RequestInterface $request
     * @return ActionInterface
     */
    protected function constructAction(RequestInterface $request): ActionInterface
    {
        $actionClass = Nano::findClass(ACTION);

        return new $actionClass($request);
    }
}