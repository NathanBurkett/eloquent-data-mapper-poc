<?php namespace Showdown\Database;

class Model extends \Illuminate\Database\Eloquent\Model
{
    public function __get($key)
    {
        throw DynamicPropertyException::cannotAccessProperty($key, 'read', static::class);
    }

    public function __set($key, $value)
    {
        throw DynamicPropertyException::cannotAccessProperty($key, 'set', static::class);
    }

    public function getId(): ?int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): void
    {
        $this->setAttribute('id', $id);
    }
}
