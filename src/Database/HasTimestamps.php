<?php namespace Showdown\Database;

trait HasTimestamps
{
    /**
     * Set the value of the "created at" attribute.
     *
     * @param  mixed  $value
     * @return $this
     */
    public function setCreatedAt($value)
    {
        $this->attributes[static::CREATED_AT] = $value;

        return $this;
    }

    /**
     * Set the value of the "updated at" attribute.
     *
     * @param  mixed  $value
     * @return $this
     */
    public function setUpdatedAt($value)
    {
        $this->attributes[static::UPDATED_AT] = $value;

        return $this;
    }
}
