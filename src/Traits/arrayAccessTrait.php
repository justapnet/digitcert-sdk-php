<?php


namespace DigitCert\Sdk\Traits;


trait arrayAccessTrait
{
    public function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    public function offsetGet($offset)
    {
        return $this->{$offset};
    }

    public function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->{$offset});
    }

    public function toArray(): array
    {
        return (array) $this;
    }
}
