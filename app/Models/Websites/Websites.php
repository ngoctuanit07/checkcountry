<?php

namespace App\Models\Websites;
use App\Models\BaseModel;
class Websites extends BaseModel
{
    //
    protected $table;
    public function __construct()
    {
        $this->table = config('access.website_table');
    }
}
