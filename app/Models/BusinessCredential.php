<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCredential extends Model
{
    protected $fillable = ['user_id', 'db_host', 'db_name', 'db_username', 'db_password'];
    protected $table  = 'business_credentials';
    // const created_at = null;
    // const updated_at = null;
    use HasFactory;
}
