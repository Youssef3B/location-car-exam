<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'phoneNumber',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'buyer_id');
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    // Add this accessor to get the avatar URL
public function getAvatarUrlAttribute()
{
    if ($this->avatar) {
        return asset('storage/' . $this->avatar);
    }
    return null;
}
}
