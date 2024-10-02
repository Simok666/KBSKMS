<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contributor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'dekskripsi',
        'id_kategori',
        'id_sub_kategori',
        'slug',
        'tag',
        'image_thumbnail[]',
        'upload_lampiran[]',
        'id_user_contributor',
        'tipe',
        'status',
        'status_verifikator',
        'id_user',
        'id_admin',
        'role',
        'komentar',
        'has_video_embed',
        'id_user_verificator'
    ];

    /**
     * get the contributor that owns kategori
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    /**
     * get the contributor that owns kategori
     */
    public function subKategori(): BelongsTo
    {
        return $this->belongsTo(SubKategori::class, 'id_sub_kategori');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_contributor');
    }

    public function userIdKonten(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function userIdVerificator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user_verificator');
    }

    public function adminIdKonten(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_user');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'contributor_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'contributor_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'contributor_id');
    }

    public function shares()
    {
        return $this->hasMany(Share::class, 'contributor_id');
    }
}
