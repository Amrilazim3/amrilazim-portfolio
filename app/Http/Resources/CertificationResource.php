<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'platform' => $this->platform,
            'instructor' => $this->instructor,
            'date' => $this->date,
            'image' => $this->image_url ?: 'https://via.placeholder.com/400x200/3B82F6/FFFFFF?text=' . urlencode($this->platform),
            'description' => $this->description,
            'skills' => $this->skills ?? [],
            'duration' => $this->duration,
            'status' => $this->status,
            'courseUrl' => $this->course_url,
            'is_featured' => $this->is_featured,
            'sort_order' => $this->sort_order,
        ];
    }
}
