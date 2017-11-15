<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    // Table Name
    protected $table = 'rates';
    // Primary Key
    public $primarykey = 'id';
    // TimeStamps
    public $timestamps = 'true';
}
