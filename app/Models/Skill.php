<?php

namespace App\Models;

use App\Services\ImageProcessingService;
use App\Traits\ClearsSkillCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Skill extends Model
{
    use HasFactory, ClearsSkillCache;

    protected $fillable = ['name', 'image'];

    // Accessor for image
    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // Boot method to handle image processing
    protected static function booted()
    {
        static::saving(function ($skill) {
            if ($skill->isDirty('image') && $skill->image) {
                $skill->processImage();
            }
        });
    }

    // Process the uploaded image
    protected function processImage()
    {
        $service = new ImageProcessingService();
        $service->processSkillImage($this->image);
    }
}
