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
     * @param array $config
     */
    public function __construct(
        RequestInterface $request,
        public ActionInterface $action,
        array $config = []
    )
    {
        parent::__construct($config);

        $this->id = $request->id[CONTROLLER];
    }

    /**
     * @return string
     */
    public function getActionID(): string
    {
        return $this->action->getID();
    }


    /**
     * @param string $action_id
     *
     * @return void
     */
    public function beforeAction(string $action_id): void
    {

    }

    /**
     * @param string $action_id
     *
     * @return void
     */
    public function afterAction(string $action_id): void
    {

    }
}