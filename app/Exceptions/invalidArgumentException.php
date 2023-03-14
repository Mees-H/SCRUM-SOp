<?php

namespace App\Exceptions;

use Exception;

class invalidArgumentException extends Exception
{
    public function render(){
        abort(500, $this->getMessage());
    }
}
