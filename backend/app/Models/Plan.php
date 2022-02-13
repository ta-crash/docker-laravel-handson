<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'offer_count', 'price',
    ];

    public function getDescriptionAttribute()
    {
        return $this->name . '(月' . $this->offer_count . 'いいね、月額' . $this->price . '円)';
    }
}
