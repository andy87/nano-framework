<?php

namespace nano\Components\Web;

use framework\Nano;
use nano\Exceptions\ControllerNotFoundException;
use nano\Interfaces\Web\AppInterface;
use nano\Interfaces\Web\ViewInterface;
use nano\Interfaces\Web\RequestInterface;
use nano\Interfaces\Web\ControllerInterface;
use nano\Interfaces\Web\Controllers\ActionInterface;

/**
 *  class `App`
 *      env( Web )
 *
 * @property RequestInterface $request
 * @property ControllerInterface $controller
 */
class App extends \nano\Components\Core\App implements AppInterface
{
    // Const

    /** @var string */
    protected const SIDE = 'web';


    // Property

    /** @var ViewInterface $view */
    public ViewInterface $view;



    // Methods

    /**
     * Constructor
     * @throws ControllerNotFoundException
     */
    function __construct()
    {
        $this->setupView();

        return parent::__construct();
    }

    /**
     * Запуск приложения
     *
     * @return void
     */
    public function run(): void
    {
        echo (new Response($this->controller))->result();
    }

    /**
     * @return void
     */
    protected function setupView(): void
    {
        /** @var ViewInterface $view */
        $view = Nano::getComponent(VIEW);

        $this->view = $view;
    }

    /**
     * @return void
     * @throws ControllerNotFoundException
     */
    protected function setupController(): void
    {
        if ( !class_exists($controllerClass = $this->getControllerClass()) ) {
            throw new ControllerNotFoundException();
        }

        $this->controller = new $controllerClass(
            $this->request,
            $this->constructAction(),
            $this->view
        );
    }

    /**
     * @return ViewInterface
     */
    public function getView(): ViewInterface
    {
        return $this->view;
    }

    /**
     * @return ControllerInterface
     */
    public function getController(): ControllerInterface
    {
        return $this->controller;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }


    /**
     * @return ActionInterface
     */
    protected function constructAction(): ActionInterface
    {
        return new (Nano::findClass(ACTION))($this->request);
    }
}