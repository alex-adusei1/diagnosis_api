<?php

namespace App\Models;

use App\Contracts\CommonModel;
use App\Traits\CommonFunctions;
use Illuminate\Database\Eloquent\Model;

class ApiModel extends Model implements CommonModel
{
    use CommonFunctions;
}
