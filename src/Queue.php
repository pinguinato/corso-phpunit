<?php

class Queue
{
    const MAX_ITEMS = 5;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param $item
     * @throws QueueException
     */
    public function push($item)
    {
        if ($this->getCount() == static::MAX_ITEMS) {

            throw new QueueException("Queue is full");

        }

        $this->items[] = $item;
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    /**
     * @return integer
     */
    public function getCount()
    {
        return count($this->items);
    }

    /**
     * Clear the queue
     */
    public function clear()
    {
        $this->items = [];
    }
}
