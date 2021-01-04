<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerExportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'organization' => $this->organization,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'feedback' => $this->feedbackText(),
            'comment' => $this->comment,
            'created_at' => $this->created_at->format('d F Y, H:i:s'),
        ];
    }
}
