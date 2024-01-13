<?php

namespace App\Http\Resources\Customers;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Countries\CountryResource;
use App\Models\Customer;
use Carbon\Carbon;

class CustomerResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'formatted_phone' => $this->formatted_phone,
            'phone' => $this->phone,
            'state' => $this->state,
            'code' => $this->code,
            'country' => $this->country

        ];
    }
}
