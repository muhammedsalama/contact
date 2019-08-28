<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [

        'name',
        'email',
        'phone'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
