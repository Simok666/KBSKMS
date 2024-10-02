<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Kategori extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_kategori',
        'icon[]',
        'dekskripsi'
    ];

    /**
     * Get the contributor that owns the kategori.
     */
    public function contributor(): HasMany
    {
        return $this->hasMany(Contributor::class, 'id_kategori');
    }

    // Relasi One-to-Many (Kategori memiliki banyak SubKategori)
    public function subKategoris()
    {
        return $this->hasMany(SubKategori::class, 'id_kategori');
    }
}
