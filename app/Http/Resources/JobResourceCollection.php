<?php

namespace App\Http\Resources;

use App\Http\Resources\JobResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JobResourceCollection extends ResourceCollection
{
    public $collects = JobResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
