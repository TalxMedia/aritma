<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'status',
        'profile_photo',
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
    ];

    /**
     * Get the user's role (custom relation).
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the user's direct permissions (custom relation).
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_has_permissions');
    }

    /**
     * Check if the user has a specific role (custom method).
     */
    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }

    /**
     * Check if the user has a permission through their role or directly (custom method).
     */
    public function hasPermission($permissionName)
    {
        // Direct permissions
        if ($this->permissions->contains('name', $permissionName)) {
            return true;
        }

        // Role permissions
        if ($this->role && $this->role->permissions->contains('name', $permissionName)) {
            return true;
        }

        return false;
    }

    /**
     * Get the vehicle associated with the user.
     */
    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

    /**
     * Get the installations assigned to the user.
     */
    public function installations()
    {
        return $this->hasMany(Installation::class, 'assigned_user_id');
    }

    /**
     * Get all notifications for the user.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Get all activity logs for the user.
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
