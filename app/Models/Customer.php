<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    const COUNTRIES = [
        [
            'name' => 'Cameroon',
            'code' => '+237',
            'regex' => '\\(237\\) ?[2368]\\d{7,8}$',
        ],
        [
            'name' => 'Ethiopia',
            'code' => '+251',
            'regex' => '\\(251\\) ?[1-59]\\d{8}$',
        ],
        [
            'name' => 'Morocco',
            'code' => '+212',
            'regex' => '\\(212\\) ?[5-9]\\d{8}$',
        ],
        [
            'name' => 'Mozambique',
            'code' => '+258',
            'regex' => '\\(258\\) ?[28]\\d{7,8}$',
        ],
        [
            'name' => 'Uganda',
            'code' => '+256',
            'regex' => '\\(256\\) ?\\d{9}$',
        ]

    ];
    protected $fillable = [
        'phone',
        'name',
    ];


    public function scopeFilterByCountryCode($query, $code)
    {
        return $query->where('phone', 'REGEXP', "\\({$code}\\)");
    }

    public function scopeFilterByState($query, $state)
    {

        $regex_condition = ($state == true) ? 'REGEXP' : 'NOT REGEXP';

        $query->where(function ($query) use ($regex_condition) {
            collect(Customer::COUNTRIES)->each(function ($country) use ($query, $regex_condition) {
                $query->orWhere(function ($query) use ($country, $regex_condition) {
                    $code = $country['code'];
                    $regex_pattern = $country['regex'];
                    $query->where('phone', 'REGEXP', "\\({$code}\\)");
                    $query->where('phone', $regex_condition, $regex_pattern);
                });
            });
        });

        return $query;
    }


    public function getFormattedPhoneAttribute()
    {
        return preg_replace(['/\((\d+)\)/', '/\s+/'], '', $this->phone);
    }
    public function getCodeAttribute()
    {
        preg_match('/\((\d+)\)/', $this->phone, $matches);
        return isset($matches[1]) ? '+' . $matches[1] : 'N/A';
    }

    public function getCountryAttribute()
    {
        return collect(Customer::COUNTRIES)->where('code', $this->code)?->first()['name'] ?? '';
    }

    public function getStateAttribute()
    {
        $regex = collect(Customer::COUNTRIES)->where('code', $this->code)?->first()['regex'] ?? '';
        return (preg_match("/$regex/", $this->phone) === 1);
    }
}
