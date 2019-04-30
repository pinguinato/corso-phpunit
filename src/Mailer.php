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
}
