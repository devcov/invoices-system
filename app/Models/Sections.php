<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    //
    protected $fillable = [
        'section_name',
        'description',
        'Created_by',
    ];

}
