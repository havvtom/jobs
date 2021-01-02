<?php

namespace App\Http\Resources;

use App\Http\Resources\TagResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TagResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = TagResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
