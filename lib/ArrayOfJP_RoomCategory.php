<?php

namespace Juniper\Webservice;

class ArrayOfJP_RoomCategory implements \ArrayAccess, \Iterator, \Countable
{

    /**
     * @var JP_RoomCategory[] $RoomCategory
     */
    protected $RoomCategory = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return JP_RoomCategory[]
     */
    public function getRoomCategory()
    {
      return $this->RoomCategory;
    }

    /**
     * @param JP_RoomCategory[] $RoomCategory
     * @return ArrayOfJP_RoomCategory
     */
    public function setRoomCategory(array $RoomCategory = null)
    {
      $this->RoomCategory = $RoomCategory;
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
      return isset($this->RoomCategory[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return JP_RoomCategory
     */
    public function offsetGet($offset)
    {
      return $this->RoomCategory[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param JP_RoomCategory $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->RoomCategory[] = $value;
      } else {
        $this->RoomCategory[$offset] = $value;
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
      unset($this->RoomCategory[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return JP_RoomCategory Return the current element
     */
    public function current()
    {
      return current($this->RoomCategory);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->RoomCategory);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->RoomCategory);
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
      reset($this->RoomCategory);
    }

    /**
     * Countable implementation
     *
     * @return JP_RoomCategory Return count of elements
     */
    public function count()
    {
      return count($this->RoomCategory);
    }

}
