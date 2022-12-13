<?php

namespace nano\Interfaces\Web;

/**
 *
 */
interface ResponseInterface extends \nano\Interfaces\Core\ResponseInterface
{
    public const DEFAULT_CHARSET = 'utf-8';

    public const FORMAT_HTML = 'html';
    public const FORMAT_JSON = 'json';

    /**
     * @return mixed
     */
    public function result(): mixed;
}