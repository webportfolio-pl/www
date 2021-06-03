<?php

function request($input, $output, $message, $status, $id)
{
    return [
        "input" => $input,
        "output" => $output,
        "message" => $message,
        "status" => $status,
        "id" => $id
    ];
}
