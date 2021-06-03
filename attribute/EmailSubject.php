<?php


class EmailSubject
{
    public $subject;

    /**
     * EmailSubject constructor.
     * @param $subject
     */
    public function __construct($subject)
    {
        $this->subject = $subject;
    }

}