<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    /**
     * Get the roles that own the permission.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }

    /**
     * Get the users that own the permission.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_permissions');
    }
}