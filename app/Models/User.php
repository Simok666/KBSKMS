<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasApiTokens, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nip',
        'id_satuan_kerja_eselon_1',
        'id_satuan_kerja_eselon_2',
        'id_satuan_kerja_eselon_3',
        'role',
        'nama_jabatan',
        'id_fungsi',
        'email',
        'password',
        'badge_activity_id',
        'badge_verificator_id',
        'badge_contributor_id',
        'bidang_keahlian',
        'bidang_pendidikan',
        'image_profile[]'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function eselon_satu(): BelongsTo {
        return $this->belongsTo(EselonSatu::class, 'id_satuan_kerja_eselon_1');
    }
    
    public function eselon_dua(): BelongsTo {
        return $this->belongsTo(EselonDua::class, 'id_satuan_kerja_eselon_2');
    }
    
    public function eselon_tiga(): BelongsTo {
        return $this->belongsTo(EselonTiga::class, 'id_satuan_kerja_eselon_3');
    }

    public function fungsi(): BelongsTo {
        return $this->belongsTo(Fungsi::class, 'id_fungsi');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    /**
     * Get the user that owns the konten.
     */
    public function userKonten()
    {
        return $this->hasMany(Contributor::class, 'id_user');
    }
    
    /**
     * Get the user that owns the verifikator.
     */
    public function userVerifikator()
    {
        return $this->hasMany(Contributor::class, 'id_user_verificator');
    }

    /**
     * Get the contributor that owns the kategori.
     */
    public function contributor(): HasMany
    {
        return $this->hasMany(Contributor::class, 'id_user_contributor');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function shares()
    {
        return $this->hasMany(Share::class, 'user_id');
    }

    /**
     * Get the badge contributor.
     */
    public function badgeContributor(): BelongsTo
    {
        return $this->belongsTo(BadgeContributor::class, 'badge_contributor_id');
    }

    /**
     * Get the badge verificator.
     */
    public function badgeVerificator(): BelongsTo
    {
        return $this->belongsTo(BadgeVerificator::class, 'badge_verificator_id');
    }
}
