<?php

namespace App\Models;
use Illuminate\Foundation\Auth\user as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Subadmin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'customer';
    protected $fillable = [

        'name', 'contact', 'email','password'

    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    
}
