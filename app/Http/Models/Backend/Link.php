<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'name', 'url','thumb','introduce','status',
    ];
}
