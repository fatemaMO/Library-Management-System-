<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Like;
use App\UsersBook;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone', 'username', 'is_active', 'national_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //aml

    public function books(){
        return $this->hasMany('App\Book');
    }

    public function likes(){
        return $this->hasMany('App\Like');

    }
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function userBooks()
    {
        return $this->hasMany('App\UsersBook');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Book' ,'favorites','user_id', 'book_id');
    }
}
