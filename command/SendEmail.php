<?php


class SendEmail
{
    /** @var Email */
    public $email;

    /**
     * SendEmail constructor.
     * @param Email $email
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function send()
    {

    }

}