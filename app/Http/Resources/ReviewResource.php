<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'review';
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'rate'=>$this->resource->rate,
            'body'=>$this->resource->body,
            'service'=>$this->resource->service,
            'user' => new UserResource($this->resource->user)
        ];
    }
}
