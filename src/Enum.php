<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Enum;

use ReflectionClass;

abstract class Enum
{
    /**
     * Contains a backup of the searched class constant associations.
     *
     * @var array
     */
    private static array $classConstants;

    /**
     * Contains the value of the enum.
     *
     * @var mixed
     */
    private mixed $value;

    /**
     * Constructor
     *
     * @param mixed $value
     */
    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    /**
     * Returns the value of the enum.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * Retrieves the ordinal value of the enum.
     *
     * @param mixed $value
     *
     * @return string
     */
    public static function getOrdinal($value): string
    {
        self::mapConstants(static::class);

        return self::$classConstants[static::class]['ordinal'][$value];
    }

    /**
     * Retrieves all options from the enum.
     *
     * @method getOptions
     *
     * @return array
     */
    public static function getOptions(): array
    {
        self::mapConstants(static::class);

        return self::$classConstants[static::class]['constant'];
    }

    /**
     * Retrieves the value of the enum.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments): mixed
    {
        self::mapConstants(static::class);

        return new static(
            self::$classConstants[static::class]['constant'][$name]
        );
    }

    /**
     * Maps the constant and ordinal values to their class.
     *
     * @param string $class
     *
     * @return void
     */
    private static function mapConstants(string $class): void
    {
        if (!isset(self::$classConstants[static::class])) {
            $constants = (new ReflectionClass($class))->getConstants();
            self::$classConstants[$class]['constant'] = $constants;
            self::$classConstants[$class]['ordinal'] = array_flip($constants);
        }
    }
}
