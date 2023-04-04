<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'UserResource';

    protected $primaryKey = 'users_id';

    protected $fillable = [
        'id_name',
        'id_description',
        'user_id',

    ];
}
