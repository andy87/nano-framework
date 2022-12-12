<?php

namespace nano\Interfaces\Web;

/**
 *  Interface for class `Request`
 */
interface RequestInterface extends \nano\Interfaces\Core\RequestInterface
{
    // Methods

    /**
     * @return string
     */
    public function findMethod(): string;

    /**
     * Return browser `URI`
     *
     * @return string
     */
    public function getUri(): string;

    /**
     * Return browser `Method`
     *
     * @return string
     */
    public function getMethod(): string;

}