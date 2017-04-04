<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function createArticle($fields)
    {
        return $this->articles()->create($fields);
    }

    public function owns($article)
    {
        return $this->id == $article->user_id;
    }

    public function hasRole($role)
    {

        // Single Role
        if (is_string($role)) 
        {
            return $this->roles->contains('name', $role);
        }

        //Collection of roles
        return !! $role->intersect($this->roles)->count();
    }
}
