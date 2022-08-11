<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices extends Model
{
    //
    use SoftDeletes;

    protected $date=['deleted_at'];

    protected $guarded = [];

    public function section()
   {
   return $this->belongsTo('App\Models\sections');
   }
}
