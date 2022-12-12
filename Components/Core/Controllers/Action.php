<?php

namespace nano\Components\Core\Controllers;

use nano\Components\BaseObject;
use nano\Interfaces\Core\RequestInterface;
use nano\Interfaces\Core\Controllers\ActionInterface;

/**
 *  class `Action`
 *      env( Core )
 */
class Action extends BaseObject implements ActionInterface
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->id = $request->id[ACTION];
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return (string)$this->id;
    }
}