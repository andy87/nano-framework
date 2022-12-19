<?php

namespace nano\Components\Core;

use nano\Components\BaseObject;
use nano\Exceptions\ActionNotFoundException;
use nano\Interfaces\Core\ResponseInterface;
use nano\Interfaces\Core\ControllerInterface;

/**
 *  class `Response`
 *      env( Core )
 *
 * @property ControllerInterface $controller
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
        if ( !method_exists($this->controller, $this->controller->action->id) ) {
            throw new ActionNotFoundException($this->controller->action->id);
        }

        $this->controller->beforeAction($this->controller->action->id);

        $response = call_user_func_array([
                $this->controller,
                $this->controller->action->id
            ], $this->controller->action->getArguments()
        );

        $this->controller->afterAction($this->controller->action->id);

        return $response;
    }
}