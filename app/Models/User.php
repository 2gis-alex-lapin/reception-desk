<?php
// Эту реализацию модели не трогаем, она ортодоксальная, если надо пишем другую
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\Authenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;

class User extends Authenticatable implements LdapAuthenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use AuthenticatesWithLdap;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function setPasswordAttribute($password)
    {
        $hash = \Hash::make('1');
        $this->attributes['password'] = $hash;
        // \Mail::raw('Password: '.$password, function($msg)
        // {
        //     $msg->from(env('MAIL_FROM_ADDR'), 'Laravel');
         
        //     $msg->to('a.lapin@taraz.2gis.kz')->subject('Test Email');
        // });        
    }
}
