<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class IAMUser extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_expiry_date_gregorian',
        'arabic_family_name',
        'card_issue_date_gregorian',
        'english_father_name',
        'arabic_name',
        'issue_location_ar',
        'iqama_expiry_date_hijri',
        'english_first_name',
        'gender',
        'nationality',
        'arabic_nationality',
        'issue_location_en',
        'arabic_grand_father_name',
        'arabic_father_name',
        'english_name',
        'english_grand_father_name',
        'arabic_first_name',
        'lang',
        'id_version_no',
        'id_expiry_date_hijri',
        'nationality_code',
        'iqama_expiry_date_gregorian',
        'card_issue_date_hijri',
        'dob',
        'english_family_name',
        'dob_hijri',
        'national_id',
        'name',
        'email',
        'mobile_number',
        'mobile_number_verified_at',
        'email_verified_at',
        'created_by',
        'extension_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Find or create user
     *
     * @param array $attributes user attributes
     *
     * @return User|null
     */
    public static function findOrCreate($attributes)
    {
        $user = self::where('national_id', $attributes['national_id'])->first();

        if ($user == null) {
            $user = new self;
        }

        $user->name = $attributes['arabic_name'];
        $user->fill($attributes);
        $user->save();

        return $user;
    }
}
