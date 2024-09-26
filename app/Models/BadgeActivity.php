<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class BadgeActivity extends Model
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
     * Get the Komponen for the subkomponen.
     */
    public function subKomponens(): HasMany
    {
        return $this->hasMany(subKomponen::class, 'subkomponen_id', 'id');
    }
}
