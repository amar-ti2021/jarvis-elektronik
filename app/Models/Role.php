<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    /**
     * Get all of the employee for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function user()
    {
        return $this->hasMany(Employee::class);
    }
}
