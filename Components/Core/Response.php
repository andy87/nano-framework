<?php

namespace nano\Components\Core;

use nano\Components\BaseObject;
use nano\Exceptions\ActionNotFoundException;
use nano\Interfaces\Core\ResponseInterface;
use nano\Interfaces\Core\ControllerInterface;

/**
 *  class `Response`
 *      env( Core )
 */
class Response extends BaseObject implements ResponseInterface
{
    /**
     * @param ControllerInterface $controller
     */
    public function __construct(protected ControllerInterface $controller)
    {
        return $this;
    }

    /**
     * @return mixed
     * @throws ActionNotFoundException
     */
    public function result(): mixed
    {
        $action = $this->controller->getActionID();

        if ( !method_exists($this->controller, $action) ) {
            throw new ActionNotFoundException();
        }

        return $this->controller->{$action}();
    }
}