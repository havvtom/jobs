<?php

namespace App\Http\Resources;

use App\Http\Resources\TagResourceCollection;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'job_title' => $this->job_title,
            'job_location' => $this->job_location,
            'company_name' => $this->company_name,
            'company_logo' => $this->company_logo,
            'job_link' => $this->job_link,
            'tags' => new TagResourceCollection($this->tags),
            'highlited' => $this->highlited,
            'pinned' => $this->pinned,
            'updated_at' => $this->updated_at
        ];
    }
}
