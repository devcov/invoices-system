<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $guarded = [];

    protected $fillable = [
        'Product_name',
        'description',
        'section_id',

    ];

    public function section()
    {
    return $this->belongsTo('App\Models\sections');
    }
}
