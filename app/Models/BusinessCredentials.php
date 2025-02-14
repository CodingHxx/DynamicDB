<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCredentials extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'db_host',
        'db_port',
        'db_name',
        'db_username',
        'db_password',  // Can be null
        // other fields...
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class, 'business_credentials_id');
    }
} 