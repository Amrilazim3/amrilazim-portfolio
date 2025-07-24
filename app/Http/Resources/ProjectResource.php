<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'image' => asset('/storage/' . $this->image),
            'skill' => new SkillResource($this->whenLoaded('skill')),
            'project_url' => $this->project_url,
            'github_url' => $this->github_url,
            'type' => $this->type,
            'detailed_description' => $this->detailed_description,
            'technologies' => $this->technologies ?? [],
            'features' => $this->features ?? [],
            'challenge' => $this->challenge,
            'solution' => $this->solution,
            'duration' => $this->duration,
            'outcome' => $this->outcome,
            'is_featured' => $this->is_featured,
            'sort_order' => $this->sort_order,
        ];
    }
}
