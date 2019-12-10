<?php

namespace App\Http\Controllers;

use App\Models\Code;

class CodeController extends ApiController
{
    public function __construct(Code $code)
    {
        parent::__construct($code);
    }
}
