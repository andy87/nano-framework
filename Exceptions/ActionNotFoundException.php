<?php

namespace nano\Exceptions;

/**
 *  class `NotFoundActionException`
 */
class ActionNotFoundException extends NotFoundException
{
    public const ITEM = 'Action';
}