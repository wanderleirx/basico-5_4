<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Customer extends Model
{
    protected $fillable = ['name', 'birthdate', 'special_customer', 'city', 'state'];
    protected $casts = [
        'special_customer' => 'boolean',
        'birthdate' => 'date'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchases::class);
    }

    public static function getBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public static function formBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
