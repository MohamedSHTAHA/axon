<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'regular_expression_pattern',
    ];

    public function phoneNumbers()
    {
        return $this->hasMany(phoneNumber::class,'country_id','id');
    }
}
