<?php

namespace nano\Components\Core;

use nano\Components\BaseObject;
use nano\Interfaces\Core\ControllerInterface;
use nano\Interfaces\Core\Controllers\ActionInterface;
use nano\Interfaces\Core\RequestInterface;

/**
 *  class `Controller`
 *      env( Core )
 *
 * Base Controller class for extends user controllers.
 *
 * @property ActionInterface $action
 */
abstract class Controller extends BaseObject implements ControllerInterface
{
    // Property

    /** @var string $id ID controller on static call */
    public string $id;



    // Methods

    /**
     * @param RequestInterface $request
     * @param ActionInterface $action
     */
    public function __construct(RequestInterface $request, public ActionInterface $action)
    {
        $this->id = $request->id[CONTROLLER];
    }

    /**
     * @return string
     */
    public function getActionID(): string
    {
        return $this->action->getID();
    }
}