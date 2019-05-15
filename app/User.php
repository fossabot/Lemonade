<?php

namespace App;

use App\Notifications\HelloUser;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App
 *
 * @property string      $first_name        First name of the user
 * @property string      $last_name         Last name of the user
 * @property string      $username          Username
 * @property-read Carbon $registration_date Registration date
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'registration_date',
        'registration_ip',
        'password',
        'fiscal_code',
        'birth_place',
        'birthdate',
        'gender',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'registration_date' => 'datetime',
    ];

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->attributes['first_name'] . ' ' . $this->last_name;
    }

    /**
     * @return \App\Town|null
     */
    public function birth_place()
    {
        return $this->hasOne('App\Town', 'belfiore_code', 'birth_place_id');
    }

    /**
     * Calculates the username from first name and last name
     *
     * @param $first_name string First name of the user
     * @param $last_name  string Last name of the user
     *
     * @return string
     */
    public static function calculateUsername($first_name, $last_name)
    {

        /**
         * The username is calculated following this format: first_name.last_name
         *
         * If the username already exists we add an incremental number
         */

        $username = mb_strtolower(preg_replace('/[^a-z]+/i', '', $first_name));
        $username .= '.' . mb_strtolower(preg_replace('/[^a-z]+/i', '', $last_name));

        $numberOfUsersWithSameName = User::whereRaw("username REGEXP '$username" . "[0-9]{0,}'")->count();

        if ($numberOfUsersWithSameName > 0) {
            $username .= $numberOfUsersWithSameName;
        }

        return $username;
    }

    /**
     * Overwrites default email verification template.
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new HelloUser);
    }
}
