<?php namespace Showdown\Database;

class DynamicPropertyException extends \LogicException
{
    public static function cannotAccessProperty(string $property, string $type, string $classRef): self
    {
        $message = sprintf('\'%s\' cannot be dynamically %s on %s', $property, $type, $classRef);
        return new static($message);
    }
}
