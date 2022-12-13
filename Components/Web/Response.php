<?php

namespace nano\Components\Web;

use nano\Exceptions\ActionNotFoundException;
use nano\Interfaces\Core\ControllerInterface;
use nano\Interfaces\Core\Enums\MimeType;
use nano\Interfaces\Web\ResponseInterface;

/**
 *  class `Response`
 *      env( Web )
 */
class Response extends \nano\components\Core\Response implements ResponseInterface
{
    // Property

    /** @var string response charset */
    public static string $charset = self::DEFAULT_CHARSET;

    /** @var array browser headers */
    public static array $headers = [];


    /** @var string[] format mapping */
    private array $mappingContentType = [
        self::FORMAT_HTML => MimeType::HTML,
        self::FORMAT_JSON => MimeType::JSON,
        self::FORMAT_RAW => MimeType::RAW,
    ];


    // Methods

    /**
     *  Constructor
     *
     * @param ControllerInterface $controller
     * @param array $config
     *
     * @return void
     */
    public function __construct(ControllerInterface $controller, array $config = [])
    {
        parent::__construct($controller, $config);

        $this->init();
    }


    /**
     * setup headers & display controller->action result
     *
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

        $this->setHeaders();

        return (static::$format === static::FORMAT_JSON) ? json_encode($response) : $response;
    }

    /**
     * setup headers
     *
     * @return void
     */
    private function setHeaders(): void
    {
        $this->setContentType();

        foreach (static::$headers as $header) {
            header($header);
        }
    }

    /**
     * add new header
     *
     * @param string $header
     * @return void
     */
    public static function addHeader(string $header): void
    {
        static::$headers[] = $header;
    }

    /**
     * setup Content-Type
     *
     * @return void
     */
    private function setContentType(): void
    {
        static::addHeader(
            sprintf("Content-Type: %s", $this->getContentType())
        );
    }

    /**
     * get Content-Type by self Format
     *
     * @return string
     */
    private function getContentType(): string
    {
        $contentType = $this->mappingContentType[static::$format];

        switch (static::$format) {
            case static::FORMAT_HTML:
            case static::FORMAT_RAW:
            case static::FORMAT_JSON:
                $contentType .= ("; charset=" . static::$charset);
                break;
        }

        return $contentType;
    }

}