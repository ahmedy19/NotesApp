<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //To protect entered data 
    protected $fillable = ['job','biography','user_id'];

    // Relation between Users and Profiles
    public function users()
    {
        return $this->hasOne('App\User', 'id' , 'user_id');
    }

}
