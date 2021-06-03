<?php


class EmailReceiver
{
    public $receiver;

    /**
     * EmailReceiver constructor.
     * @param $receiver
     */
    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }


}