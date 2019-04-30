<?php

class Order
{
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
     * @param PaymentGateway $gateway
     */
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return boolean
     */
    public function process()
    {
        return $this->gateway->charge($this->amount);
    }

}