<?php

namespace App\Helpers;

class APIResponse {

    private $status_code;
    private $message = "";
    private $data;
    private $errors = [];

    public function __construct($status_code)
    {
        $this->status_code = $status_code;
    }

    public function set_message($message)
    {
        $this->message = $message;
        return $this;
    }

    public function set_data($data)
    {
        $this->data = $data;
        return $this;
    }

    public function set_errors($errors)
    {
        $this->errors = $errors;
        return $this;
    }

    public function build()
    {
        return response()->json([
            'message' => $this->message,
            'errors' => $this->errors,
            'data' => $this->data
        ], $this->status_code);
    }
}