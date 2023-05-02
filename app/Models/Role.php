<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
       'name',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
