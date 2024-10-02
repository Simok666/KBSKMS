<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgeVerificator extends Model
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
     * Get the verificator for the user.
     */
    public function badgeVerificator(): HasMany
    {
        return $this->hasMany(User::class, 'badge_verificator_id');
    }
}
