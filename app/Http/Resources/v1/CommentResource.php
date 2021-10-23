<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment' => $this->comment,
            'score' => $this->score,
            'user_id' => route('users.show', $this->owner->id),
            'restaurant_id' => route('restaurants.show', $this->restaurant->id)
        ];
    }
}
