<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Services\SiteSettingService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class WelcomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Welcome', [
            // Existing data
            'skills' => Skill::all(),
            'projects' => Project::with('skill')->get(),
            'certifications' => Certification::all(),
            
            // New dynamic content
            'heroData' => SiteSettingService::getHeroSettings(),
            'aboutData' => SiteSettingService::getAboutSettings(),
            'contactData' => SiteSettingService::getContactSettings(),
            'servicesData' => [
                'settings' => SiteSettingService::getServicesSettings(),
                'services' => Service::active()->ordered()->get(),
            ],
            'socialLinks' => SocialLink::active()->ordered()->get(),
        ]);
    }
}
