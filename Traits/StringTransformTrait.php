<?php

namespace nano\Traits;

/**
 *  trait `StringTransformTrait`
 *      Trait with method for transform words
 */
trait StringTransformTrait
{
    /**
     *  `kebab-case` => `CamelCase`
     *
     * @param string $id
     * @param string $separator
     * @return string
     */
    public function transformKebabCase2CamelCase(string $id, string $separator = '-'): string
    {
        return implode(array_map(function ($item) {
            return ucfirst($item);

        }, explode($separator, $id)));
    }

    /**
     *  `CamelCase` => `snake_case`
     *
     * @param string $CamelCase
     * @return string
     */
    public function transformCamelCase2SnakeCase(string $CamelCase): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $CamelCase));
    }

    /**
     *  `CamelCase` => `kebab-case`
     *
     * @param string $CamelCase
     * @return string
     */
    public function transformCamelCase2KebabCase(string $CamelCase): string
    {
        return str_replace('_', '-', $this->transformCamelCase2SnakeCase($CamelCase));
    }

    /**
     *  `snake_case` => `kebab-case`
     *
     * @param string $KebabCase
     * @return string
     */
    public function transformSnakeCase2KebabCase(string $KebabCase): string
    {
        return strtolower(str_replace('_', '-', $KebabCase));
    }

    /**
     *  `kebab-case` => `snake_case`
     *
     * @param string $KebabCase
     * @return string
     */
    public function transformKebabCase2SnakeCase(string $KebabCase): string
    {
        return strtolower(str_replace('-', '_', $KebabCase));
    }

    /**
     *  `many-case_word` => `snake_case`
     *
     * @param string $string
     * @return string
     */
    public function transformAny2SnakeCase(string $string): string
    {
        return strtolower(str_replace(['-'], '_', $this->transformCamelCase2SnakeCase($string)));
    }

    /**
     *  `many-case_word` => `kebab-case`
     *
     * @param string $string
     * @return string
     */
    public function transformAny2KebabCase(string $string): string
    {
        return strtolower(str_replace(['_'], '-', $this->transformCamelCase2KebabCase($string)));
    }

    /**
     *  `many-case_word` => `CamelCase`
     *
     * @param string $string
     * @return string
     */
    public function transformAny2CamelCase(string $string): string
    {
        return str_replace(['_'], '-', $this->transformKebabCase2CamelCase($string));
    }
}