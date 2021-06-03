<?php


class EmailMessage
{
    public $message;

    /**
     * EmailMessage constructor.
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

}