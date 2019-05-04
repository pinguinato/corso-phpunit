<?php

class User
{
    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $surname;

    /**
     * @var string
     */
    public $email;

    /**
     * @var Mailer
     */
    protected $mailer;

    /**
     * @param Mailer $mailer
     * @return User
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }

    /**
     * @param $message
     * @return bool
     * @throws Exception
     */
    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    public function notifyNew($message)
    {
        return Mailer::sendStatic($this->email, $message);
    }
}
