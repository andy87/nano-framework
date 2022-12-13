<?php

namespace nano\Components\Web;

use nano\Interfaces\Web\RequestInterface;

/**
 *  class `Request`
 *      env( Web )
 */
class Request extends \nano\Components\Core\Request implements RequestInterface
{
    // Property

    /** @var string query method */
    public string $method;


    // Methods

    /**
     *  Constructor
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->method = $this->findMethod();

        $this->init();
    }

    /**
     * @return string
     */
    public function findQuery(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * @return string
     */
    public function findMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }


    /**
     * Return browser `Method`
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Return browser `URI`
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->query;
    }
}