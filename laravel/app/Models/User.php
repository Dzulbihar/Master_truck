<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'users';
    protected $fillable = [
        'role',
        'owner_name',
        'status',
        'email',
        'password',
        'password2',
        'alasan_blokir',
        'tgl_pengajuan',
        'tgl_disetujui',
        'disetujui_oleh',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

///////////////////////////////////////////////////////

    public function get_tgl_pengajuan()
    {
        return Carbon::parse($this->attributes['tgl_pengajuan'])
        ->translatedFormat('l, d F Y, H:i:s');
    }

    public function get_tgl_disetujui()
    {
        return Carbon::parse($this->attributes['tgl_disetujui'])
        ->translatedFormat('l, d F Y, H:i:s');
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }


}
