<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'owner' => route('users.show', $this->owner->id),
            'name' => $this->name,
            'city'        => $this->city,
            'phone'       => $this->phone,
            'category' => $this->category->name 
        ];
    }
}
