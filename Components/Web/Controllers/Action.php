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
     * @param array $config
     */
    public function __construct(RequestInterface $request, array $config = [])
    {
        parent::__construct($request, $config);
    }
}