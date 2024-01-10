<?php

namespace App\Http\Resources\PhoneNumbers;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Countries\CountryResource;
use Carbon\Carbon;

class PhoneNumberResource extends BaseResource
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

            'phone' => $this->phone,
            'state' => $this->state,

            'country' => $this->whenLoaded('country', function () {
                return new CountryResource($this->country);
            })
        ];
    }
}
