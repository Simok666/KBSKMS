<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

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

    public function eselon_satu(): HasOne {
        return $this->HasOne(EselonSatu::class, 'id');
    }
    
    public function eselon_dua(): HasOne {
        return $this->HasOne(EselonDua::class, 'id');
    }
    
    public function eselon_tiga(): HasOne {
        return $this->HasOne(EselonTiga::class, 'id');
    }

    public function fungsi(): HasOne {
        return $this->HasOne(Fungsi::class, 'id');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }
}
