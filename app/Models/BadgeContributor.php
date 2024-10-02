<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgeContributor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'badge_name', 
    ];

    /**
     * Get the contrbutor for the user.
     */
    public function badgeContributor(): HasMany
    {
        return $this->hasMany(User::class, 'badge_contributor_id');
    }
}
