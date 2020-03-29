<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //To protect entered data 
    protected $fillable = ['title','subtitle','details','user_id'];

    // Relation between Users and Notes
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
