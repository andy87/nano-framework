<?php

namespace nano\Components\Web\Controllers;

use nano\Interfaces\Web\Controllers\ActionInterface;
use nano\Interfaces\Web\RequestInterface;

/**
 *  class `Action`
 *      env( Web )
 */
class Action extends \nano\Components\Core\Controllers\Action implements ActionInterface
{
    /**
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        parent::__construct($request);
    }
}