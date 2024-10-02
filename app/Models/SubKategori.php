<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;

    protected $fillable = ['id_kategori', 'nama_sub_kategori'];

    // Relasi Many-to-One (SubKategori belongs to Kategori)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

     /**
     * Get the contributor that owns the kategori.
     */
    public function contributor(): HasMany
    {
        return $this->hasMany(Contributor::class, 'id_sub_kategori');
    }
}
