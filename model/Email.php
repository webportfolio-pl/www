<?php

include '../value/EmailAddress.php';
include '../value/EmailMessage.php';
include '../value/EmailReceiver.php';
include '../value/EmailSender.php';
include '../value/EmailSubject.php';

class Email
{
    /** @var EmailAddress */
    public $EmailAddress;

    /** @var EmailMessage */
    public $EmailMessage;

    /** @var EmailReceiver */
    public $EmailReceiver;

    /** @var EmailSender */
    public $EmailSender;

    /** @var EmailSubject */
    public $EmailSubject;


    public function from($Address, $Message, $Receiver, $Sender, $Subject)
    {
        $this->EmailAddress = new EmailAddress($Address);
        $this->EmailMessage = new EmailMessage($Message);
        $this->EmailReceiver = new EmailReceiver($Receiver);
        $this->EmailSender = new EmailSender($Sender);
        $this->EmailSubject = new EmailSubject($Subject);
    }

    /**
     * TODO: move to the class
     * Array with objects
     *
     * @param $array
     */
    public function fromArray($array)
    {
        foreach ($array as $obj) {
            if ($obj instanceof EmailAddress) {
                $this->EmailAddress = $obj;
            }
            if ($obj instanceof EmailMessage) {
                $this->EmailMessage = $obj;
            }
            if ($obj instanceof EmailReceiver) {
                $this->EmailReceiver = $obj;
            }
            if ($obj instanceof EmailSender) {
                $this->EmailSender = $obj;
            }
            if ($obj instanceof EmailSubject) {
                $this->EmailSubject = $obj;
            }
        }
    }

    public function reset()
    {
        $this->EmailAddress = new EmailAddress();
        $this->EmailMessage = new EmailMessage();
        $this->EmailReceiver = new EmailReceiver();
        $this->EmailSender = new EmailSender();
        $this->EmailSubject = new EmailSubject();
    }


    /**
     * @param EmailAddress $EmailAddress
     * @param EmailMessage $EmailMessage
     * @param EmailReceiver $EmailReceiver
     * @param EmailSender $EmailSender
     * @param EmailSubject $EmailSubject
     */
    public function fromObj(EmailAddress $EmailAddress, EmailMessage $EmailMessage, EmailReceiver $EmailReceiver, EmailSender $EmailSender, EmailSubject $EmailSubject)
    {
        $this->EmailAddress = $EmailAddress;
        $this->EmailMessage = $EmailMessage;
        $this->EmailReceiver = $EmailReceiver;
        $this->EmailSender = $EmailSender;
        $this->EmailSubject = $EmailSubject;
    }


}