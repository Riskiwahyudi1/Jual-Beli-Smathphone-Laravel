<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Verified;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    protected $attributes = [
        'name' => '',
       
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }

    public function isSeller()
    {
        return $this->role === 'seller';
    }

    public function isBuyer()
    {
        return $this->role === 'buyer';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function scopeUserFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('username', 'like', '%' . $search . '%');
        });

        $query->when($filters['role'] ?? false, function ($query, $role) {
            return $query->where('role', $role);
        });

        return $query;
    }

    // Tambahkan metode fulfill di sini untuk debug
    public function fulfill()
    {
        Log::info('Fulfilling email verification for user: ' . $this->email);

        $this->markEmailAsVerified();
        event(new Verified($this));
    }
}
