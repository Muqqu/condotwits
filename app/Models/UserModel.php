<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $primaryKey = 'user_id';
    public $timestamps = true;
    const CREATED_AT = 'user_created_at';
    const UPDATED_AT = 'user_updated_at';
}
