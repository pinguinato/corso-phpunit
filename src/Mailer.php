<?php

class Mailer
{
    public function sendMessage($email, $message)
    {
        if(empty($mail)){
            throw new Exception;
        }

        sleep(3);

        echo "send '$message' to '$email'";

        return true;
    }

    /**
     * @param $mail
     * @param $message
     * @throws InvalidArgumentException
     * @return bool
     */
    public static function sendStatic($mail, $message)
    {
        if(empty($email)){
            throw new InvalidArgumentException;
        }

        echo "Send '$message' to $mail";

        return true;
    }
}
