<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    protected $table = 'clients';
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_credentials_id',
        'user_id',
    ];

    protected $hidden = [
        'password',
    ];

    protected $connection = 'dynamic_db';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function businessCredentials()
    {
        return $this->belongsTo(BusinessCredentials::class, 'business_credentials_id');
    }
}
