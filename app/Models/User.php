<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userId',
        'name',
        'email',
        'password',
        'address',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Get the latest User ID and increment for the new userId
            $latestUser = User::latest('id')->first();
            $nextId = $latestUser ? $latestUser->id + 1 : 1;
            $user->userId = 'user' . str_pad($nextId, 2, '0', STR_PAD_LEFT); // Example: user01
        });
    }
    
    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
