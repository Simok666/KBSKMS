<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanStruktural extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jenis_jabatan',
        'nama_jabatan'
    ];

    /**
     * Get the user that owns the jabatan struktural.
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id_nama_jabatan_struktural');
    }
}
