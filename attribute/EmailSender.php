<?php


class EmailSender
{
    public $sender;

    /**
     * EmailSender constructor.
     * @param $sender
     */
    public function __construct($sender)
    {
        $this->sender = $sender;
    }


}