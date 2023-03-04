<?php

namespace App\API\Repositories;

use App\API\Abstracts\Repositories;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataRepository extends Repositories
{
    function __construct(Storage $model)
    {
        $this->model = $model;
    }
}




















