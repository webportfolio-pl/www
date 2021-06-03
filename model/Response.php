<?php


class Response
{
    /** @var array  */
    public $input = [];

    /** @var array  */
    public $output = [];

    /** @var string  */
    public $message = '';

    /** @var int  */
    public $status = 0;

    /** @var int  */
    public $id = 0;


    /**
     * Response constructor.
     * @param array $input
     * @param array $output
     * @param string $message
     * @param int $status
     * @param int $id
     */
    public function __construct(array $input, array $output, $message, $status, $id)
    {
        $this->input = $input;
        $this->output = $output;
        $this->message = $message;
        $this->status = $status;
        $this->id = $id;
    }

//    function toArray($input, $output, $message, $status, $id)
    public function toArray()
    {
        return [
            "input" => $this->input,
            "output" => $this->output,
            "message" => $this->message,
            "status" => $this->status,
            "id" => $this->id
        ];
    }

}