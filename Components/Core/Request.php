<?php

namespace nano\Components\Core;

use framework\Nano;
use nano\Components\BaseObject;
use nano\Interfaces\Core\RequestInterface;
use nano\Traits\StringTransformTrait;

/**
 *  class `Request`
 *      env( Core )
 *
 * @property string $query
 * @property string $ns
 * @property array $id
 */
class Request extends BaseObject implements RequestInterface
{
    // Traits

    use StringTransformTrait;



    // Const

    /** @var string separator query string */
    public const SEPARATOR = '/';


    // Property

    /** @var string $query Query string */
    public string $query;

    /** @var string $ns Request NameSpace  */
    public string $ns;

    /** @var array ID list */
    public array $id = [
        CONTROLLER => null,
        ACTION => null,
    ];


    // Methods

    /**
     * Constructor
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->setupQuery(
            $this->findQuery()
        );

        $queryData = $this->constructQueryArray();

        $this->setupIdByQueryData($queryData);

        $this->setupNameSpace(
            $this->findNameSpace($queryData)
        );
    }

    /**
     * Setup property query
     *
     * @param string $query
     * @return void
     */
    final public function setupQuery(string $query): void
    {
        $this->query = $query;
    }

    /**
     * Get console query string
     *
     * @return string
     */
    public function findQuery(): string
    {
        return 'site/index'; // TODO: [Future] this for console...
    }

    /**
     * Construct query array
     *
     * @return array
     */
    public function constructQueryArray(): array
    {
        $query = ltrim($this->query, static::SEPARATOR);

        if (empty($query)) {

            $queryData = [
                $this->getDefaultControllerId(),
                $this->getDefaultActionId(),
            ];

        } else {

            $queryData = explode(static::SEPARATOR, $query);

            if (count($queryData) === 1) {
                $queryData = [
                    Nano::$config[CONTROLLER][DEFAULT_NAME],
                    $queryData[0]
                ];
            }

            if (empty(end($queryData))) {
                array_pop($queryData);

                $queryData[] = $this->getDefaultActionId();
            }
        }

        return $queryData;
    }

    /**
     * Setup property `id` (used Controller & Action).
     *
     * @param array $data
     * @return void
     */
    public function setupIdByQueryData(array $data): void
    {
        $data = array_reverse($data);

        $this->setupId([
            CONTROLLER => $data[1],
            ACTION => $data[0],
        ]);
    }

    /**
     *  Construct query namespace
     *
     * @param array $queryData
     * @return string
     */
    public function findNameSpace(array $queryData): string
    {
        if (count($queryData) > 2)
        {
            return (
                $this->transformKebabCase2SnakeCase(
                    implode(BS, array_slice($queryData, 0, -2))
                ) . BS
            );
        }

        return '';
    }

    /**
     * Setup namespace
     *
     * @param string $ns
     * @return void
     */
    final public function setupNameSpace(string $ns): void
    {
        $this->ns = $ns;
    }


    /**
     * setup ID
     *
     * @param array $idList
     * @return void
     */
    final public function setupId(array $idList): void
    {
        $this->id = $idList;
    }

    /**
     * return full `Controller` class with namespace
     *
     * @param string $controller_id
     * @return string
     */
    public function constructControllerClass(string $controller_id): string
    {
        return Nano::$config[CONTROLLER][NS] . $this->ns .
            $this->transformKebabCase2CamelCase( $controller_id ) .
            Nano::$config[CONTROLLER][SUFIX];
    }

    /**
     * get current controller id
     *
     * @return string
     */
    public function getRequestControllerID(): string
    {
        return $this->id[CONTROLLER];
    }

    /**
     * get current action id
     *
     * @return string
     */
    public function getRequestActionID(): string
    {
        return $this->id[CONTROLLER];
    }

    /**
     * return default controller ID
     *
     * @return string
     */
    public function getDefaultControllerId(): string
    {
        return Nano::$config[CONTROLLER][DEFAULT_NAME];
    }

    /**
     * return default action ID
     *
     * @return string
     */
    public function getDefaultActionId(): string
    {
        return Nano::$config[ACTION][DEFAULT_NAME];
    }
}