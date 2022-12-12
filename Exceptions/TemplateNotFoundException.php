<?php

namespace nano\Exceptions;

/**
 *  class `NotFoundTemplateException`
 */
class TemplateNotFoundException extends NotFoundException
{
    public const ITEM = 'Template';
}