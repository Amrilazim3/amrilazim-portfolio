<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageProcessingService
{
    protected $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    public function processSkillImage($imagePath)
    {
        if (!$imagePath) {
            return false;
        }

        $fullPath = storage_path('app/public/' . $imagePath);
        
        if (!file_exists($fullPath)) {
            return false;
        }

        try {
            $image = $this->manager->read($fullPath);
            
            // Resize to 200x200 with cover mode (square)
            $image->cover(200, 200);
            
            // Save with good quality
            $image->save($fullPath, 90);
            
            return true;
        } catch (\Exception $e) {
            Log::error('Image processing failed', [
                'path' => $fullPath,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }
} 