<?php

require "src/Queue.php";
require "src/QueueException.php";

class QueueTest extends \PHPUnit\Framework\TestCase
{
    protected $queue;

    protected function setUp()
    {
        $this->queue = new Queue();
    }

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());

        return $this->queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testDependentFromTheFirstTest(Queue $queue)
    {
        $queue->push('black');

        $this->assertEquals(1, $queue->getCount());

        $queue->pop();

        $this->assertEquals(0, $queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $queue = new Queue();

        $queue->push('green');

        $this->assertEquals(1, $queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $queue = new Queue();

        $queue->pop();

        $this->assertEquals(0, $queue->getCount());
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testAnItemIsRemovedFromTheFrontOfTheQueue(Queue $queue)
    {
        $queue->push("first");
        $queue->push("second");
        $this->assertEquals('first', $queue->pop());
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testMaxNumberOfItemsCanBeAdded(Queue $queue)
    {
        $queue->clear(); // svuotamento della coda

        for ($i = 0; $i < Queue::MAX_ITEMS; $i++){

            $queue->push($i);

        }

        $this->assertEquals(Queue::MAX_ITEMS, $queue->getCount());
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testExceptionThrownWhenAddingAnItemToAFullQueue(Queue $queue)
    {
        $queue->clear();

        for ($i = 0; $i < Queue::MAX_ITEMS; $i++){

            $queue->push($i);

        }

        $this->expectException(QueueException::class);

        $queue->push('Element who throw an QueueException');
    }
}