<?php

namespace nano\Interfaces\Core;

use nano\Interfaces\BaseObjectInterface;
use nano\Interfaces\Core\Controllers\ActionInterface;

/**
 *  Interface for class `Request`
 *   env( Core )
 * @property string $ns
 * @property string $query
 * @property array $id
 */
interface RequestInterface extends BaseObjectInterface
{
    // Methods

    /**
     * @param string $query
     * @return void
     */
    public function setupQuery(string $query): void;

    /**
     * @param string $ns
     * @return void
     */
    public function setupNameSpace(string $ns): void;

    /**
     * Setup property `id`
     *
     * @param array $idList
     * @return void
     */
    public function setupId(array $idList): void;

    /**
     * @return string
     */
    public function findQuery(): string;

    /**
     * @param array $queryData
     * @return string
     */
    public function findNameSpace(array $queryData): string;

    /**
     * Return controller class
     *
     * @param string $controller_id
     * @return string
     */
    public function constructControllerClass(string $controller_id): string;

    /**
     * @return string
     */
    public function getDefaultControllerId(): string;

    /**
     * @return string
     */
    public function getDefaultActionId(): string;
}