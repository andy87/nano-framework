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
    /** @var string response format */
    public static string $format;

    /**
     * @param ControllerInterface $controller
     * @param array $config
     */
    public function __construct(protected ControllerInterface $controller, array $config = [] )
    {
        parent::__construct($config);

        return $this;
    }

    /**
     * @param string $format
     * @return void
     */
    public static function setupFormat( string $format ): void
    {
        static::$format = $format;
    }

    /**
     * @return mixed
     * @throws ActionNotFoundException
     */
    public function result(): mixed
    {
        $action = $this->controller->getActionID();

        if ( !method_exists($this->controller, $action) ) {
            throw new ActionNotFoundException($action);
        }
        $this->controller->beforeAction($action);

        $response = $this->controller->{$action}();

        $this->controller->afterAction($action);

        return $response;
    }
}