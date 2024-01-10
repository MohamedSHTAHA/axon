<?php

namespace App\Http\Resources\Countries;

use App\Http\Resources\BaseResource;

class CountryResource extends BaseResource
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
            'name' => $this->name,
            'code' => $this->code,
            // 'regular_expression_pattern' => $this->regular_expression_pattern,

        ];
    }
}
