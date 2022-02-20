<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait;

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

    public function projects(){
        return $this->hasMany(Project::class)->orderBy('created_at','DESC');
    }

    protected static function boot(){
        parent::boot();
        static::created(function($user){$user->profile()->create(['quote' => '','description' => '']); });
        //static::created(function($user){$user->roles()->attach([3]); });
        //static::created(function($user){$user->permissions()->attach([1,3]); });
    }

    public function tasks(){
        return $this->hasMany(Task::class)->orderBy('created_at','DESC');
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class)->orderBy('created_at','DESC');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class)->orderBy('created_at','DESC');
    }

    public function assignedTasks(){
        return $this->belongsToMany(Task::class)->orderBy('created_at','DESC');
    }
}
