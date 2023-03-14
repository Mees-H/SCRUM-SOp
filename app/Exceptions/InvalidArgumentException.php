<?php

namespace App\Exceptions;

use Exception;

class InvalidArgumentException extends Exception
{
    public function render(){
        abort(500, $this->getMessage());
    }
}
