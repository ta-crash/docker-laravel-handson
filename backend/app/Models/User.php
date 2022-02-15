<?php

namespace App\Models;

use App\Enums\BloodType;
use App\Enums\Gender;
use App\Enums\Prefecture;
use BenSampo\Enum\Traits\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use CastsEnums, Notifiable, SoftDeletes;

    protected $fillable = [
        'display_name', 'email', 'password', 
        'name', 'name_kana', 'gender', 'birthday', 'height', 'weight', 'blood_type',
        'tel', 'zip_code', 'prefecture', 'address', 'address_building',
        'plan_id', 'offer_left',
        'email_verify_token', 'email_verified_at'
    ];

    protected $dates = [
        'email_verified_at', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'gender' => 'string',
        'blood_type' => 'string',
        'prefecture' => 'string'
    ];

    protected $enumCasts = [
        'gender' => Gender::class,
        'blood_type' => BloodType::class,
        'prefecture' => Prefecture::class
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function getBirthYearAttribute()
    {
        return explode('-', $this->birthday)[0];
    }

    public function getBirthMonthAttribute()
    {
        return explode('-', $this->birthday)[1];
    }

    public function getBirthDateAttribute()
    {
        return explode('-', $this->birthday)[2];
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthday)->age;
    }
}
