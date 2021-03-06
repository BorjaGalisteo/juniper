<?php

namespace Juniper\Webservice;

class ArrayOfInt implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var int[] $TtaCode
     */
    protected $TtaCode = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return int[]
     */
    public function getTtaCode()
    {
      return $this->TtaCode;
    }

    /**
     * @param int[] $TtaCode
     * @return ArrayOfInt
     */
    public function setTtaCode(array $TtaCode = null)
    {
      $this->TtaCode = $TtaCode;
      return $this;
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset An offset to check for
     * @return boolean true on success or false on failure
     */
    public function offsetExists($offset)
    {
      return isset($this->TtaCode[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return int
     */
    public function offsetGet($offset)
    {
      return $this->TtaCode[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param int $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->TtaCode[] = $value;
      } else {
        $this->TtaCode[$offset] = $value;
      }
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to unset
     * @return void
     */
    public function offsetUnset($offset)
    {
      unset($this->TtaCode[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return int Return the current element
     */
    public function current()
    {
      return current($this->TtaCode);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->TtaCode);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->TtaCode);
    }

    /**
     * Iterator implementation
     *
     * @return boolean Return the validity of the current position
     */
    public function valid()
    {
      return $this->key() !== null;
    }

    /**
     * Iterator implementation
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
      reset($this->TtaCode);
    }

    /**
     * Countable implementation
     *
     * @return int Return count of elements
     */
    public function count()
    {
      return count($this->TtaCode);
    }

}
