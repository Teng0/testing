<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'password','remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    function setPasswordAttribute ($password){
//
//        $this->attributes['password']=bcrypt($password);
//
//    }
//
//    function getNameAttribute($name){
//        return "My name is ".ucfirst($name);
//    }

   public static function  uploadAvatar($image){
        $filename= $image->getClientOriginalName();
       auth()->user()->deleteOldAvatar();
       auth()->user()->update(['avatar'=>$filename]);
       $image->storeAs("images",$filename,"public");
    }

    protected  function  deleteOldAvatar(){
        if ($this->avatar) {
            Storage::delete("/public/images/" . $this->avatar);
        }
    }
     public  function todos(){
       return $this->hasMany(Todo::class);
     }

}
