<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;
    const STATE_OK = '1';
    const STATE_NOK = '2';


    protected $fillable = [
        'state',
        'phone',
        'country_id',
    ];


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id','id');
    }

}
