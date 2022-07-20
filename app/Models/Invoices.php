<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    //

    protected $guarded = [];

    public function section()
   {
   return $this->belongsTo('App\Models\sections');
   }
}
