<?php

namespace nano\Exceptions;

/**
 *  class `NotFoundControllerException`
 */
class ControllerNotFoundException extends NotFoundException
{
    public const ITEM = 'Controller';
}