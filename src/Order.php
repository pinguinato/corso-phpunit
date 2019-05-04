<?php

class Order
{
    /**
     * @var int
     */
    public $quantity;

    /**
     * @var float
     */
    public $unit_price;
    /**
     * Amount
     * @var int
     */
    public $amount = 0;

    /**
     *
     * @var PaymentGateway
     */
    protected $gateway;

    /**
     * Order constructor.
     * @param $quantity
     * @param $unit_price
     */
    public function __construct($quantity, $unit_price)
    {
        //$this->gateway = $gateway;

        $this->quantity = $quantity;
        $this->unit_price = $unit_price;

        $this->amount = $quantity * $unit_price;
    }

    /**
     * @param PaymentGateway $gateway
     */
    public function process(PaymentGateway $gateway)
    {
        $gateway->charge($this->amount);
    }

}